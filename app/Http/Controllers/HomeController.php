<?php

namespace App\Http\Controllers;

use App\Http\Requests;
//use Illuminate\Http\Request;
use DB,Cart,Request,Mail;
use App\Donhang;
use App\Binhluan;
use App\Chitietdonhang;
use App\Http\Requests\ThanhtoanRequest;
use App\Http\Requests\BinhluanRequest;
use soapclient; 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function demo()
    {
        $data = DB::table('sanpham')
            ->join('lohang', 'sanpham.id', '=', 'lohang.sanpham_id')
            ->select(
                DB::raw(
                    'max(lohang.id) as lomoi'),
                'sanpham.id',
                'sanpham.sanpham_ten',
                'sanpham.sanpham_url',
                'sanpham.sanpham_khuyenmai',
                'sanpham.sanpham_anh',
                 'lohang.lohang_so_luong_nhap',
                 'lohang.lohang_so_luong_hien_tai',
                 'lohang.lohang_gia_ban_ra')
                ->groupBy('sanpham.id')
            ->get();
        // $idLHM = Db::table('lohang')->where('sanpham_id',$val->sanpham_id)->max('id');
            print_r($data);
    }



    public function index()
    {
        $loaisp =  DB::table('loaisanpham')->where('loaisanpham_da_xoa','=',0)->get();
        $sanpham = DB::table('sanpham')
            ->where('sanpham_da_xoa','=',0)
            ->join('lohang', 'sanpham.id', '=', 'lohang.sanpham_id')
            ->where('lohang_so_luong_hien_tai','>',0)
            ->select(
                DB::raw('max(lohang.id) as lomoi'),
                'sanpham.id','sanpham.sanpham_ten',
                'sanpham.sanpham_url',
                'sanpham.sanpham_khuyenmai',
                'sanpham.sanpham_anh', 
                'lohang.lohang_so_luong_nhap',
                'lohang.lohang_so_luong_hien_tai',
                'sanpham.sanpham_gia')
                ->groupBy('sanpham.id')
                ->orderBy('id','DESC')
            ->paginate(12);
        return view ('frontend.pages.home',compact('loaisp','sanpham'));
    }
    public function group($url)
    {
        $id = DB::table('nhom')->select('id')->where('nhom_url',$url)->first();
        $i = $id->id;
        $id = DB::table('loaisanpham')->select('id')->where([['nhom_id',$i],['loaisanpham_da_xoa',0]])->get();
        foreach ($id as $key => $val) {
            $ids[] = $val->id;
        }
        $nhom = DB::table('nhom')->where('id',$i)->first();
        $sanpham = DB::table('sanpham')
            ->where('sanpham_da_xoa',0)
            ->whereIn('sanpham.loaisanpham_id',$ids)
            ->join('lohang', 'sanpham.id', '=', 'lohang.sanpham_id')
            ->where('lohang_so_luong_hien_tai','>',0)
            ->select(DB::raw('max(lohang.id) as lomoi'),'sanpham.id','sanpham.sanpham_ten','sanpham.sanpham_url','sanpham.sanpham_khuyenmai','sanpham.sanpham_anh', 'lohang.lohang_so_luong_nhap','lohang.lohang_so_luong_hien_tai','sanpham.sanpham_gia')
            ->groupBy('sanpham.id')
            ->paginate(15);
        return view('frontend.pages.group',compact('sanpham','nhom'));
    }
    public function thongtindonhang($id){
        $info = DB::table('donhang')
                ->where('donhang.id',$id)
                ->join('chitietdonhang','chitietdonhang.donhang_id','=','donhang.id')
                ->join('tinhtranghd','donhang.tinhtranghd_id','=','tinhtranghd.id')
                ->join('sanpham','chitietdonhang.sanpham_id','=','sanpham.id')
                ->join('size','chitietdonhang.size_id','=','size.id')
                ->join('donvitinh','sanpham.donvitinh_id','=','donvitinh.id')
                ->select(
                    'donhang.id',
                    'donhang.donhang_nguoi_nhan',
                    'donhang.donhang_nguoi_nhan_email',
                    'donhang.donhang_nguoi_nhan_sdt',
                    'donhang.donhang_nguoi_nhan_dia_chi',
                    'donhang.donhang_ghi_chu',
                    'donhang.donhang_tong_tien',
                    'tinhtranghd.tinhtranghd_ten',
                    'chitietdonhang.chitietdonhang_so_luong',
                    'sanpham.sanpham_ten',
                    'size.size_ten',
                    'donvitinh.donvitinh_ten'
                    )
                ->get();
        $chitiet = DB::table('chitietdonhang')
                ->where('chitietdonhang.donhang_id',$id)
                ->join('sanpham','chitietdonhang.sanpham_id','=','sanpham.id')
                ->join('size','chitietdonhang.size_id','=','size.id')
                ->select(
                    'sanpham.sanpham_ten',
                    'size.size_ten',
                    'chitietdonhang.chitietdonhang_so_luong',
                    'sanpham.sanpham_anh',
                    'sanpham.sanpham_gia'
                    )
                ->get();
        return view('frontend.pages.thongtindonhang',compact('info','chitiet'));

    }
    public function huydonhang($id, $userId){
        $donhang = DB::table('donhang')->where('id',$id)->first();
        $oldStatus = $donhang->tinhtranghd_id;
        if($oldStatus >= 1){
            return redirect()->route('danhsachdonhang', [$userId])->with(['flash_level'=>'success','flash_message'=>'Bạn không thể hủy đơn hàng đã xác thực!!!']);
        }else{
            if($oldStatus <= 3 && $oldStatus >= 2)
                DB::table('donhang')->where('id',$id)->update(['tinhtranghd_id' => 4]);
            if($oldStatus <= 7 && $oldStatus >= 5){
                $client = new SoapClient("http://tuyetnhi.somee.com/thanhtoan.asmx?WSDL");
                $arr=array('soTien'=>$donhang->donhang_tong_tien, 'soTK'=>$donhang->donhang_visa);
                $response=$client->hoanTien($arr)->hoanTienResult;
                $result = json_decode(json_encode($response), TRUE);
                if($result == -1 ){
                    echo "<script>
                    alert('Có vấn để trong việc hoàn tiền' + $result);
                    window.location = '".url('/danhsachdonhang/'+$userId)."';</script>";
                    return;
                }else{
                    DB::table('donhang')->where('id',$id)->update(['tinhtranghd_id' => 8]);
                    return redirect()->route('danhsachdonhang', [$userId]);
                }

            }
        }
    }
    public function danhsachdonhang($id){
        $info = DB::table('donhang')
                ->where('khachhang_id',$id)
                ->join('chitietdonhang','chitietdonhang.donhang_id','=','donhang.id')
                ->join('tinhtranghd','donhang.tinhtranghd_id','=','tinhtranghd.id')
                ->join('sanpham','chitietdonhang.sanpham_id','=','sanpham.id')
                ->join('size','chitietdonhang.size_id','=','size.id')
                ->join('donvitinh','sanpham.donvitinh_id','=','donvitinh.id')
                ->select(
                    'donhang.id',
                    'donhang.donhang_nguoi_nhan',
                    'donhang.donhang_nguoi_nhan_email',
                    'donhang.donhang_nguoi_nhan_sdt',
                    'donhang.donhang_nguoi_nhan_dia_chi',
                    'donhang.donhang_ghi_chu',
                    'donhang.donhang_tong_tien',
                    'donhang.khachhang_id',
                    'donhang.created_at',
                    'tinhtranghd.tinhtranghd_ten',
                    'chitietdonhang.chitietdonhang_so_luong',
                    'sanpham.sanpham_ten',
                    'sanpham.sanpham_anh',
                    'size.size_ten',
                    'donvitinh.donvitinh_ten'
                    )
                ->get();
        return view('frontend.pages.xemdanhsachdonhang',compact('info'));
    }
    public function cates($url)
    {
        $idLSP = DB::table('loaisanpham')->select('id')->where('loaisanpham_url',$url)->first();
        $i = $idLSP->id;
        $loaisanpham = DB::table('loaisanpham')->where('id',$i)->first();
        $sanpham = DB::table('sanpham')
            ->where([['sanpham.loaisanpham_id',$i],['sanpham_da_xoa',0]])
            ->join('lohang', 'sanpham.id', '=', 'lohang.sanpham_id')
            ->where('lohang_so_luong_hien_tai','>',0)
            ->select(DB::raw('max(lohang.id) as lomoi'),'sanpham.id','sanpham.sanpham_ten','sanpham.sanpham_url','sanpham.sanpham_khuyenmai','sanpham.sanpham_anh', 'lohang.lohang_so_luong_nhap','lohang.lohang_so_luong_hien_tai','sanpham.sanpham_gia')
                ->groupBy('sanpham.id')
            ->paginate(15);
        $nhom = DB::table('nhom')->where('id',$loaisanpham->nhom_id)->first();
        return view('frontend.pages.cates',compact('sanpham','loaisanpham','nhom'));
    }
    
    public function getContact()
    {
        return view ('frontend.pages.contact');
    }

    public function postContact(Request $request)
    {
        $data = ['mail'=>Request::input('txtMail'),'name'=>Request::input('txtName'),'content'=>Request::input('txtContent')];
        Mail::send('auth.emails.layoutmail', $data, function ($message) {
            $message->from('lordknight1904@gmail.com', 'Khách hàng');
        
            $message->to('lordknight1904@gmail.com', 'Admin');
        
            $message->subject('Mail liên hệ!!!');
        });

        echo "<script>
         alert('Cảm ơn bạn đã góp ý! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất');
         window.location='".url('/')."'
        </script>";
    }

    public function promotions()
    {
        $khuyenmai = DB::table('khuyenmai')->where('khuyenmai_tinh_trang',1)->first();
        if (!is_null($khuyenmai)) {
            $spham = DB::table('sanphamkhuyenmai')
            ->where('khuyenmai_id',$khuyenmai->id)
            ->get();
        } else {
            $spham = Null;
        }
        // print_r($km_old);
        return view ('frontend.pages.promotion',compact('khuyenmai','spham'));
    }

    public function detailpromotions($url)
    {
        $khuyenmai = DB::table('khuyenmai')->where('khuyenmai_url',$url)->first();
        $id = DB::table('khuyenmai')->select('id')->where('khuyenmai_url',$url)->first();
        $id = $id->id;
        // print_r($i);
        $spham = DB::table('sanphamkhuyenmai')
            ->where('khuyenmai_id',$id)
            ->get();
        //$spham = DB::table('sanpham')->whereIn('id',$sphamid)->get();
        //print_r($spham);
        return view ('frontend.pages.detailpromotion',compact('khuyenmai','spham'));
    }

    public function career()
    {
        $tuyendung = DB::table('tuyendung')->where('tuyendung_tinh_trang',1)->first();
        // print_r($tuyendung);
        return view('frontend.pages.career',compact('tuyendung'));
    }

    public function product($url)
    {
        $idLSP = DB::table('sanpham')->select('id')->where('sanpham_url',$url)->first();
        $id = $idLSP->id;
        $sanpham = DB::table('sanpham')
            ->where('sanpham.id',$id)
            ->join('lohang', 'sanpham.id', '=', 'lohang.sanpham_id')
            ->join('donvitinh','sanpham.donvitinh_id', '=', 'donvitinh.id' )
            ->join('loaisanpham','sanpham.loaisanpham_id' , '=', 'loaisanpham.id')
            ->select(
                DB::raw('max(lohang.id) as lomoi'),
                'sanpham.id',
                'sanpham.sanpham_ten',
                'sanpham.sanpham_url',
                'sanpham.sanpham_khuyenmai',
                'sanpham.sanpham_anh', 
                'lohang.lohang_so_luong_nhap',
                'lohang.lohang_so_luong_hien_tai',
                'sanpham.sanpham_gia',
                'donvitinh.donvitinh_ten',
                'loaisanpham.loaisanpham_ten',
                'sanpham.loaisanpham_id',
                'sanpham.sanpham_anh',
                'sanpham.sanpham_mo_ta')
            ->groupBy('sanpham.id')
            ->first();
        $hinhsanpham = DB::table('hinhsanpham')->where('sanpham_id',$id)->get();
        $loaisanpham = DB::table('loaisanpham')->where('id',$sanpham->loaisanpham_id)->first();
        $nhom = DB::table('nhom')->where('id',$loaisanpham->nhom_id)->first();
        $binhluan = DB::table('binhluan')->where([['sanpham_id',$id],['binhluan_trang_thai',1],])->get();
        $sizes = DB::table('lohang')
            ->where('sanpham_id',$id)
            ->where('lohang_so_luong_hien_tai','>','0')
            ->join('size','size.id','=','lohang.size_id')
            ->groupBy('lohang.size_id')
            ->select(DB::raw('sum(lohang.lohang_so_luong_hien_tai) as slcl'),'lohang.size_id','size_ten')
            ->get();
        //var_dump($sizes);
        //$sizes = DB::table('size')->get();
        foreach ($sizes as $key => $val) {
            $size[] = ['id' => $val->size_id, 'name'=> $val->size_ten];
        }
        if(sizeof($sizes)==0){
            echo "<script>
                alert('Xin vui lòng thứ lỗi, mặt hàng nãy đã hết hàng!');
                window.location = document.referrer;</script>";
        }else
            return view('frontend.pages.detailpro',compact('sanpham','hinhsanpham','loaisanpham','nhom','binhluan','size'));
        // print_r($loaisanpham);
    }

    public function buyding(Request $request,$id,$ten,$size_id)
    {
        $sanpham = DB::select('select * from sanpham where id = ?',[$id]);
        if ($sanpham[0]->sanpham_khuyenmai == 1) {
            $muasanpham = DB::select('
                select sp.id,
                sp.sanpham_ten,
                lh.lohang_ky_hieu, 
                sp.sanpham_gia , 
                sp.id, 
                km.khuyenmai_phan_tram 
                from 
                sanpham as sp,
                lohang as lh,
                nhacungcap as ncc,
                sanphamkhuyenmai as spkm,
                khuyenmai as km 
                where km.khuyenmai_tinh_trang = 1 and sp.id = spkm.sanpham_id and spkm.khuyenmai_id = km.id and ncc.id = lh.nhacungcap_id and lh.sanpham_id = sp.id and sp.id = ?', [$id]);
            $giakm = $muasanpham[0]->sanpham_gia - $muasanpham[0]->sanpham_gia*$muasanpham[0]->khuyenmai_phan_tram*0.01;
            Cart::add(array( 'id' => $muasanpham[0]->id, 'name' => $muasanpham[0]->sanpham_ten, 'qty' => 1, 'price' => $giakm, 'size_id' =>$size_id));
        } else {
            $muasanpham = DB::select('
                select sp.id,
                sp.sanpham_ten,
                lh.lohang_ky_hieu,
                sp.sanpham_gia,
                sp.id
                from sanpham as sp,
                lohang as lh,
                nhacungcap as ncc
                where ncc.id = lh.nhacungcap_id 
                    and lh.sanpham_id = sp.id 
                    and sp.id = ?',[$id]);
            $gia = $muasanpham[0]->sanpham_gia;
            $cart = Cart::add(array( 'id' => $muasanpham[0]->id, 'name' => $muasanpham[0]->sanpham_ten, 'qty' => 1, 'price' => $gia, 'size_id' =>$size_id));
        }
        $content = Cart::content();
        foreach ($content as $c) {
            Cart::updateS($c->rowid,$size_id);
        }
        return redirect()->route('giohang');
    }

    public function cart()
    {
        $content = Cart::content();
        $total = Cart::total();
        $sizes =  array();
        $count = 0;
        foreach ($content as $c) {
            $sizes[$count] = DB::table('lohang')
                ->where('sanpham_id',$c->id)
                ->join('size','size.id','=','lohang.size_id')
                ->select(DB::raw('sum(lohang_so_luong_hien_tai) as total'),
                         DB::raw('lohang.size_id as id'),
                         DB::raw('size_ten as name')
                        )
                ->groupBy(DB::raw('size_id') )
                ->having('total','>=',$c->qty)
                ->get();        
            $count++;
        }
        return view('frontend.pages.cart',compact('content','total','sizes'));
    }
    public function updateCart($rowid, $qty){
        Cart::update($rowid,$qty);
        echo "oke";
    }

    public function deleteProduct($id)
    {
        Cart::remove($id);
        return redirect()->route('giohang');
    }

    public function updateProduct()
    {
        if(Request::ajax()) {
            $id = Request::get('id');
            $qty = Request::get('qty');
            Cart::update($id,$qty);
            echo "oke";
        }
    }

    public function getCheckin($url){
        if(Cart::count()==0 || $url === null){
            echo "<script>
          alert('Giỏ hàng rỗng')";
          return;
        }
        $sizeArr = explode(',', $url); 
        $content = Cart::content();
        $count = 0;
        foreach ($content as $c) {
            Cart::updateS($c->rowid,$sizeArr[$count]);
            $count++;
        }
        $total = Cart::total();
        $sizes = DB::table('size')->get();
        $ppthanhtoans = DB::table('ppthanhtoan')->get();
        foreach ($ppthanhtoans as $key => $val) {
            $ppthanhtoan[] = ['id' => $val->id, 'name'=> $val->ppthanhtoan_ten];
        }
        // echo "string";
        // print_r($total);
        return view('frontend.pages.checkin',compact('content','total','sizes','ppthanhtoan'));
    }
    public function getValid($md5){
        $donhang = DB::table('donhang')->where([['md5',$md5],['tinhtranghd_id',1]])->update(['tinhtranghd_id' => 2]);
        //$donhang = DB::table('donhang')->where('md5',$md5)->first();
        $chitietdonhang = DB::table('chitietdonhang')->where('donhang_id','=',$donhang)->get();
        foreach ($chitietdonhang as $ctdh) {
            DB::table('lohang')->where('id',$ctdh->lohang_id)->decrement('lohang_so_luong_hien_tai', $ctdh->chitietdonhang_so_luong);
        }
        return view('frontend.pages.xacnhan');
    }

    public function postCheckin(ThanhtoanRequest $request){
        $total = Cart::total();
        if($request->txtKHPPThanhToan == 0){
            echo "<script>
              alert('Xin vui lòng chọn phương thức thanh toán');
              window.location = '".url('/')."';</script>";
            return ;
        }
        if($request->txtKHPPThanhToan == 2){
        $client = new SoapClient("http://tuyetnhi.somee.com/thanhtoan.asmx?WSDL");
        $arr=array('soTien'=>$total, 'soCSC'=>$request->txtKHCSC, 'soTK'=>$request->txtKHVisa);
            $response=$client->thanhToan($arr)->thanhToanResult;
            $result = json_decode(json_encode($response), TRUE); 
            if($result == -1 ){
                echo "<script>
                alert('Không thể thanh toán' + $result);
                window.location = '".url('/')."';</script>";
                return;
            }
        }
        $content = Cart::content();

        foreach ($content as $item) {
            $lohang =DB::table('lohang')->where([['sanpham_id',$item->id],['size_id','=',$item->size_id]])->get();
            $soluonghangton = 0;
            foreach ($lohang as $lh) {
                $soluonghangton += $lh->lohang_so_luong_hien_tai;
            }
            if($soluonghangton == 0 ) { 
                echo "<script>
                  alert('Mặt hàng đã hết hàng');
                  window.location = '".url('/')."';</script>";
                return;
            }
        }
        $donhang = new Donhang;
        $donhang->donhang_nguoi_nhan = $request->txtNNName;
        $donhang->donhang_nguoi_nhan_email = $request->txtNNEmail;
        $donhang->donhang_nguoi_nhan_sdt = $request->txtNNPhone;
        $donhang->donhang_nguoi_nhan_dia_chi = $request->txtNNAddr;
        $donhang->donhang_ghi_chu = $request->txtNNNote;
        $donhang->donhang_tong_tien = $total;
        $donhang->khachhang_id = $request->txtKHID;
        if($request->txtKHPPThanhToan == 1){
            $donhang->tinhtranghd_id = 1;
            $donhang->donhang_visa = "";
        }
        if($request->txtKHPPThanhToan == 2){
            $donhang->tinhtranghd_id = 6;
            $donhang->donhang_visa = $request->txtKHVisa;
        }
        $donhang->md5 = md5( rand() . $donhang->khachhang_id);
        if ( !$donhang->save()){
            echo "<script>
          alert('Đặt hàng thất bại');
          window.location = '".url('/')."';</script>";
          return;
        }

        foreach ($content as $item) {
            $soluongmua = $item->qty;
            $lohang =DB::table('lohang')->where([['sanpham_id',$item->id],['size_id','=',$item->size_id]])->get();
            foreach ($lohang as $lh){
                if($lh->lohang_so_luong_hien_tai < $soluongmua){
                    $soluongmua = $soluongmua - $lh->lohang_so_luong_hien_tai;
                    $detail = new Chitietdonhang;
                    $detail->sanpham_id = $item->id;
                    $detail->donhang_id = $donhang->id;
                    $detail->size_id = $item->size_id;
                    $detail->chitietdonhang_so_luong = $lh->lohang_so_luong_hien_tai;
                    $detail->chitietdonhang_thanh_tien = $item->price*$lh->lohang_so_luong_hien_tai;
                    $detail->lohang_id = $lh->id;
                    $detail->save();
                    if($request->txtKHPPThanhToan == 2){
                        DB::table('lohang')->where('id',$detail->lohang_id)->increment('lohang_so_luong_da_ban', $detail->chitietdonhang_so_luong);
                        DB::table('lohang')->where('id',$lh->id)->decrement('lohang_so_luong_hien_tai', $lh->lohang_so_luong_hien_tai);
                    }
                }else{
                    $detail = new Chitietdonhang;
                    $detail->sanpham_id = $item->id;
                    $detail->donhang_id = $donhang->id;
                    $detail->size_id = $item->size_id;
                    $detail->chitietdonhang_so_luong = $soluongmua;
                    $detail->chitietdonhang_thanh_tien = $item->price*$soluongmua;
                    $detail->lohang_id = $lh->id;
                    $detail->save();
                    if($request->txtKHPPThanhToan == 2){
                        DB::table('lohang')->where('id',$detail->lohang_id)->increment('lohang_so_luong_da_ban', $detail->chitietdonhang_so_luong);
                        DB::table('lohang')->where('id',$lh->id)->decrement('lohang_so_luong_hien_tai', $soluongmua);
                    }
                    $soluongmua = 0;
                }
                if($soluongmua<=0) break;
            }
        }

        $kh = DB::table('khachhang')->where('id', $request->txtKHID)->first();
        $donhang = [
            'id'=> $donhang->id,
            'donhang_nguoi_nhan'=> $request->txtNNName,
            'donhang_nguoi_nhan_email' => $request->txtNNEmail,
            'donhang_nguoi_nhan_sdt' => $request->txtNNPhone,
            'donhang_nguoi_nhan_dia_chi' => $request->txtNNAddr,
            'donhang_ghi_chu' => $request->txtNNNote,
            'donhang_tong_tien' => $total,
            'khachhang_id' => $request->txtKHID,
            'khachhang_email'=>$kh->khachhang_email,
            'md5' => $donhang->md5
            ];
        // send email
        Cart::destroy();
        if($request->txtKHPPThanhToan == 1){
            Mail::send('auth.emails.hoadon', $donhang, function ($message) use ($donhang) {
                $message->from('postmaster@sandbox571fe9a7698a44e59a231efc0cec0724.mailgun.org', 'ADMIN');
                $message->to($donhang['khachhang_email'], 'a');
                $message->subject('Hóa đơn mua hàng tại Shop quần áo nhóm 10!!!');
            });
            Mail::send('auth.emails.hoadon', $donhang, function ($message) use ($donhang) {
                $message->from('postmaster@sandbox571fe9a7698a44e59a231efc0cec0724.mailgun.org', 'ADMIN');
                $message->to('lordknight1904@gmail.com', 'KHÁCH HÀNG');
                $message->subject('Hóa đơn mua hàng tại Shop quần áo nhóm 10!!!');
            });
            echo "<script>
              alert('Bạn đã đặt mua sản phẩm thành công! Xin hãy kiểm tra email để xác nhận đơn hàng!');
              window.location = '".url('/')."';</script>";
        }
        if($request->txtKHPPThanhToan == 2){
            Mail::send('auth.emails.hoadon-visa', $donhang, function ($message) use ($donhang) {
                $message->from('postmaster@sandbox571fe9a7698a44e59a231efc0cec0724.mailgun.org', 'ADMIN');
                $message->to($donhang['khachhang_email'], 'a');
                $message->subject('Hóa đơn mua hàng tại Shop quần áo nhóm 10!!!');
            });
            Mail::send('auth.emails.hoadon-visa', $donhang, function ($message) use ($donhang) {
                $message->from('postmaster@sandbox571fe9a7698a44e59a231efc0cec0724.mailgun.org', 'ADMIN');
                $message->to('lordknight1904@gmail.com', 'KHÁCH HÀNG');
                $message->subject('Hóa đơn mua hàng tại Shop quần áo nhóm 10!!!');
            });
            echo "<script>
              alert('Bạn mua sản phẩm thành công! Vui lòng đợi nhận hàng!');
              window.location = '".url('/')."';</script>";
        }
    }

    public function postComment(BinhluanRequest $request)
    {
        $binhluan = new Binhluan;
        $binhluan->binhluan_ten = $request->txtName;
        $binhluan->binhluan_email = $request->txtEmail;
        $binhluan->binhluan_noi_dung = $request->txtContent;
        $binhluan->binhluan_trang_thai = 0;
        $binhluan->sanpham_id = $request->txtID;
        $binhluan->save();
         echo "<script>
          alert('Cảm ơn bạn đã góp ý!');
          window.location = '".url('/')."';</script>";
    }

    public function getFind()
    {

        return view('frontend.pages.product');
    }

    public function postFind()
    {
        $keyword = Request::input('txtSeach');
        $sanpham = DB::table('sanpham')
            ->where('sanpham_ten','like',$keyword)
            ->orWhere('sanpham_url','like',$keyword)
            ->join('lohang', 'sanpham.id', '=', 'lohang.sanpham_id')
            ->select(DB::raw('max(lohang.id) as lomoi'),'sanpham.id','sanpham.sanpham_ten','sanpham.sanpham_url','sanpham.sanpham_khuyenmai','sanpham.sanpham_anh', 'lohang.lohang_so_luong_nhap','lohang.lohang_so_luong_hien_tai','sanpham.sanpham_gia')
                ->groupBy('sanpham.id')
            ->paginate(15);
        return view('frontend.pages.product',compact('sanpham'));
    }
}

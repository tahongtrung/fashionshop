<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SizeEditRequest;
use App\Http\Requests\SizeAddRequest;
use App\Size;

use DB;

class SizeController extends Controller
{

    public function getList()
    {
    	$data = DB::table('size')->get();
    	return view('backend.size.danhsach',compact('data'));
    }

    public function getAdd()
    {
    	return view('backend.size.them');
    }

    public function postAdd(SizeAddRequest $request)
    {
    	$size = new Size;
    	$size->size_ten   = $request->txtSizeName;
    	$size->save();
    	return redirect()->route('admin.size.list')->with(['flash_level'=>'success','flash_message'=>'Thêm kích thước thành công!!!']);
    }

    public function getEdit($id)
    {
    	$size= DB::table('size')->where('id',$id)->first();
    	return view('backend.size.sua',compact('size'));
    }

    public function postEdit(SizeEditRequest $request, $id)
    {
    	$size = DB::table('size')
    				->where('id',$id)
    				->update
					    	([
					    	'size_ten'   => $request->txtSizeName,
					    	]);
    	return redirect()->route('admin.size.list')->with(['flash_level'=>'success','flash_message'=>'Cập nhật kích thước thành công!!!']);
    }

    public function getDelete($id)
    {
    	DB::table('sizes')->where('id',$id)->delete();
        return redirect()->route('admin.size.list')->with(['flash_level'=>'success','flash_message'=>'Xóa kích thước thành công!!!']);
    }
}

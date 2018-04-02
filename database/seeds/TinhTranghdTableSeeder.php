<?php

use Illuminate\Database\Seeder;

class TinhTranghdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tinhtranghd')->insert([
            'tinhtranghd_ten' => 'Chưa xác nhận',
            'tinhtranghd_mo_ta' => '',
        ]);
        DB::table('tinhtranghd')->insert([
            'tinhtranghd_ten' => 'Đang chờ xử lý',
            'tinhtranghd_mo_ta' => '',
        ]);
        DB::table('tinhtranghd')->insert([
            'tinhtranghd_ten' => 'Đang giao hàng',
            'tinhtranghd_mo_ta' => '',
        ]);
        DB::table('tinhtranghd')->insert([
            'tinhtranghd_ten' => 'Đã Hủy',
            'tinhtranghd_mo_ta' => '',
        ]);
        DB::table('tinhtranghd')->insert([
            'tinhtranghd_ten' => 'Đã thanh toán',
            'tinhtranghd_mo_ta' => '',
        ]);
        DB::table('tinhtranghd')->insert([
            'tinhtranghd_ten' => 'Đã đặt hàng',
            'tinhtranghd_mo_ta' => '',
        ]);
        DB::table('tinhtranghd')->insert([
            'tinhtranghd_ten' => 'Đang giao hàng (visa)',
            'tinhtranghd_mo_ta' => '',
        ]);
        DB::table('tinhtranghd')->insert([
            'tinhtranghd_ten' => 'Đã hoàn tất',
            'tinhtranghd_mo_ta' => '',
        ]);
    }
}
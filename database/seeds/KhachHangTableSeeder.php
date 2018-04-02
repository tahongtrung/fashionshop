<?php

use Illuminate\Database\Seeder;

class KhachHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('khachhang')->insert([
            'khachhang_ten' => 'Ngô Anh Khoa',
            'khachhang_email' => 'admin@gmail.com',
            'khachhang_sdt' => '01219187548',
            'khachhang_dia_chi' => '110',
            'user_id' => '1',
        ]);
        DB::table('khachhang')->insert([
            'khachhang_ten' => 'Ngô Anh Khoa',
            'khachhang_email' => 'nv@gmail.com',
            'khachhang_sdt' => '01219187548',
            'khachhang_dia_chi' => '110',
            'user_id' => '2',
        ]);
        DB::table('khachhang')->insert([
            'khachhang_ten' => 'user1',
            'khachhang_email' => 'user1@gmail.com',
            'khachhang_sdt' => '01219187548',
            'khachhang_dia_chi' => '110',
            'user_id' => '3',
        ]);
        DB::table('khachhang')->insert([
            'khachhang_ten' => 'user2',
            'khachhang_email' => 'user2@gmail.com',
            'khachhang_sdt' => '01219187548',
            'khachhang_dia_chi' => '110',
            'user_id' => '4',
        ]);
    }
}

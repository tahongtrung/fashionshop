<?php

use Illuminate\Database\Seeder;

class LoainguoidungTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loainguoidung')->insert([
            'loainguoidung_ten' => 'quản trị viên'
        ]);
        DB::table('loainguoidung')->insert([
            'loainguoidung_ten' => 'người dùng'
        ]);
        DB::table('loainguoidung')->insert([
            'loainguoidung_ten' => 'nhân viên'
        ]);
    }
}

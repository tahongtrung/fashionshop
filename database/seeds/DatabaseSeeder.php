<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TinhTranghdTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PPThanhToanSeeder::class);
        $this->call(SizesSeeder::class);
        $this->call(KhachHangTableSeeder::class);
        $this->call(LoainguoidungTableSeeder::class);
    }
}



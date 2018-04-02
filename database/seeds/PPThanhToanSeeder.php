<?php

use Illuminate\Database\Seeder;

class PPThanhToanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ppthanhtoan')->insert([
            'ppthanhtoan_ten' => 'Tiền mặt',
        ]);
        DB::table('ppthanhtoan')->insert([
            'ppthanhtoan_ten' => 'Visa',
        ]);
    }
}

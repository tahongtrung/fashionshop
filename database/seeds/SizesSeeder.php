<?php

use Illuminate\Database\Seeder;

class SizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('size')->insert([
            'size_ten' => 'S',
        ]);
        DB::table('size')->insert([
            'size_ten' => 'M',
        ]);
        DB::table('size')->insert([
            'size_ten' => 'L',
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$0mEmfHfEvj4DT.FVn3HQ2.O0xRH5w70WvOxCRheq.0UyfqApMF5bW',
            'loainguoidung_id' => '1',
            'visa' => '123456789'
        ]);
        DB::table('users')->insert([
            'name' => 'nhan vien',
            'email' => 'nv@gmail.com',
            'password' => '$2y$10$0mEmfHfEvj4DT.FVn3HQ2.O0xRH5w70WvOxCRheq.0UyfqApMF5bW',
            'loainguoidung_id' => '3',
            'visa' => '123456788'
        ]);
        DB::table('users')->insert([
            'name' => 'user 1',
            'email' => 'user1@gmail.com',
            'password' => '$2y$10$0mEmfHfEvj4DT.FVn3HQ2.O0xRH5w70WvOxCRheq.0UyfqApMF5bW',
            'loainguoidung_id' => '2',
            'visa' => '123456789'
        ]);
        DB::table('users')->insert([
            'name' => 'user 2',
            'email' => 'user2@gmail.com',
            'password' => '$2y$10$0mEmfHfEvj4DT.FVn3HQ2.O0xRH5w70WvOxCRheq.0UyfqApMF5bW',
            'loainguoidung_id' => '2',
            'visa' => '123456790'
        ]);
    }
}

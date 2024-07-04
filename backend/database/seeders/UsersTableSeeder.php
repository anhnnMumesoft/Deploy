<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 18,
                'user_id' => 38,
                'ship_name' => 'asdq',
                'ship_address' => '123456',
                'ship_email' => 'qweqwe@gmail.com123',
                'ship_phonenumber' => 'we',
                'created_at' => Carbon::parse('2022-12-05 22:10:05'),
                'updated_at' => Carbon::parse('2022-12-05 22:10:05')
            ],
            [
                'id' => 23,
                'user_id' => 40,
                'ship_name' => 'Do Tan',
                'ship_address' => '111111111',
                'ship_email' => 'dotanthanhvlog@gmail.com',
                'ship_phonenumber' => '0099999992',
                'created_at' => Carbon::parse('2023-07-26 23:41:47'),
                'updated_at' => Carbon::parse('2023-07-26 23:41:47')
            ],
            [
                'id' => 25,
                'user_id' => 27,
                'ship_name' => 'Ánh Nguyễn Ngọc',
                'ship_address' => 'bắc phú sóc sơn hà nội',
                'ship_email' => 'anhnn@mumesoft.vn',
                'ship_phonenumber' => '0923960640',
                'created_at' => Carbon::parse('2024-06-07 09:22:53'),
                'updated_at' => Carbon::parse('2024-06-30 01:51:22')
            ],
            [
                'id' => 26,
                'user_id' => 27,
                'ship_name' => 'Ánh Nguyễn Ngọc',
                'ship_address' => 'bắc phúc - sóc sơn - hà nội',
                'ship_email' => 'anhnn@mumesoft.vn',
                'ship_phonenumber' => '0988418219',
                'created_at' => Carbon::parse('2024-06-07 09:24:03'),
                'updated_at' => Carbon::parse('2024-06-07 09:24:03')
            ],
            [
                'id' => 27,
                'user_id' => 27,
                'ship_name' => 'Ánh Nguyễn Ngócad111',
                'ship_address' => 'áddsads',
                'ship_email' => 'anhnn@mumesoft.vn',
                'ship_phonenumber' => '0988418219',
                'created_at' => Carbon::parse('2024-06-07 10:01:30'),
                'updated_at' => Carbon::parse('2024-06-07 10:01:30')
            ],
            [
                'id' => 28,
                'user_id' => 47,
                'ship_name' => 'Nguyen thi anh',
                'ship_address' => 'Bac Phú',
                'ship_email' => 'anhtanul1@gmail.com',
                'ship_phonenumber' => '0923960640',
                'created_at' => Carbon::parse('2024-06-19 15:58:58'),
                'updated_at' => Carbon::parse('2024-06-19 15:58:58')
            ],
            [
                'id' => 29,
                'user_id' => 45,
                'ship_name' => 'Ánh Nguyễn Ngọc',
                'ship_address' => 'abc',
                'ship_email' => 'anhnn@mumesoft.vn',
                'ship_phonenumber' => '0988418219',
                'created_at' => Carbon::parse('2024-06-25 17:09:33'),
                'updated_at' => Carbon::parse('2024-06-25 17:09:33')
            ],
        ]);
    }
}
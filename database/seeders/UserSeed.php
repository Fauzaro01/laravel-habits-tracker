<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [[
            'id' => Str::random(13),
            'username' => "fauzaro01",
            'email' => "muhamadfauzan4750@gmail.com",
            'password' => Hash::make('admin123'),
            'role' => "admin"
        ],[
            'id' => Str::random(13),
            'username' => "zarory",
            'email' => "zarory01@gmail.com",
            'password' => Hash::make('member123'),
            'role' => "member"
        ]];
        User::insert($datas);
    }
}

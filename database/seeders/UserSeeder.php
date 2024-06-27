<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        User::create([
            "fullname" => "admin admin",
            "username" => "admin",
            "email" => "admin@admin.com",
            "password" => Hash::make("password"),
            "image" => env("IMAGE_PROFILE"),
            "phone" => "019292823382",
            "gender" => "M",
            "address" => "Small healt",
            "role_id" => 1,
            "coupon" => 0,
            "point" => 0,
            'remember_token' => Str::random(30),
        ]);
        User::create([
            "fullname" => "user 1",
            "username" => "user 1",
            "email" => "user@gmail.com",
            "password" => Hash::make("password"),
            "image" => env("IMAGE_PROFILE"),
            "phone" => "019292823382",
            "gender" => "M",
            "address" => "Small healt",
            "role_id" => 2,
            "coupon" => 0,
            "point" => 0,
            'remember_token' => Str::random(30),
        ]);

        User::factory(5)->create();
    }
}

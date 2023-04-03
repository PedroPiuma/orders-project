<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$n.F.242yjl32FaUIlhjw9ut/RUS7F/yjxYE6uWxFESFy8G2dQ/t3O',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'tier' => 1
        ]);
    }
}

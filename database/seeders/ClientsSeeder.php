<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            'name' => Str::random(5),
            'lastname' => Str::random(7),
            'address' => Str::random(20),
            'phone' => Str::random(10),
            'city' => Str::random(4),
            'email' => Str::random(10).'@example.com',
        ]);
    }
}

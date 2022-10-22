<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Admin::firstOrCreate([
            "email" => 'admin@elaunch.com'
        ], [
            "name" => "Elaunch Admin",
            "password" => Hash::make(12345678),
        ]);
    }
}

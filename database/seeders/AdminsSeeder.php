<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');
        $adminRecords = [
            'id' => '1', 
            'name' => 'Admin',
            'type' => 'admin',
            'mobile' => '0812345678',
            'email' => 'admin@example.com',
            'password' => $password, 
            'image' => '',
            'status' => '1',
        ];
        Admin::insert($adminRecords);
    }
}

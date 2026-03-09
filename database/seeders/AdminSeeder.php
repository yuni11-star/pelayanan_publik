<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admins = [
            [
                'name' => 'adminUtama',
                'email' => 'adminutama@bpom.com',
                'password' => Hash::make('adminUtama!#2026'),
                'role' => 'utama',
            ],
            [
                'name' => 'adminHijau',
                'email' => 'adminhijau@bpom.com',
                'password' => Hash::make('adminHijau@!2026'),
                'role' => 'warna',
            ],
            [
                'name' => 'adminUngu',
                'email' => 'adminungu@bpom.com',
                'password' => Hash::make('adminUngu#%2026'),
                'role' => 'warna',
            ],
            [
                'name' => 'adminOren',
                'email' => 'adminoren@bpom.com',
                'password' => Hash::make('adminOren$*2026'),
                'role' => 'warna',
            ],
            [
                'name' => 'adminBiru',
                'email' => 'adminbiru@bpom.com',
                'password' => Hash::make('adminBiru^&2026'),
                'role' => 'warna',
            ],
        ];

        foreach ($admins as $admin) {
            Admin::updateOrCreate(
                ['email' => $admin['email']],
                [
                    'name' => $admin['name'],
                    'password' => $admin['password'],
                    'role' => $admin['role'],
                ]
            );
        }

        Admin::whereNotIn('email', array_column($admins, 'email'))->delete();
    }
}

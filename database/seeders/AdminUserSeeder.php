<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@moveease.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('Password123!'),
                'is_admin' => true,
            ]
        );
    }
}

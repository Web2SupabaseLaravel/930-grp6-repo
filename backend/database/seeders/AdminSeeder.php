<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@event.com',
            'password' => bcrypt('password123'),
            'location' => 'Nablus',
            'age' => 35,
            'credit_card' => null,
            'role' => 'admin',
        ]);
    }
}

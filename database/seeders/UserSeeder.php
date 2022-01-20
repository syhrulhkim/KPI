<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Saiful',
            'email' => 'saiful77@moderator.com',
            'nostaff' => 'A0001',
            'position' => 'Executive (E2)',
            'department' => 'Human Resource (HR) & Administration',
            'unit' => 'Training & Development',
            'grade' => 'E2',
            'role' => 'moderator',
            'password' => Hash::make('12345678')
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'	=> fake()->name(),
            'email'	=> 'admin@gmail.com',
            'nip' => fake()->randomNumber(9),
            'pangkat' => 'Komisaris',
            'password'	=> bcrypt('secret'),
            'phone_number' => fake()->e164PhoneNumber()
        ]);
        // User::create([
        //     'name'	=> fake()->name(),
        //     'email'	=> fake()->unique()->safeEmail(),
        //     'nip' => fake()->randomNumber(9),
        //     'pangkat' => 'Komisaris',
        //     'password'	=> bcrypt('secret'),
        //     'phone_number' => fake()->e164PhoneNumber()
        // ]);
    }
}

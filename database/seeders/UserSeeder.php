<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret123'),
        ]);
        $user2 = User::factory()->create([
            'name' => 'Pegawai',
            'email' => 'pegawai@gmail.com',
            'password' => bcrypt('secret123'),
        ]);
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Pegawai']);
        $user1->assignRole($role1);
        $user2->assignRole($role2);

    }
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadminRole = Role::where('name', 'superadmin')->first();

        if ($superadminRole) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'superadmin@smkn9bekasi.sch.id',
                'password' => Hash::make('superadmin1'), // Ganti dengan password yang lebih aman
                'role_id' => $superadminRole->id,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@condominio.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('123456')
            ]
        );

        $role = Role::where('name', 'admin')->first();

        if ($role && !$admin->roles()->where('name','admin')->exists()) {
            $admin->roles()->attach($role);
        }
    }
}
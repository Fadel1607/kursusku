<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Akun demo untuk login (password disimpan dalam bentuk hash bcrypt).
 *   admin@kursusku.test / admin12345  (role admin)
 *   user@kursusku.test  / user12345   (role user)
 */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        $accounts = [
            ['Admin KursusKu', 'admin@kursusku.test', 'admin12345', 'admin'],
            ['Fadel Muhammad', 'user@kursusku.test', 'user12345', 'user'],
        ];

        foreach ($accounts as [$name, $email, $password, $role]) {
            DB::table('users')->updateOrInsert(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => Hash::make($password),
                    'role' => $role,
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("
            INSERT INTO users
            (
                company_id,
                name,
                email,
                password,
                created_at,
                updated_at
            )
            SELECT
                NULL,
                'Super Admin',
                'superadmin@example.com',
                '".Hash::make('12345678')."',
                NOW(),
                NOW()
            WHERE NOT EXISTS (
                SELECT 1
                FROM users
                WHERE email='superadmin@example.com'
            )
        ");

        $user = User::where(
            'email',
            'superadmin@example.com'
        )->first();

        if($user)
        {
            $user->assignRole('SuperAdmin');
        }
    }
}

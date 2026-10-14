<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'admin', 'email' => 'a@a.a', 'password' => 'admin123', 'role' => UserRole::Admin],
            ['name' => 'usuario', 'email' => 'b@b.b', 'password' => 'usuario123', 'role' => UserRole::User],
            ['name' => 'biel', 'email' => 'c@c.c', 'password' => 'azorisgo123', 'role' => UserRole::Admin],
            ['name' => 'usuario2', 'email' => 'd@d.d', 'password' => 'usuario1234', 'role' => UserRole::User],
        ];

        foreach($users as $data){
            $model = User::firstOrNew(['email' => $data['email']]);
            $model->fill($data);
            $model->role = $data['role'];
            $model->email_verified_at = now();
            $model->save();
        }
    }
}

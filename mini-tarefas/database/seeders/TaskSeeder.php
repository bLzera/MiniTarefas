<?php

namespace Database\Seeders;

use App\Enums\TaskStatus;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userNonAdmin = User::where('email', 'b@b.b')->first();
        $userAdmin = User::where('email', 'a@a.a')->first();

        $tasks = [
            ['title' => 'Task de Teste', 'description' => 'Task de testes do seeder', 'status' => TaskStatus::Pending, 'deadline' => now()->addDay()],
            ['title' => 'Task de Teste 2', 'description' => 'Task de testes do seeder 2', 'status' => TaskStatus::InProgress, 'deadline' => now()->addDay()],
            ['title' => 'Task de Teste 3', 'description' => 'Task de testes do seeder 3', 'status' => TaskStatus::Done, 'deadline' => now()->addDay()],
        ];

        foreach($tasks as $data){
            $model = new Task($data);
            $model->created_by = $userAdmin->id;
            $model->user_id = $userNonAdmin->id;
            $model->save();
        }
    }
}

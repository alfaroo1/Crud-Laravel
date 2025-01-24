<?php

namespace Database\Seeders;

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
        $user = User::first();
        $task = new Task();
        $task->title = 'Tarea1';
        $task->description = "Prueba primera tarea";
        $task->user_id = $user->id;
        $task->save();
    }
}

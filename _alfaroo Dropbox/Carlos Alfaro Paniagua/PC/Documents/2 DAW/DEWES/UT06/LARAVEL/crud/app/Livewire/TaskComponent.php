<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TaskComponent extends Component
{
    //Variables
    public $tasks = [];
    public $title;
    public $id;
    public $descripcion;
    public $modal = false;
    //Usuarios
    public function mount()
    {
        $this->tasks = $this->getTareas();
    }
    //Recoger tareas
    public function getTareas()
    {
        return
            Task::where('user_id', auth())->get();
    }
    public function render()
    {
        return view('livewire.task-component');
    }
    public function clearModal()
    {
        $this->title = '';
        $this->descripcion = '';
    }
    //Abrir modal
    public function openModal()
    {
        $this->clearModal();
        $this->modal = true;
    }
    //Cerrar modal
    public function closeModal()
    {
        $this->modal = false;
    }
    //Crear tarea
    public function createTarea()
    {
        $newTask = new Task();
        $newTask->title = $this->title;
        $newTask->descripcion = $this->descripcion;
        $newTask->user_id = auth()->id;
        $newTask->save();
        $this->clearModal();
        $this->modal = false;
        $this->tasks = $this->getTareas();
    }
    //Modificar tarea
    public function crearOmodificarTarea()
    {

        if ($this->miTarea->id) {
            $task = Task::find($this->miTarea->id);
            $task->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
        } else {
            $task = Task::create([
                'title' => $this->title,
                'description' => $this->description,
                'user_id' => auth()->id,
            ]);
        }


        $this->clearFields();
        $this->modal = false;
        $this->tasks = $this->getTasks()->sortByDesc('id');
    }
    public function eliminarTarea(Task $task)
    {
        $task->delete();
        $this->tasks = $this->getTasks()->sortByDesc('id');
    }
}

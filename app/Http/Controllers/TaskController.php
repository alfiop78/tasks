<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index')->with('tasks', $tasks);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {
        // in request()->all() ho il contenuto del <form>
        // dd(request()->all());
        $task = new Task();
        $task->titolo = request()->titolo;
        $task->descrizione = request()->descrizione;

        $task->save();

        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        // visualizzo il form
        return view('tasks.edit')->with('task', $task);
    }

    public function update($id)
    {
        $task = Task::findOrFail($id);
        $task->titolo = request()->titolo;
        $task->descrizione = request()->descrizione;

        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function completed($id)
    {
        $task = Task::findOrFail($id);
        $task->completed = true;
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function uncompleted($id)
    {
        $task = Task::findOrFail($id);
        $task->completed = false;
        $task->save();

        return redirect()->route('tasks.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        $todos = $this->todo->all();

        return view('todos.index')
            ->with('todos', $todos);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request)
    {
        $this->todo->name =$request->input('name');
        $this->todo->save();

        return redirect('/todos')
                ->with('status', 'success-store');
    }

    public function show($id)
    {
        $todo = $this->todo->find($id);

        return view('todos.show')
                ->with('todo', $todo);
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);

        return view('todos.create')
                ->with('todo', $todo);        
    }

    public function update(TodoRequest $request, $id)
    {
        $todo = $this->todo->find($id);
        $todo->name = $request->input('name');
        $todo->save();

        return redirect('/todos')
                ->with('status', 'success-update');
    }

    public function destroy($id)
    {
        $this->todo->find($id)->delete();

        return redirect('/todos')
                ->with('status', 'success-destroy');
    }

    public function confirm($id)
    {
        $todo = $this->todo->find($id);

        return redirect('/todos')
                ->with('todo', $todo)
                ->with('status', 'confirm');
    }
}

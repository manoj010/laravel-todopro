<?php

namespace App\Http\Controllers;

use App\Http\Controller\UserController;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function dashboard() {
        return view('dashboard', ['list' => todo::all()]);
    }

    public function addTodo(Request $req) {
        $req->validate([
            'user_id' => 'required',
            'todo' => 'required',
        ]);

        Todo::create([
            'user_id' => $req->user_id,
            'todo' => $req->todo,
        ]);

        return redirect() -> route('dashboard');
    }

    public function deleteTodo($id) {
        $data = todo::find($id);
        $data -> delete();
        return redirect() -> route('dashboard');
    }

    public function edit($id) {
        $data = todo::find($id);
        return view('edit', ['data' => $data]);
    }

    public function editTodo(Request $request) {
        $editObj = todo::find($request->id);
        $editObj -> todo = $request -> todo;
        $editObj -> save();
        return redirect() -> route('dashboard');
    }
}

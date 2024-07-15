<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\todos;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class ToDoController extends Controller
{
    public function index() : View {
        $todos = todos::all();

        return view('todos.index', compact('todos'));

    }

    public function create() : View {
        return view('todos.create');
    }

    public function store(Request $request) : RedirectResponse {

        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:10'
        ]);

        todos::create([
            'name' => $request->name,
            'is_done' => $request->has('is_done') ? $request->is_done : 'belum selesai',
            'description' => $request->description
        ]);

        return redirect()->route('todos.index')->with(['success' => 'Berhasil Menambahkan Data']);
        
    }

    public function show(string $id) : View {
        
        $todo = todos::findOrFail($id);

        return view('todos.show', compact('todo'));

    }

    public function edit(string $id) : View {

        $todo = todos::findOrFail($id);

        return view('todos.edit', compact('todo'));

    }
    
    public function update(Request $request, $id) {

        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:10'
        ]);

        $todo = todos::findOrFail($id);

        $todo->update([
            'name' => $request->name,
            'is_done' => $request->is_done,
            'description' => $request->description
        ]);

        return redirect()->route('todos.index')->with(['success' => 'Berhasil Meng-Update Data']);

    }

    public function destroy($id) : RedirectResponse {
        $todo = todos::findOrFail($id);

        $todo->delete();

        return redirect()->route('todos.index')->with(['success' => 'Berhasil Menghapus Data']);

    }
}

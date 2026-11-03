<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hobby;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    public function index()
    {
        $hobbies = Hobby::latest()->get();
        return view('admin.hobbies.index', compact('hobbies'));
    }

    public function create()
    {
        return view('admin.hobbies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:10',
        ]);
        Hobby::create($request->all());
        return redirect()->route('admin.hobbies.index')->with('success', 'Hobi ditambahkan!');
    }

    public function edit(Hobby $hobby)
    {
        return view('admin.hobbies.edit', compact('hobby'));
    }

    public function update(Request $request, Hobby $hobby)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:10',
        ]);
        $hobby->update($request->all());
        return redirect()->route('admin.hobbies.index')->with('success', 'Hobi diupdate!');
    }

    public function destroy(Hobby $hobby)
    {
        $hobby->delete();
        return back()->with('success', 'Hobi dihapus!');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class roleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('admin.role.index', compact('role'));
    }

    public function create()
    {
        return view('admin.role.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string|max:255',
            'penjelasan' => 'required|string|max:255',
            'syarat' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);
        $role = Role::create($request->all());
        return redirect()->route('role.index')->with('success', 'Role berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());

        return redirect()->route('role.index')->with('success', 'Data role berhasil diperbarui.');
    }


    public function edit(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        return view('admin.role.show', compact('role'));
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('role.index')->with('success', 'Data berhasil dihapus.');
    }
}

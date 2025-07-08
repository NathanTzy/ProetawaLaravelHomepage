<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    public function index()
    {
        $testimonies = Testimony::latest()->get();
        return view('admin.testimony.index', compact('testimonies'));
    }

    public function create()
    {
        return view('admin.testimony.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer',
            'asal' => 'required|string|max:255',
            'testimoni' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads/testimonies'), $fotoName);
            $data['foto'] = $fotoName;
        }

        Testimony::create($data);

        return redirect()->route('testymoni.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $testimony = Testimony::findOrFail($id);
        return view('admin.testimony.show', compact('testimony'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer',
            'asal' => 'required|string|max:255',
            'testimoni' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $testimony = Testimony::findOrFail($id);
        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($testimony->foto && file_exists(public_path('uploads/testimonies/' . $testimony->foto))) {
                unlink(public_path('uploads/testimonies/' . $testimony->foto));
            }

            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads/testimonies'), $fotoName);
            $data['foto'] = $fotoName;
        }

        $testimony->update($data);

        return redirect()->route('testymoni.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $testimony = Testimony::findOrFail($id);

        if ($testimony->foto && file_exists(public_path('uploads/testimonies/' . $testimony->foto))) {
            unlink(public_path('uploads/testimonies/' . $testimony->foto));
        }

        $testimony->delete();

        return redirect()->route('testymoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}

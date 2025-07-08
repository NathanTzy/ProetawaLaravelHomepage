<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest()->get();
        return view('admin.certificate.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificate.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_keluar' => 'required|date',
            'penerbit' => 'required|string|max:255',
            'guna' => 'required|string',
            'img' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $data = $request->only(['nama', 'tanggal_keluar', 'penerbit', 'guna']);

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('certificates', 'public');
        }

        Certificate::create($data);

        return redirect()->route('certificates.index')->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $certificate = Certificate::findOrFail($id);
        return view('admin.certificate.show', compact('certificate'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_keluar' => 'required|date',
            'penerbit' => 'required|string|max:255',
            'guna' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $certificate = Certificate::findOrFail($id);
        $data = $request->only(['nama', 'tanggal_keluar', 'penerbit', 'guna']);

        if ($request->hasFile('img')) {
            if ($certificate->img && Storage::disk('public')->exists($certificate->img)) {
                Storage::disk('public')->delete($certificate->img);
            }

            $data['img'] = $request->file('img')->store('certificates', 'public');
        }

        $certificate->update($data);

        return redirect()->route('certificates.index')->with('success', 'Sertifikat berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $certificate = Certificate::findOrFail($id);

        if ($certificate->img && Storage::disk('public')->exists($certificate->img)) {
            Storage::disk('public')->delete($certificate->img);
        }

        $certificate->delete();

        return redirect()->route('certificates.index')->with('success', 'Sertifikat berhasil dihapus.');
    }
}

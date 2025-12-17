<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with('pekerjaan')->paginate(5);
        return view('pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        $pekerjaan = Pekerjaan::all();
        return view('pegawai.create', compact('pekerjaan'));
    }

    public function store(Request $request)
    {
        Pegawai::create(
            $request->except('_token')
        );

        return redirect()
            ->route('pegawai.index')
            ->with('success', 'Pegawai berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pekerjaan = Pekerjaan::all();

        return view('pegawai.edit', compact('pegawai', 'pekerjaan'));
    }

    public function update(Request $request, $id)
    {
        Pegawai::findOrFail($id)->update(
            $request->except('_token', '_method')
        );

        return redirect()
            ->route('pegawai.index')
            ->with('success', 'Pegawai berhasil diperbarui');
    }

    public function destroy($id)
    {
        Pegawai::findOrFail($id)->delete();

        return redirect()
            ->route('pegawai.index')
            ->with('success', 'Pegawai berhasil dihapus');
    }
}

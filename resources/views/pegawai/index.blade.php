@extends('base')

@section('title', 'Pegawai')
@section('menupegawai', 'font-bold underline')

@section('content')
<div class="max-w-screen-xl mx-auto p-6">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold text-gray-800">Data Pegawai</h1>
        <a href="{{ route('pegawai.create') }}"
           class="rounded bg-[#C0392B] px-4 py-2 text-white text-sm">
            + Tambah Pegawai
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 rounded bg-green-100 px-4 py-2 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Pekerjaan</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($pegawai as $k => $p)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-3">
                        {{ $pegawai->firstItem() + $k }}
                    </td>
                    <td class="px-4 py-3">{{ $p->nama }}</td>
                    <td class="px-4 py-3">
                        {{ $p->pekerjaan->nama ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-center">
                        <a href="{{ route('pegawai.edit', $p->id) }}"
                           class="text-blue-600">Edit</a>
                        |
                        <form action="{{ route('pegawai.destroy', $p->id) }}"
                              method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600"
                                    onclick="return confirm('Hapus data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">
                        Data kosong
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $pegawai->links() }}
    </div>

</div>
@endsection

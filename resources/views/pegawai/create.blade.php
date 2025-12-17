@extends('base')

@section('title', 'Tambah Pegawai')
@section('menupegawai', 'font-bold underline')

@section('content')
<div class="max-w-screen-md mx-auto p-6">

    <h1 class="mb-6 text-xl font-bold text-gray-800">
        Tambah Pegawai
    </h1>

    <form action="{{ route('pegawai.store') }}" method="POST"
          class="rounded-lg border border-gray-200 bg-white p-6">
        @csrf

        {{-- Nama --}}
        <div class="mb-4">
            <label class="mb-1 block text-sm font-medium text-gray-700">
                Nama Pegawai
            </label>
            <input type="text" name="nama"
                   value="{{ old('nama') }}"
                   class="w-full rounded border px-3 py-2 focus:outline-none focus:ring"
                   required>
            @error('nama')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Pekerjaan --}}
        <div class="mb-6">
            <label class="mb-1 block text-sm font-medium text-gray-700">
                Pekerjaan
            </label>
            <select name="pekerjaan_id"
                    class="w-full rounded border px-3 py-2"
                    required>
                <option value="">-- Pilih Pekerjaan --</option>
                @foreach($pekerjaan as $p)
                    <option value="{{ $p->id }}"
                        {{ old('pekerjaan_id') == $p->id ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
            @error('pekerjaan_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Button --}}
        <div class="flex gap-3">
            <button type="submit"
                class="rounded bg-[#C0392B] px-5 py-2 text-white text-sm hover:bg-[#a83225]">
                Simpan
            </button>

            <a href="{{ route('pegawai.index') }}"
               class="rounded bg-gray-300 px-5 py-2 text-sm hover:bg-gray-400">
                Batal
            </a>
        </div>
    </form>

</div>
@endsection

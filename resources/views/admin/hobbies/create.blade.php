@extends('layouts.admin')
@section('title', 'Tambah Hobi')

@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.hobbies.store') }}" method="POST" class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Hobi</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-brand-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Icon / Emoji (opsional)</label>
            <input type="text" name="icon" value="{{ old('icon') }}" placeholder="Contoh: 🎮 atau ⚽" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-brand-500">
            <p class="text-xs text-slate-400 mt-1">Copy emoji dari emojipedia.org, paste di sini.</p>
        </div>
        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-brand-500 hover:bg-blue-700 text-white text-sm px-5 py-2.5 rounded-lg transition">Simpan</button>
            <a href="{{ route('admin.hobbies.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm px-5 py-2.5 rounded-lg transition">Batal</a>
        </div>
    </form>
</div>
@endsection
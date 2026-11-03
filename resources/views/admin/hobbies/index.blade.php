@extends('layouts.admin')
@section('title', 'Hobi')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-slate-600 text-sm">Hobi & minat kamu.</p>
    <a href="{{ route('admin.hobbies.create') }}" class="bg-brand-500 hover:bg-blue-700 text-white text-sm px-4 py-2.5 rounded-lg transition">+ Tambah Hobi</a>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    @forelse($hobbies as $hobby)
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 text-center">
        <div class="text-3xl mb-2">{{ $hobby->icon ?? '🎯' }}</div>
        <div class="font-medium text-brand-900 text-sm">{{ $hobby->name }}</div>
        <div class="flex justify-center gap-3 mt-3 pt-2 border-t border-slate-100">
            <a href="{{ route('admin.hobbies.edit', $hobby) }}" class="text-blue-600 hover:underline text-xs">Edit</a>
            <form action="{{ route('admin.hobbies.destroy', $hobby) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                @csrf @method('DELETE')
                <button class="text-red-600 hover:underline text-xs">Hapus</button>
            </form>
        </div>
    </div>
    @empty
    <div class="col-span-4 bg-white rounded-xl border border-slate-200 p-8 text-center text-slate-400">Belum ada hobi. Klik "Tambah Hobi" untuk mulai.</div>
    @endforelse
</div>
@endsection
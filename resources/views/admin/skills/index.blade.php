@extends('layouts.admin')
@section('title', 'Skills')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-slate-600 text-sm">Kelola soft skill & hard skill kamu.</p>
    <a href="{{ route('admin.skills.create') }}" class="bg-brand-500 hover:bg-blue-700 text-white text-sm px-4 py-2.5 rounded-lg transition">+ Tambah Skill</a>
</div>
<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 border-b border-slate-200">
            <tr>
                <th class="text-left p-4 font-semibold text-slate-600">Nama</th>
                <th class="text-left p-4 font-semibold text-slate-600">Tipe</th>
                <th class="text-left p-4 font-semibold text-slate-600">Level</th>
                <th class="text-right p-4 font-semibold text-slate-600">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($skills as $skill)
            <tr class="border-b border-slate-100 hover:bg-slate-50">
                <td class="p-4 font-medium">{{ $skill->name }}</td>
                <td class="p-4">
                    <span class="px-2 py-1 rounded text-xs font-medium {{ $skill->type === 'hard' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">{{ ucfirst($skill->type) }}</span>
                </td>
                <td class="p-4">{{ $skill->level ?? '-' }}</td>
                <td class="p-4 text-right space-x-2">
                    <a href="{{ route('admin.skills.edit', $skill) }}" class="text-blue-600 hover:underline text-xs font-medium">Edit</a>
                    <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline text-xs font-medium">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="p-8 text-center text-slate-400">Belum ada skill. Klik "Tambah Skill" untuk mulai.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
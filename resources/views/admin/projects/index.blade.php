@extends('layouts.admin')
@section('title', 'Kelola Projects')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-slate-600 text-sm">Daftar project yang ada di portfolio kamu.</p>
    <a href="{{ route('admin.projects.create') }}" class="bg-brand-500 hover:bg-blue-700 text-white text-sm px-4 py-2.5 rounded-lg transition">
        + Tambah Project
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
    <table class="w-full text-sm text-left">
        <thead class="bg-slate-50 border-b border-slate-200">
            <tr>
                <th class="p-4 font-semibold text-slate-600">Gambar</th>
                <th class="p-4 font-semibold text-slate-600">Judul</th>
                <th class="p-4 font-semibold text-slate-600">Tech Stack</th>
                <th class="p-4 font-semibold text-slate-600">Tanggal</th>
                <th class="p-4 font-semibold text-slate-600 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr class="border-b border-slate-100 hover:bg-slate-50">
                <td class="p-4">
                    @if($project->image)
                        <img src="{{ Storage::url($project->image) }}" class="w-16 h-12 object-cover rounded">
                    @else
                        <div class="w-16 h-12 bg-slate-200 rounded flex items-center justify-center text-xs text-slate-500">No Img</div>
                    @endif
                </td>
                <td class="p-4 font-medium">{{ $project->title }}</td>
                <td class="p-4 text-slate-500">{{ $project->tech_stack ?? '-' }}</td>
                <td class="p-4">{{ $project->created_at->format('d M Y') }}</td>
                <td class="p-4 text-right space-x-2">
                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:underline text-xs font-medium">Edit</a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus project ini?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline text-xs font-medium">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-8 text-center text-slate-400">Belum ada project. Klik "Tambah Project" untuk mulai.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
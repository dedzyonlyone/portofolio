@extends('layouts.admin')
@section('title', 'Projects')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-slate-600 text-sm">Daftar project yang pernah kamu kerjakan.</p>
    <a href="{{ route('admin.projects.create') }}" class="bg-brand-500 hover:bg-blue-700 text-white text-sm px-4 py-2.5 rounded-lg transition">+ Tambah Project</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @forelse($projects as $project)
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        @if($project->image)
            <img src="{{ asset('storage/'.$project->image) }}" class="w-full h-40 object-cover">
        @else
            <div class="w-full h-40 bg-slate-100 flex items-center justify-center text-slate-400 text-sm">No Image</div>
        @endif
        <div class="p-4">
            <h3 class="font-semibold text-brand-900">{{ $project->title }}</h3>
            <p class="text-slate-500 text-xs mt-1">{{ Str::limit($project->description, 80) }}</p>
            <div class="flex gap-3 mt-4 pt-3 border-t border-slate-100">
                <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:underline text-xs font-medium">Edit</a>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button class="text-red-600 hover:underline text-xs font-medium">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-3 bg-white rounded-xl border border-slate-200 p-8 text-center text-slate-400">Belum ada project. Klik "Tambah Project" untuk mulai.</div>
    @endforelse
</div>
@endsection
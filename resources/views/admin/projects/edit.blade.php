@extends('layouts.admin')
@section('title', 'Edit Project')

@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 space-y-5">
        @csrf @method('PUT')
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Judul Project</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-brand-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-brand-500" required>{{ old('description', $project->description) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Link Project (opsional)</label>
            <input type="url" name="link" value="{{ old('link', $project->link) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-brand-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Gambar (opsional)</label>
            @if($project->image)
                <img src="{{ asset('storage/'.$project->image) }}" class="w-32 h-20 object-cover rounded mb-2">
            @endif
            <input type="file" name="image" accept="image/*" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm">
        </div>
        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-brand-500 hover:bg-blue-700 text-white text-sm px-5 py-2.5 rounded-lg transition">Update</button>
            <a href="{{ route('admin.projects.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm px-5 py-2.5 rounded-lg transition">Batal</a>
        </div>
    </form>
</div>
@endsection
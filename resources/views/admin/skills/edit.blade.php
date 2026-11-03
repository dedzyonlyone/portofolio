@extends('layouts.admin')
@section('title', 'Edit Skill')

@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.skills.update', $skill) }}" method="POST" class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 space-y-5">
        @csrf @method('PUT')
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Skill</label>
            <input type="text" name="name" value="{{ old('name', $skill->name) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-brand-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Tipe</label>
            <select name="type" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-brand-500" required>
                <option value="hard" {{ $skill->type === 'hard' ? 'selected' : '' }}>Hard Skill</option>
                <option value="soft" {{ $skill->type === 'soft' ? 'selected' : '' }}>Soft Skill</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Level (1-100)</label>
            <input type="number" name="level" min="1" max="100" value="{{ old('level', $skill->level) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-brand-500">
        </div>
        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-brand-500 hover:bg-blue-700 text-white text-sm px-5 py-2.5 rounded-lg transition">Update</button>
            <a href="{{ route('admin.skills.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm px-5 py-2.5 rounded-lg transition">Batal</a>
        </div>
    </form>
</div>
@endsection
@extends('layouts.admin')
@section('title', 'Edit Profil')

@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.profile.update', $profile) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 space-y-5">
        @csrf @method('PUT')
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', $profile->name) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-brand-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Tentang Saya</label>
            <textarea name="about" rows="5" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-brand-500" required>{{ old('about', $profile->about) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Kelebihan</label>
            <textarea name="kelebihan" rows="3" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-brand-500">{{ old('kelebihan', $profile->kelebihan) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Foto Profil</label>
            @if($profile->photo)
                <img src="{{ asset('storage/'.$profile->photo) }}" class="w-20 h-20 rounded-full object-cover mb-2">
            @endif
            <input type="file" name="photo" accept="image/*" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm">
        </div>
        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-brand-500 hover:bg-blue-700 text-white text-sm px-5 py-2.5 rounded-lg transition">Update</button>
            <a href="{{ route('admin.profile.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm px-5 py-2.5 rounded-lg transition">Batal</a>
        </div>
    </form>
</div>
@endsection
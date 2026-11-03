@extends('layouts.admin')
@section('title', 'Profil')

@section('content')
@if($profile)
<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 max-w-3xl">
    <div class="flex items-start gap-6">
        @if($profile->photo)
            <img src="{{ asset('storage/'.$profile->photo) }}" class="w-24 h-24 rounded-full object-cover">
        @else
            <div class="w-24 h-24 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 text-xs">No Photo</div>
        @endif
        <div class="flex-1">
            <h2 class="text-xl font-bold text-brand-900">{{ $profile->name }}</h2>
            <p class="text-slate-600 text-sm mt-2">{{ $profile->about }}</p>
            @if($profile->kelebihan)
                <div class="mt-4">
                    <h3 class="text-sm font-semibold text-slate-700">Kelebihan</h3>
                    <p class="text-slate-600 text-sm mt-1">{{ $profile->kelebihan }}</p>
                </div>
            @endif
            <div class="mt-5 flex gap-3">
                <a href="{{ route('admin.profile.edit', $profile) }}" class="bg-brand-500 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg transition">Edit Profil</a>
            </div>
        </div>
    </div>
</div>
@else
<div class="bg-white rounded-xl border border-slate-200 p-8 text-center">
    <p class="text-slate-500 mb-4">Profil belum diisi.</p>
    <a href="{{ route('admin.profile.create') }}" class="bg-brand-500 hover:bg-blue-700 text-white text-sm px-5 py-2.5 rounded-lg transition inline-block">Buat Profil Sekarang</a>
</div>
@endif
@endsection
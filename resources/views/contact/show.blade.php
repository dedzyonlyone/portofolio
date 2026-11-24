@extends('layouts.admin')
@section('title', 'Baca Pesan')

@section('content')
<div class="max-w-3xl bg-white rounded-xl shadow-sm border border-slate-200 p-8">
    <div class="mb-6 pb-6 border-b border-slate-100">
        <h2 class="text-2xl font-bold text-brand-900 mb-2">{{ $contact->subject ?? 'Tanpa Subjek' }}</h2>
        <div class="text-sm text-slate-500">
            Dari: <strong>{{ $contact->name }}</strong> ({{ $contact->email }}) <br>
            Tanggal: {{ $contact->created_at->format('d F Y, H:i') }}
        </div>
    </div>
    <div class="prose max-w-none text-slate-700 whitespace-pre-line">{{ $contact->message }}</div>
    
    <div class="mt-8 pt-6 border-t border-slate-100">
        <a href="{{ route('admin.contacts.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 px-5 py-2.5 rounded-lg transition">Kembali</a>
    </div>
</div>
@endsection
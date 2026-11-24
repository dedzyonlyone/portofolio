@extends('layouts.admin')
@section('title', 'Pesan Masuk')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
    <table class="w-full text-sm text-left">
        <thead class="bg-slate-50 border-b border-slate-200">
            <tr>
                <th class="p-4 font-semibold text-slate-600">Nama</th>
                <th class="p-4 font-semibold text-slate-600">Email</th>
                <th class="p-4 font-semibold text-slate-600">Subjek</th>
                <th class="p-4 font-semibold text-slate-600">Tanggal</th>
                <th class="p-4 font-semibold text-slate-600 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
            <tr class="border-b border-slate-100 hover:bg-slate-50">
                <td class="p-4 font-medium">{{ $contact->name }}</td>
                <td class="p-4">{{ $contact->email }}</td>
                <td class="p-4">{{ $contact->subject ?? '-' }}</td>
                <td class="p-4">{{ $contact->created_at->format('d M Y') }}</td>
                <td class="p-4 text-right">
                    <a href="{{ route('admin.contacts.show', $contact) }}" class="text-blue-600 hover:underline mr-3">Baca</a>
                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pesan ini?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-8 text-center text-slate-400">Belum ada pesan masuk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
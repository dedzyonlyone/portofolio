@extends('layouts.app')

@section('title', 'Hubungi Saya')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-20 relative">
    <!-- Background Blob -->
    <div class="absolute top-20 -left-20 w-72 h-72 bg-brand-300/30 dark:bg-brand-700/20 rounded-full blur-3xl -z-10 animate-blob"></div>
    <div class="absolute bottom-20 -right-20 w-72 h-72 bg-purple-300/30 dark:bg-purple-700/20 rounded-full blur-3xl -z-10 animate-blob animation-delay-2000"></div>

    <div class="text-center mb-12" data-aos="fade-up">
        <h1 class="text-4xl font-extrabold mb-4">Mari <span class="gradient-text">Berkolaborasi</span></h1>
        <p class="text-gray-600 dark:text-gray-400">Punya pertanyaan atau ingin bekerja sama? Kirim pesan di bawah ini.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-xl border border-green-200 animate-fade-up" data-aos="fade-down">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 border border-gray-100 dark:border-gray-800 shadow-2xl" data-aos="fade-up" data-aos-delay="200">
        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">Subjek (Opsional)</label>
                <input type="text" name="subject" value="{{ old('subject') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">Pesan</label>
                <textarea name="message" rows="6" required class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800 focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">{{ old('message') }}</textarea>
                @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="w-full gradient-bg text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                Kirim Pesan
            </button>
        </form>
    </div>
</div>
@endsection
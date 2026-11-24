@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')

<!-- Stat Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Profil -->
    <div class="stat-card bg-white rounded-xl shadow-sm border border-slate-200 p-6 card-lift relative overflow-hidden" data-aos="fade-up" data-aos-delay="0">
        <div class="absolute top-0 right-0 w-24 h-24 bg-blue-100 rounded-full -mr-8 -mt-8 opacity-50"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-3">
                <div class="stat-icon w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">Profil</span>
            </div>
            <div class="text-3xl font-bold text-brand-900 stat-counter" data-target="{{ $stats['profile'] }}">0</div>
            <div class="text-sm text-slate-500 mt-1">Data Profil</div>
        </div>
    </div>

    <!-- Skills -->
    <div class="stat-card bg-white rounded-xl shadow-sm border border-slate-200 p-6 card-lift relative overflow-hidden" data-aos="fade-up" data-aos-delay="100">
        <div class="absolute top-0 right-0 w-24 h-24 bg-purple-100 rounded-full -mr-8 -mt-8 opacity-50"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-3">
                <div class="stat-icon w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <span class="text-xs font-medium text-purple-600 bg-purple-50 px-2 py-1 rounded-full">Skills</span>
            </div>
            <div class="text-3xl font-bold text-brand-900 stat-counter" data-target="{{ $stats['skills'] }}">0</div>
            <div class="text-sm text-slate-500 mt-1">Total Skills</div>
        </div>
    </div>

    <!-- Projects -->
    <div class="stat-card bg-white rounded-xl shadow-sm border border-slate-200 p-6 card-lift relative overflow-hidden" data-aos="fade-up" data-aos-delay="200">
        <div class="absolute top-0 right-0 w-24 h-24 bg-green-100 rounded-full -mr-8 -mt-8 opacity-50"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-3">
                <div class="stat-icon w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">Projects</span>
            </div>
            <div class="text-3xl font-bold text-brand-900 stat-counter" data-target="{{ $stats['projects'] }}">0</div>
            <div class="text-sm text-slate-500 mt-1">Total Project</div>
        </div>
    </div>

    <!-- Hobi -->
    <div class="stat-card bg-white rounded-xl shadow-sm border border-slate-200 p-6 card-lift relative overflow-hidden" data-aos="fade-up" data-aos-delay="300">
        <div class="absolute top-0 right-0 w-24 h-24 bg-pink-100 rounded-full -mr-8 -mt-8 opacity-50"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-3">
                <div class="stat-icon w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <span class="text-xs font-medium text-pink-600 bg-pink-50 px-2 py-1 rounded-full">Hobi</span>
            </div>
            <div class="text-3xl font-bold text-brand-900 stat-counter" data-target="{{ $stats['hobbies'] }}">0</div>
            <div class="text-sm text-slate-500 mt-1">Total Hobi</div>
        </div>
    </div>
</div>

<!-- Welcome Card -->
<div class="mt-8 bg-gradient-to-br from-brand-900 via-brand-800 to-brand-900 rounded-2xl shadow-xl p-8 text-white relative overflow-hidden" data-aos="fade-up" data-aos-delay="400">
    <div class="absolute top-0 right-0 w-64 h-64 bg-brand-500/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-purple-500/20 rounded-full blur-3xl"></div>

    <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
        <div>
            <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ auth()->user()->name ?? 'Admin' }}! 👋</h2>
            <p class="text-slate-300 max-w-xl">Kelola konten portfolio kamu dari menu sidebar. Mulai dari isi <strong class="text-brand-400">Profil</strong> dulu, lalu tambahkan <strong class="text-brand-400">Skills</strong>, <strong class="text-brand-400">Projects</strong>, dan <strong class="text-brand-400">Hobi</strong>.</p>
        </div>
        <a href="{{ route('home') }}" target="_blank"
           class="btn-shine bg-brand-500 hover:bg-brand-400 text-white font-semibold px-6 py-3 rounded-lg transition shadow-lg flex items-center gap-2 whitespace-nowrap">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
            </svg>
            Lihat Website
        </a>
    </div>
</div>

<!-- Quick Actions -->
<div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
    <!-- TOMBOL EDIT PROFIL (ADMIN) -->
    <a href="{{ route('admin.profile.index') }}" class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 card-lift group" data-aos="fade-up" data-aos-delay="500">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <div class="text-sm font-semibold text-brand-900">Edit Profil</div>
                <div class="text-xs text-slate-500">Kelola data diri</div>
            </div>
        </div>
    </a>

    <!-- TOMBOL KELOLA SKILLS (ADMIN) -->
    <a href="{{ route('admin.skills.index') }}" class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 card-lift group" data-aos="fade-up" data-aos-delay="600">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
            </div>
            <div>
                <div class="text-sm font-semibold text-brand-900">Kelola Skills</div>
                <div class="text-xs text-slate-500">Soft & hard skill</div>
            </div>
        </div>
    </a>

    <!-- TOMBOL KELOLA PROJECTS (ADMIN) -->
    <a href="{{ route('admin.projects.index') }}" class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 card-lift group" data-aos="fade-up" data-aos-delay="700">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
            <div>
                <div class="text-sm font-semibold text-brand-900">Kelola Project</div>
                <div class="text-xs text-slate-500">Tambah karya</div>
            </div>
        </div>
    </a>

    <!-- TOMBOL KELOLA HOBI (ADMIN) -->
    <a href="{{ route('admin.hobbies.index') }}" class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 card-lift group" data-aos="fade-up" data-aos-delay="800">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </div>
            <div>
                <div class="text-sm font-semibold text-brand-900">Kelola Hobi</div>
                <div class="text-xs text-slate-500">Minat & kegiatan</div>
            </div>
        </div>
    </a>

    <!-- TOMBOL PESAN MASUK (ADMIN) -->
    <a href="{{ route('admin.contacts.index') }}" class="bg-white rounded-xl shadow-sm border border-slate-200 p-5 card-lift group" data-aos="fade-up" data-aos-delay="900">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div>
                <div class="text-sm font-semibold text-brand-900">Pesan Masuk</div>
                <div class="text-xs text-slate-500">Baca pesan user</div>
            </div>
        </div>
    </a>
</div>

<script>
    // Counter animation untuk stat cards
    document.querySelectorAll('.stat-counter').forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target')) || 0;
        let current = 0;
        const step = target > 0 ? Math.max(1, target / 30) : 0;
        const interval = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(interval);
            }
            counter.textContent = Math.floor(current);
        }, 40);
    });
</script>

@endsection
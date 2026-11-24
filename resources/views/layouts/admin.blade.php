<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - Portfolio Angga</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            900: '#0f172a', 800: '#1e293b', 700: '#334155',
                            600: '#475569', 500: '#3b82f6', 400: '#60a5fa',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    animation: {
                        'slide-in': 'slideIn 0.3s ease-out',
                        'fade-in': 'fadeIn 0.4s ease-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'pulse-ring': 'pulseRing 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        slideIn: {
                            '0%': { transform: 'translateX(-100%)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        pulseRing: {
                            '0%': { transform: 'scale(0.95)', boxShadow: '0 0 0 0 rgba(59, 130, 246, 0.7)' },
                            '70%': { transform: 'scale(1)', boxShadow: '0 0 0 10px rgba(59, 130, 246, 0)' },
                            '100%': { transform: 'scale(0.95)', boxShadow: '0 0 0 0 rgba(59, 130, 246, 0)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* CSS sama seperti sebelumnya */
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; }
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #1e293b; }
        ::-webkit-scrollbar-thumb { background: #3b82f6; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #60a5fa; }
        .nav-link-active { box-shadow: 0 0 20px rgba(59, 130, 246, 0.4); }
        .card-lift { transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1); }
        .card-lift:hover { transform: translateY(-4px); box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1); }
        .stat-icon { transition: all 0.3s ease; }
        .stat-card:hover .stat-icon { transform: scale(1.15) rotate(5deg); }
        tbody tr { transition: all 0.2s ease; }
        tbody tr:hover { transform: translateX(4px); background: #f8fafc; }
        .btn-shine { position: relative; overflow: hidden; }
        .btn-shine::before { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent); transition: left 0.5s; }
        .btn-shine:hover::before { left: 100%; }
        .toast-enter { animation: toastSlideIn 0.4s ease-out; }
        @keyframes toastSlideIn { from { transform: translateX(400px); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
        .sidebar-tooltip { position: absolute; left: 100%; margin-left: 8px; padding: 6px 12px; background: #1e293b; color: white; font-size: 12px; border-radius: 6px; white-space: nowrap; opacity: 0; pointer-events: none; transition: opacity 0.2s; z-index: 100; }
        .sidebar-collapsed .nav-item:hover .sidebar-tooltip { opacity: 1; }
    </style>
</head>
<body class="bg-slate-100 font-sans text-slate-800">

    <div id="top-progress" class="fixed top-0 left-0 h-1 bg-gradient-to-r from-blue-400 to-purple-500 z-[70] transition-all duration-300" style="width: 0%"></div>

    <div class="flex min-h-screen">
        <!-- SIDEBAR -->
        <aside id="sidebar" class="w-64 bg-gradient-to-b from-brand-900 to-brand-800 text-white flex flex-col fixed h-screen transition-all duration-300 z-50 shadow-2xl">
            <div class="p-6 border-b border-brand-700 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-brand-500 to-purple-500 rounded-lg flex items-center justify-center font-bold text-lg animate-pulse-ring">A</div>
                    <div id="logo-text">
                        <h1 class="text-lg font-bold tracking-wide">PORTOFOLIO</h1>
                        <p class="text-xs text-slate-400">Admin Panel</p>
                    </div>
                </div>
                <button id="sidebar-toggle" class="text-slate-400 hover:text-white transition p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
            </div>

            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="nav-item relative flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-brand-500 text-white font-medium nav-link-active' : 'hover:bg-brand-700/50 text-slate-300 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="nav-text">Dashboard</span><span class="sidebar-tooltip">Dashboard</span>
                </a>
                <a href="{{ route('admin.profile.index') }}" class="nav-item relative flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all duration-200 group {{ request()->routeIs('admin.profile.*') ? 'bg-brand-500 text-white font-medium nav-link-active' : 'hover:bg-brand-700/50 text-slate-300 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span class="nav-text">Profil</span><span class="sidebar-tooltip">Profil</span>
                </a>
                <a href="{{ route('admin.skills.index') }}" class="nav-item relative flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all duration-200 group {{ request()->routeIs('admin.skills.*') ? 'bg-brand-500 text-white font-medium nav-link-active' : 'hover:bg-brand-700/50 text-slate-300 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                    <span class="nav-text">Skills</span><span class="sidebar-tooltip">Skills</span>
                </a>
                
                <!-- LINK PROJECTS YANG BENER -->
                <a href="{{ route('admin.projects.index') }}" class="nav-item relative flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all duration-200 group {{ request()->routeIs('admin.projects.index') ? 'bg-brand-500 text-white font-medium nav-link-active' : 'hover:bg-brand-700/50 text-slate-300 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    <span class="nav-text">Projects</span><span class="sidebar-tooltip">Projects</span>
                </a>
                
                <a href="{{ route('admin.hobbies.index') }}" class="nav-item relative flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all duration-200 group {{ request()->routeIs('admin.hobbies.*') ? 'bg-brand-500 text-white font-medium nav-link-active' : 'hover:bg-brand-700/50 text-slate-300 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    <span class="nav-text">Hobi</span><span class="sidebar-tooltip">Hobi</span>
                </a>
                <a href="{{ route('admin.contacts.index') }}" class="nav-item relative flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition-all duration-200 group {{ request()->routeIs('admin.contacts.*') ? 'bg-brand-500 text-white font-medium nav-link-active' : 'hover:bg-brand-700/50 text-slate-300 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span class="nav-text">Pesan Masuk</span><span class="sidebar-tooltip">Pesan Masuk</span>
                </a>

                <div class="pt-4 mt-4 border-t border-brand-700">
                    <a href="{{ route('home') }}" target="_blank" class="nav-item relative flex items-center gap-3 px-4 py-3 rounded-lg text-sm text-slate-300 hover:bg-brand-700/50 hover:text-white transition group">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        <span class="nav-text">Lihat Website</span><span class="sidebar-tooltip">Lihat Website</span>
                    </a>
                </div>
            </nav>

            <div class="p-4 border-t border-brand-700">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brand-500 to-purple-500 flex items-center justify-center font-bold text-sm flex-shrink-0">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
                    <div id="user-info-text" class="min-w-0">
                        <div class="text-xs text-slate-400">Login sebagai:</div>
                        <div class="text-sm font-medium truncate">{{ auth()->user()->name ?? 'Admin' }}</div>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="w-full bg-red-600/90 hover:bg-red-600 text-white text-sm py-2 rounded-lg transition flex items-center justify-center gap-2 group">
                        <svg class="w-4 h-4 group-hover:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span class="nav-text">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main id="main-content" class="flex-1 ml-64 p-8 transition-all duration-300">
            <div class="flex justify-between items-center mb-6 animate-slide-up">
                <div>
                    <h1 class="text-2xl font-bold text-brand-900">@yield('title', 'Dashboard')</h1>
                    <p class="text-sm text-slate-500 mt-1">Selamat datang kembali, {{ auth()->user()->name ?? 'Admin' }} 👋</p>
                </div>
                <div class="flex items-center gap-2 text-sm text-slate-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span id="current-date"></span>
                </div>
            </div>

            @if(session('success'))
                <div id="toast" class="toast-enter fixed top-24 right-6 bg-white border-l-4 border-green-500 shadow-2xl rounded-lg p-4 flex items-start gap-3 z-[60] max-w-sm">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-slate-800 text-sm">Berhasil!</p>
                        <p class="text-slate-600 text-sm mt-0.5">{{ session('success') }}</p>
                    </div>
                    <button onclick="document.getElementById('toast').remove()" class="text-slate-400 hover:text-slate-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6 animate-slide-in">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <ul class="list-disc list-inside text-sm">
                            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 600, easing: 'ease-out-cubic', once: true, offset: 60 });

        const dateEl = document.getElementById('current-date');
        if (dateEl) {
            const now = new Date();
            const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
            dateEl.textContent = now.toLocaleDateString('id-ID', options);
        }

        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const logoText = document.getElementById('logo-text');
        const userInfoText = document.getElementById('user-info-text');

        let sidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
        applySidebar();

        function applySidebar() {
            if (sidebarCollapsed) {
                sidebar.classList.remove('w-64'); sidebar.classList.add('w-20');
                mainContent.classList.remove('ml-64'); mainContent.classList.add('ml-20');
                logoText.style.display = 'none'; userInfoText.style.display = 'none';
                document.querySelectorAll('.nav-text').forEach(el => el.style.display = 'none');
                sidebarToggle.style.transform = 'rotate(180deg)';
            } else {
                sidebar.classList.add('w-64'); sidebar.classList.remove('w-20');
                mainContent.classList.add('ml-64'); mainContent.classList.remove('ml-20');
                logoText.style.display = 'block'; userInfoText.style.display = 'block';
                document.querySelectorAll('.nav-text').forEach(el => el.style.display = 'inline');
                sidebarToggle.style.transform = 'rotate(0deg)';
            }
        }

        sidebarToggle.addEventListener('click', () => {
            sidebarCollapsed = !sidebarCollapsed;
            localStorage.setItem('sidebarCollapsed', sidebarCollapsed);
            applySidebar();
        });

        const topProgress = document.getElementById('top-progress');
        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
            topProgress.style.width = progress + '%';
        });

        const toast = document.getElementById('toast');
        if (toast) {
            setTimeout(() => {
                toast.style.transition = 'all 0.5s ease';
                toast.style.transform = 'translateX(400px)';
                toast.style.opacity = '0';
                setTimeout(() => toast.remove(), 500);
            }, 4000);
        }
    </script>
</body>
</html>
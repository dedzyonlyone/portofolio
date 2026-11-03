<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->name ?? 'Portfolio' }} - Personal Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { 900: '#0f172a', 800: '#1e293b', 700: '#334155', 500: '#3b82f6', 400: '#60a5fa' }
                    },
                    fontFamily: { sans: ['Inter', 'ui-sans-serif', 'system-ui'] }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        html { scroll-behavior: smooth; }
        .line-clamp-3 {
            display: -webkit-box; -webkit-line-clamp: 3;
            -webkit-box-orient: vertical; overflow: hidden;
        }
    </style>
</head>
<body class="font-sans text-slate-800 bg-slate-50">

    <nav class="fixed top-0 w-full bg-brand-900/95 backdrop-blur text-white z-50 border-b border-brand-700">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="font-bold text-lg tracking-wide">{{ $profile->name ?? 'PORTOFOLIO' }}</div>
            <div class="hidden md:flex gap-6 text-sm">
                <a href="#tentang" class="hover:text-brand-400 transition">Tentang</a>
                <a href="#skills" class="hover:text-brand-400 transition">Skills</a>
                <a href="#projects" class="hover:text-brand-400 transition">Projects</a>
                <a href="#hobi" class="hover:text-brand-400 transition">Hobi</a>
            </div>
        </div>
    </nav>

    <section id="tentang" class="bg-brand-900 text-white pt-32 pb-24">
        <div class="container mx-auto px-6">
            @if($profile)
                <div class="max-w-4xl mx-auto text-center">
                    @if($profile->photo)
                        <img src="{{ asset('storage/'.$profile->photo) }}" class="w-40 h-40 rounded-full mx-auto mb-6 object-cover border-4 border-brand-500 shadow-xl">
                    @else
                        <div class="w-40 h-40 rounded-full mx-auto mb-6 bg-brand-700 border-4 border-brand-500 flex items-center justify-center text-5xl">👤</div>
                    @endif
                    <p class="text-brand-400 font-medium tracking-widest text-sm mb-2">HELLO, I AM</p>
                    <h1 class="text-5xl font-extrabold mb-4">{{ $profile->name }}</h1>
                    <p class="text-slate-300 text-lg max-w-2xl mx-auto leading-relaxed">{{ $profile->about }}</p>
                    @if($profile->kelebihan)
                        <div class="mt-10 bg-brand-800/60 border border-brand-700 rounded-xl p-6 max-w-2xl mx-auto text-left">
                            <h3 class="text-brand-400 font-semibold text-sm tracking-wider mb-3">KELEBIHAN SAYA</h3>
                            <p class="text-slate-300 leading-relaxed">{{ $profile->kelebihan }}</p>
                        </div>
                    @endif
                </div>
            @else
                <div class="text-center">
                    <h1 class="text-4xl font-bold mb-4">Portfolio Belum Diisi</h1>
                    <p class="text-slate-400">Admin belum menambahkan profil.</p>
                </div>
            @endif
        </div>
    </section>

    @if($hardSkills->count() > 0)
    <section id="skills" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <p class="text-brand-500 font-medium tracking-widest text-sm mb-2">HARD SKILLS</p>
                <h2 class="text-3xl font-bold text-brand-900">Kemampuan Teknis</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                @foreach($hardSkills as $skill)
                <div class="bg-slate-50 border border-slate-200 rounded-xl p-5">
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold text-brand-900">{{ $skill->name }}</span>
                        @if($skill->level)<span class="text-sm text-slate-500">{{ $skill->level }}%</span>@endif
                    </div>
                    @if($skill->level)
                        <div class="w-full bg-slate-200 rounded-full h-2">
                            <div class="bg-brand-500 h-2 rounded-full transition-all" style="width: {{ $skill->level }}%"></div>
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($softSkills->count() > 0)
    <section class="py-20 bg-slate-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <p class="text-brand-500 font-medium tracking-widest text-sm mb-2">SOFT SKILLS</p>
                <h2 class="text-3xl font-bold text-brand-900">Kemampuan Interpersonal</h2>
            </div>
            <div class="flex flex-wrap justify-center gap-3 max-w-3xl mx-auto">
                @foreach($softSkills as $skill)
                    <span class="bg-white border border-brand-400 text-brand-900 font-medium px-5 py-2.5 rounded-full shadow-sm">{{ $skill->name }}</span>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($projects->count() > 0)
    <section id="projects" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <p class="text-brand-500 font-medium tracking-widest text-sm mb-2">PROJECTS</p>
                <h2 class="text-3xl font-bold text-brand-900">Project yang Pernah Dikerjakan</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($projects as $project)
                <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition">
                    @if($project->image)
                        <img src="{{ asset('storage/'.$project->image) }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-slate-100 flex items-center justify-center text-slate-400">No Image</div>
                    @endif
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-brand-900">{{ $project->title }}</h3>
                        <p class="text-slate-600 text-sm mt-2 line-clamp-3">{{ $project->description }}</p>
                        @if($project->link)
                            <a href="{{ $project->link }}" target="_blank" class="inline-block mt-4 text-brand-500 font-medium text-sm hover:underline">Lihat Project →</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if($hobbies->count() > 0)
    <section id="hobi" class="py-20 bg-slate-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <p class="text-brand-500 font-medium tracking-widest text-sm mb-2">HOBI</p>
                <h2 class="text-3xl font-bold text-brand-900">Minat & Kegiatan</h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-3xl mx-auto">
                @foreach($hobbies as $hobby)
                <div class="bg-white border border-slate-200 rounded-xl p-5 text-center shadow-sm hover:shadow-md transition">
                    <div class="text-4xl mb-2">{{ $hobby->icon ?? '🎯' }}</div>
                    <div class="font-medium text-brand-900 text-sm">{{ $hobby->name }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <footer class="bg-brand-900 text-slate-400 py-8">
        <div class="container mx-auto px-6 text-center text-sm">
            <p>&copy; {{ date('Y') }} {{ $profile->name ?? 'Portfolio' }}. All rights reserved.</p>
            <p class="mt-1 text-xs">Built with Laravel & Tailwind CSS</p>
        </div>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->name ?? 'Portfolio' }} - Personal Portfolio</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { 900: '#0f172a', 800: '#1e293b', 700: '#334155', 500: '#3b82f6', 400: '#60a5fa' }
                    },
                    fontFamily: { sans: ['Inter', 'ui-sans-serif', 'system-ui'] },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-slow': 'float 9s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'gradient': 'gradient 8s ease infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        gradient: {
                            '0%, 100%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">

    <!-- AOS: Animate On Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; overflow-x: hidden; }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #3b82f6; border-radius: 5px; }
        ::-webkit-scrollbar-thumb:hover { background: #60a5fa; }

        .line-clamp-3 {
            display: -webkit-box; -webkit-line-clamp: 3;
            -webkit-box-orient: vertical; overflow: hidden;
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #60a5fa 0%, #a78bfa 50%, #f472b6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Animated gradient background */
        .animated-bg {
            background: linear-gradient(-45deg, #0f172a, #1e293b, #1e3a8a, #0f172a);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Glow effect */
        .glow {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.5),
                        0 0 40px rgba(59, 130, 246, 0.3);
        }

        /* Card hover lift */
        .card-lift {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-lift:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* Navbar blur on scroll */
        .navbar-scrolled {
            background: rgba(15, 23, 42, 0.98) !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        /* Typing cursor */
        .typing-cursor::after {
            content: '|';
            animation: blink 1s step-end infinite;
            color: #60a5fa;
            font-weight: 300;
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* Skill bar animation */
        .skill-bar {
            position: relative;
            overflow: hidden;
        }
        .skill-bar::after {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: shimmer 2s infinite;
        }
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        /* Scroll indicator bounce */
        .scroll-indicator {
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        /* Particle dots background */
        .dots-bg {
            background-image: radial-gradient(rgba(96, 165, 250, 0.3) 1px, transparent 1px);
            background-size: 30px 30px;
        }

        /* Photo pulse ring */
        .photo-ring {
            position: relative;
        }
        .photo-ring::before {
            content: '';
            position: absolute;
            inset: -10px;
            border-radius: 50%;
            border: 2px solid rgba(96, 165, 250, 0.6);
            animation: ringPulse 2.5s ease-out infinite;
        }
        .photo-ring::after {
            content: '';
            position: absolute;
            inset: -10px;
            border-radius: 50%;
            border: 2px solid rgba(96, 165, 250, 0.4);
            animation: ringPulse 2.5s ease-out infinite;
            animation-delay: 1s;
        }
        @keyframes ringPulse {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.4); opacity: 0; }
        }

        /* Hobby icon float on hover */
        .hobby-card:hover .hobby-icon {
            animation: wiggle 0.6s ease-in-out;
        }
        @keyframes wiggle {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-15deg) scale(1.1); }
            75% { transform: rotate(15deg) scale(1.1); }
        }

        /* Button shine */
        .btn-shine {
            position: relative;
            overflow: hidden;
        }
        .btn-shine::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        .btn-shine:hover::before {
            left: 100%;
        }

        /* Smooth reveal */
        [data-aos] {
            pointer-events: none;
        }
        [data-aos].aos-animate {
            pointer-events: auto;
        }
    </style>
</head>
<body class="font-sans text-slate-800 bg-slate-50">

    <!-- Progress bar di atas -->
    <div id="progress-bar" class="fixed top-0 left-0 h-1 bg-gradient-to-r from-blue-400 to-purple-500 z-[60] transition-all duration-150" style="width: 0%"></div>

    <!-- NAVBAR -->
    <nav id="navbar" class="fixed top-0 w-full bg-brand-900/90 backdrop-blur text-white z-50 border-b border-brand-700 transition-all duration-300">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="font-bold text-lg tracking-wide">
                <span class="text-brand-400">&lt;/&gt;</span> {{ $profile->name ?? 'PORTOFOLIO' }}
            </div>
            <div class="hidden md:flex gap-6 text-sm">
                <a href="#tentang" class="hover:text-brand-400 transition relative group">
                    Tentang
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-brand-400 transition-all group-hover:w-full"></span>
                </a>
                <a href="#skills" class="hover:text-brand-400 transition relative group">
                    Skills
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-brand-400 transition-all group-hover:w-full"></span>
                </a>
                <a href="#projects" class="hover:text-brand-400 transition relative group">
                    Projects
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-brand-400 transition-all group-hover:w-full"></span>
                </a>
                <a href="#hobi" class="hover:text-brand-400 transition relative group">
                    Hobi
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-brand-400 transition-all group-hover:w-full"></span>
                </a>
            </div>
        </div>
    </nav>

    <!-- HERO / TENTANG -->
    <section id="tentang" class="relative animated-bg text-white pt-32 pb-24 overflow-hidden">
        <!-- Decorative blur circles -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl animate-float-slow"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-pink-500/10 rounded-full blur-3xl animate-pulse-slow"></div>

        <!-- Dots pattern -->
        <div class="absolute inset-0 dots-bg opacity-30"></div>

        <div class="container mx-auto px-6 relative z-10">
            @if($profile)
                <div class="max-w-4xl mx-auto text-center">
                    @if($profile->photo)
                        <div class="photo-ring inline-block mb-6" data-aos="zoom-in" data-aos-duration="1000">
                            <img src="{{ asset('storage/'.$profile->photo) }}" class="w-40 h-40 rounded-full object-cover border-4 border-brand-500 shadow-2xl">
                        </div>
                    @else
                        <div class="photo-ring inline-block mb-6" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="w-40 h-40 rounded-full bg-brand-700 border-4 border-brand-500 flex items-center justify-center text-5xl shadow-2xl">👤</div>
                        </div>
                    @endif

                    <p class="text-brand-400 font-medium tracking-widest text-sm mb-2" data-aos="fade-up" data-aos-delay="100">
                        HELLO, I AM
                    </p>
                    <h1 class="text-5xl md:text-6xl font-extrabold mb-4" data-aos="fade-up" data-aos-delay="200">
                        {{ $profile->name }}
                    </h1>

                    <!-- Typing effect -->
                    <p class="text-xl md:text-2xl text-brand-400 mb-6 h-8" data-aos="fade-up" data-aos-delay="300">
                        <span id="typed-text" class="typing-cursor font-mono"></span>
                    </p>

                    <p class="text-slate-300 text-lg max-w-2xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="400">
                        {{ $profile->about }}
                    </p>

                    <!-- CTA Buttons -->
                    <div class="mt-8 flex flex-wrap justify-center gap-4" data-aos="fade-up" data-aos-delay="500">
                        <a href="#projects" class="btn-shine bg-brand-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg transition shadow-lg hover:shadow-blue-500/50">
                            Lihat Project →
                        </a>
                        <a href="#skills" class="btn-shine border-2 border-brand-400 text-brand-400 hover:bg-brand-400 hover:text-brand-900 font-semibold px-6 py-3 rounded-lg transition">
                            Skills Saya
                        </a>
                    </div>

                    @if($profile->kelebihan)
                        <div class="mt-12 bg-brand-800/60 backdrop-blur border border-brand-700 rounded-xl p-6 max-w-2xl mx-auto text-left card-lift" data-aos="fade-up" data-aos-delay="600">
                            <h3 class="text-brand-400 font-semibold text-sm tracking-wider mb-3 flex items-center gap-2">
                                <span class="w-2 h-2 bg-brand-400 rounded-full animate-pulse"></span>
                                KELEBIHAN SAYA
                            </h3>
                            <p class="text-slate-300 leading-relaxed whitespace-pre-line">{{ $profile->kelebihan }}</p>
                        </div>
                    @endif
                </div>
            @else
                <div class="text-center">
                    <h1 class="text-4xl font-bold mb-4">Portfolio Belum Diisi</h1>
                    <p class="text-slate-400">Admin belum menambahkan profil.</p>
                </div>
            @endif

            <!-- Scroll indicator -->
            <div class="text-center mt-16">
                <a href="#skills" class="scroll-indicator inline-block text-brand-400 hover:text-white transition">
                    <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- HARD SKILLS -->
    @if($hardSkills->count() > 0)
    <section id="skills" class="py-20 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-100 rounded-full blur-3xl opacity-50"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-12" data-aos="fade-up">
                <p class="text-brand-500 font-medium tracking-widest text-sm mb-2">HARD SKILLS</p>
                <h2 class="text-3xl md:text-4xl font-bold text-brand-900">Kemampuan Teknis</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-400 to-purple-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                @foreach($hardSkills as $index => $skill)
                <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 card-lift"
                     data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold text-brand-900 flex items-center gap-2">
                            <span class="w-2 h-2 bg-brand-500 rounded-full"></span>
                            {{ $skill->name }}
                        </span>
                        @if($skill->level)
                            <span class="text-sm font-mono text-brand-500 font-semibold skill-counter" data-target="{{ $skill->level }}">0%</span>
                        @endif
                    </div>
                    @if($skill->level)
                        <div class="w-full bg-slate-200 rounded-full h-2.5 overflow-hidden">
                            <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-2.5 rounded-full skill-bar transition-all duration-1500 ease-out"
                                 style="width: 0%" data-width="{{ $skill->level }}%"></div>
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- SOFT SKILLS -->
    @if($softSkills->count() > 0)
    <section class="py-20 bg-slate-50 relative overflow-hidden">
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-purple-100 rounded-full blur-3xl opacity-50"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-12" data-aos="fade-up">
                <p class="text-brand-500 font-medium tracking-widest text-sm mb-2">SOFT SKILLS</p>
                <h2 class="text-3xl md:text-4xl font-bold text-brand-900">Kemampuan Interpersonal</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-400 to-purple-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="flex flex-wrap justify-center gap-3 max-w-3xl mx-auto">
                @foreach($softSkills as $index => $skill)
                    <span class="bg-white border border-brand-400 text-brand-900 font-medium px-5 py-2.5 rounded-full shadow-sm hover:shadow-lg hover:bg-brand-500 hover:text-white hover:border-brand-500 transition-all duration-300 cursor-default card-lift"
                          data-aos="zoom-in" data-aos-delay="{{ $index * 80 }}">
                        {{ $skill->name }}
                    </span>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- PROJECTS -->
    @if($projects->count() > 0)
    <section id="projects" class="py-20 bg-white relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-12" data-aos="fade-up">
                <p class="text-brand-500 font-medium tracking-widest text-sm mb-2">PROJECTS</p>
                <h2 class="text-3xl md:text-4xl font-bold text-brand-900">Project yang Pernah Dikerjakan</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-400 to-purple-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($projects as $index => $project)
                <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm card-lift group"
                     data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">
                    <div class="overflow-hidden">
                        @if($project->image)
                            <img src="{{ asset('storage/'.$project->image) }}"
                                 class="w-full h-48 object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center text-slate-400 transition-transform duration-700 group-hover:scale-110">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-brand-900 group-hover:text-brand-500 transition">{{ $project->title }}</h3>
                        <p class="text-slate-600 text-sm mt-2 line-clamp-3">{{ $project->description }}</p>
                        @if($project->link)
                            <a href="{{ $project->link }}" target="_blank"
                               class="inline-flex items-center gap-1 mt-4 text-brand-500 font-medium text-sm hover:gap-2 transition-all">
                                Lihat Project
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- HOBI -->
    @if($hobbies->count() > 0)
    <section id="hobi" class="py-20 bg-slate-50 relative overflow-hidden">
        <div class="absolute top-10 right-10 w-72 h-72 bg-pink-100 rounded-full blur-3xl opacity-50"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-12" data-aos="fade-up">
                <p class="text-brand-500 font-medium tracking-widest text-sm mb-2">HOBI</p>
                <h2 class="text-3xl md:text-4xl font-bold text-brand-900">Minat & Kegiatan</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-400 to-purple-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-3xl mx-auto">
                @foreach($hobbies as $index => $hobby)
                <div class="bg-white border border-slate-200 rounded-xl p-5 text-center shadow-sm hover:shadow-xl transition-all duration-300 cursor-default hobby-card card-lift"
                     data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                    <div class="text-4xl mb-2 hobby-icon inline-block">{{ $hobby->icon ?? '🎯' }}</div>
                    <div class="font-medium text-brand-900 text-sm">{{ $hobby->name }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- FOOTER -->
    <footer class="bg-brand-900 text-slate-400 py-8 relative overflow-hidden">
        <div class="absolute inset-0 dots-bg opacity-20"></div>
        <div class="container mx-auto px-6 text-center text-sm relative z-10">
            <p>&copy; {{ date('Y') }} <span class="text-brand-400 font-semibold">{{ $profile->name ?? 'Portfolio' }}</span>. All rights reserved.</p>
            <p class="mt-1 text-xs">Built with <span class="text-red-400">♥</span> using Laravel & Tailwind CSS</p>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-6 right-6 w-12 h-12 bg-brand-500 hover:bg-brand-400 text-white rounded-full shadow-lg transition-all duration-300 opacity-0 pointer-events-none z-40 flex items-center justify-center">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Init AOS
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 80,
        });

        // === PROGRESS BAR ===
        const progressBar = document.getElementById('progress-bar');
        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const progress = (scrollTop / docHeight) * 100;
            progressBar.style.width = progress + '%';
        });

        // === NAVBAR SCROLL EFFECT ===
        const navbar = document.getElementById('navbar');
        const backToTop = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
            if (window.scrollY > 400) {
                backToTop.classList.remove('opacity-0', 'pointer-events-none');
            } else {
                backToTop.classList.add('opacity-0', 'pointer-events-none');
            }
        });

        // === BACK TO TOP ===
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // === TYPING EFFECT ===
        const typingTexts = [
            'Full-Stack Web Developer',
            'Laravel Enthusiast',
            'Problem Solver',
            'Always Learning'
        ];
        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        const typedElement = document.getElementById('typed-text');

        function type() {
            const currentText = typingTexts[textIndex];
            if (isDeleting) {
                typedElement.textContent = currentText.substring(0, charIndex - 1);
                charIndex--;
            } else {
                typedElement.textContent = currentText.substring(0, charIndex + 1);
                charIndex++;
            }

            let speed = isDeleting ? 50 : 100;

            if (!isDeleting && charIndex === currentText.length) {
                speed = 2000;
                isDeleting = true;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                textIndex = (textIndex + 1) % typingTexts.length;
                speed = 500;
            }

            setTimeout(type, speed);
        }

        if (typedElement) type();

        // === SKILL BAR + COUNTER ANIMATION ON SCROLL ===
        const skillBars = document.querySelectorAll('.skill-bar');
        const skillCounters = document.querySelectorAll('.skill-counter');
        let skillsAnimated = false;

        function animateSkills() {
            if (skillsAnimated) return;
            const skillsSection = document.getElementById('skills');
            if (!skillsSection) return;

            const rect = skillsSection.getBoundingClientRect();
            if (rect.top < window.innerHeight - 100 && rect.bottom > 0) {
                skillsAnimated = true;

                skillBars.forEach(bar => {
                    const width = bar.getAttribute('data-width');
                    setTimeout(() => { bar.style.width = width; }, 100);
                });

                skillCounters.forEach(counter => {
                    const target = parseInt(counter.getAttribute('data-target'));
                    let current = 0;
                    const step = target / 60;
                    const interval = setInterval(() => {
                        current += step;
                        if (current >= target) {
                            current = target;
                            clearInterval(interval);
                        }
                        counter.textContent = Math.floor(current) + '%';
                    }, 20);
                });
            }
        }

        window.addEventListener('scroll', animateSkills);
        window.addEventListener('load', animateSkills);
    </script>

</body>
</html>
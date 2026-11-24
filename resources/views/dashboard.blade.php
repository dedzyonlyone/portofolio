@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- HERO SECTION -->
<section class="relative overflow-hidden pt-20 pb-28">
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 -left-40 w-96 h-96 bg-brand-300/30 dark:bg-brand-700/20 rounded-full blur-3xl animate-blob"></div>
        <div class="absolute top-40 -right-40 w-96 h-96 bg-purple-300/30 dark:bg-purple-700/20 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300/30 dark:bg-pink-700/20 rounded-full blur-3xl animate-blob animation-delay-4000"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right" data-aos-duration="1000">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-50 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 text-sm font-semibold mb-6 border border-brand-200 dark:border-brand-800 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    Available for work
                </div>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold leading-tight mb-4">
                    Hi, Saya <br>
                    <span class="gradient-text">{{ $profile->name ?? 'Developer' }}</span>
                </h1>
                
                <p class="text-2xl md:text-3xl font-semibold text-gray-600 dark:text-gray-400 mb-6 h-10">
                    <span id="typed-text" class="typing-cursor font-mono text-brand-600 dark:text-brand-400"></span>
                </p>

                <p class="text-lg text-gray-600 dark:text-gray-400 mb-10 max-w-lg leading-relaxed">{{ $profile->bio ?? 'Saya adalah seorang Web Developer yang berfokus pada pengembangan aplikasi web modern.' }}</p>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('contact.create') }}" class="group relative inline-flex items-center gap-2 gradient-bg text-white px-7 py-3.5 rounded-xl font-semibold shadow-xl shadow-brand-500/30 hover:shadow-2xl hover:shadow-brand-500/50 hover:-translate-y-1 transition-all duration-300">
                        Hubungi Saya
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            <div class="relative flex justify-center" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                <div class="relative w-80 h-80 md:w-96 md:h-96 group">
                    <div class="absolute inset-0 gradient-bg rounded-full blur-2xl opacity-40 group-hover:opacity-70 animate-pulse transition-opacity duration-500"></div>
                    <div class="relative w-full h-full rounded-full overflow-hidden border-4 border-white dark:border-gray-800 shadow-2xl animate-float z-10">
                        @if($profile && $profile->photo)
                            <img src="{{ Storage::url($profile->photo) }}" alt="Profile" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @else
                            <div class="w-full h-full gradient-bg flex items-center justify-center">
                                <span class="text-[10rem]">👨‍💻</span>
                            </div>
                        @endif
                    </div>
                    <div class="absolute -right-4 top-10 bg-white dark:bg-gray-800 p-3 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 z-20 animate-float" style="animation-delay: 1s;">
                        <span class="text-2xl">💻</span>
                    </div>
                    <div class="absolute -left-4 bottom-10 bg-white dark:bg-gray-800 p-3 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 z-20 animate-float" style="animation-delay: 2s;">
                        <span class="text-2xl">🚀</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TENTANG SAYA -->
<section class="py-20 bg-gray-50 dark:bg-gray-900/50 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right" data-aos-delay="100">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-6">Tentang <span class="gradient-text">Saya</span></h2>
                
                <!-- KODE TENTANG SAYA YANG UDAH BERSIH -->
                <div class="prose prose-lg dark:prose-invert text-gray-600 dark:text-gray-400 leading-relaxed mb-8">
                    @if($profile && $profile->about)
                        {!! nl2br(e($profile->about)) !!}
                    @else
                        <p class="italic text-gray-400">Belum ada deskripsi tentang saya. Silakan isi di menu Edit Profile.</p>
                    @endif
                </div>
            </div>
            
            <div class="relative hidden md:block" data-aos="fade-left" data-aos-delay="200">
                <div class="absolute inset-0 gradient-bg rounded-3xl opacity-20 dark:opacity-30 transform rotate-3 scale-105 blur-sm"></div>
                <div class="relative bg-white dark:bg-gray-900 rounded-3xl p-8 border border-gray-100 dark:border-gray-800 shadow-2xl card-3d">
                    <div class="text-6xl mb-4 animate-bounce">💡</div>
                    <h3 class="text-2xl font-bold mb-4">Visi Saya</h3>
                    <p class="text-gray-600 dark:text-gray-400 italic leading-relaxed">"Membangun solusi digital yang tidak hanya berfungsi dengan baik, tetapi juga memberikan pengalaman pengguna yang luar biasa dan menyenangkan."</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SKILLS -->
<section class="py-20 bg-white dark:bg-gray-900/50 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-sm font-semibold text-brand-600 dark:text-brand-400 uppercase tracking-wider">Expertise</span>
            <h2 class="text-4xl md:text-5xl font-extrabold mt-2 mb-4">Skills & <span class="gradient-text">Tech Stack</span></h2>
            <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">Teknologi yang saya kuasai untuk membangun produk digital yang berkualitas.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            @foreach($skills as $category => $categorySkills)
                <div class="bg-gray-50 dark:bg-gray-900 rounded-2xl p-8 border border-gray-100 dark:border-gray-800 card-3d" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center text-white shadow-lg">
                            @if($category == 'frontend') 🎨 @elseif($category == 'backend') ⚙️ @elseif($category == 'database') 🗄️ @else 💻 @endif
                        </div>
                        <h3 class="text-2xl font-bold capitalize">{{ $category }}</h3>
                    </div>
                    <div class="space-y-5">
                        @foreach($categorySkills as $skill)
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span class="font-semibold text-sm">{{ $skill->name }}</span>
                                    <span class="text-sm font-bold gradient-text">{{ $skill->level }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-800 rounded-full h-2.5 overflow-hidden">
                                    <div class="gradient-bg h-2.5 rounded-full skill-bar" data-width="{{ $skill->level }}%" style="width: 0%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- FEATURED PROJECTS -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-sm font-semibold text-brand-600 dark:text-brand-400 uppercase tracking-wider">Portfolio</span>
            <h2 class="text-4xl md:text-5xl font-extrabold mt-2 mb-4">Featured <span class="gradient-text">Projects</span></h2>
            <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">Beberapa karya terbaik yang pernah saya kerjakan.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @forelse($featuredProjects as $project)
                <div class="group bg-white dark:bg-gray-900 rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-800 shadow-lg card-3d block" data-aos="fade-up" data-aos-delay="{{ $loop->index * 150 }}">
                    <div class="relative h-52 overflow-hidden">
                        @if($project->image)
                            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full gradient-bg flex items-center justify-center text-6xl opacity-80 group-hover:scale-110 transition-transform duration-700">💼</div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-6 relative">
                        <h3 class="text-xl font-bold mb-2 group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">{{ $project->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4 text-sm line-clamp-2">{{ $project->description }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @if($project->tech_stack)
                                @foreach(explode(',', $project->tech_stack) as $tech)
                                    <span class="px-3 py-1 rounded-full bg-brand-50 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 text-xs font-medium border border-brand-100 dark:border-brand-800">{{ trim($tech) }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500 dark:text-gray-400 py-10">Belum ada project featured.</p>
            @endforelse
        </div>
    </div>
</section>

<script>
    const typingTexts = ['Web Developer', 'UI/UX Enthusiast', 'Problem Solver', 'Tech Explorer'];
    let textIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    const typedElement = document.getElementById('typed-text');

    function type() {
        if (!typedElement) return;
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
            speed = 2000; isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            textIndex = (textIndex + 1) % typingTexts.length;
            speed = 500;
        }
        setTimeout(type, speed);
    }
    if (typedElement) type();

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const bars = entry.target.querySelectorAll('.skill-bar');
                bars.forEach(bar => {
                    const width = bar.getAttribute('data-width');
                    setTimeout(() => {
                        bar.style.transition = 'width 1.5s ease-out';
                        bar.style.width = width;
                    }, 200);
                });
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.card-3d').forEach(card => {
        observer.observe(card);
    });
</script>

@endsection
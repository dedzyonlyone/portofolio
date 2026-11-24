@extends('layouts.app')

@section('title', 'Semua Projects')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    
    <div class="text-center mb-16" data-aos="fade-up">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Semua <span class="gradient-text">Projects</span></h1>
        <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">Kumpulan karya dan eksperimen yang pernah saya kerjakan.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        @forelse($projects as $project)
            <a href="{{ route('projects.show', $project) }}" class="group bg-white dark:bg-gray-900 rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-800 shadow-lg card-3d block" data-aos="zoom-in-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="relative h-52 overflow-hidden">
                    @if($project->image)
                        <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="w-full h-full gradient-bg flex items-center justify-center text-6xl opacity-80 group-hover:scale-110 transition-transform duration-700">💼</div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 group-hover:text-brand-600 dark:group-hover:text-brand-400 transition-colors">{{ $project->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4 text-sm line-clamp-2">{{ $project->description }}</p>
                    
                    <div class="flex flex-wrap gap-2 mb-4">
                        @if($project->tech_stack)
                            @foreach(explode(',', $project->tech_stack) as $tech)
                                <span class="px-3 py-1 rounded-full bg-brand-50 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 text-xs font-medium">{{ trim($tech) }}</span>
                            @endforeach
                        @endif
                    </div>

                    <span class="inline-flex items-center gap-1 text-brand-600 dark:text-brand-400 font-semibold text-sm group-hover:gap-2 transition-all">
                        Lihat Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </span>
                </div>
            </a>
        @empty
            <div class="col-span-3 text-center py-10">
                <p class="text-gray-500 dark:text-gray-400 text-lg">Belum ada project yang ditambahkan.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
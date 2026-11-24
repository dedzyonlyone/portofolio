@extends('layouts.app')

@section('title', $project->title)

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    
    <div data-aos="fade-right">
        <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 text-brand-600 dark:text-brand-400 font-semibold mb-8 hover:gap-3 transition-all hover:-translate-x-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Semua Project
        </a>
    </div>

    <h1 class="text-4xl md:text-5xl font-extrabold mb-6" data-aos="fade-up">{{ $project->title }}</h1>
    
    <div class="flex flex-wrap gap-2 mb-8" data-aos="fade-up" data-aos-delay="100">
        @if($project->tech_stack)
            @foreach(explode(',', $project->tech_stack) as $tech)
                <span class="px-4 py-1.5 rounded-full gradient-bg text-white text-sm font-medium shadow-md">{{ trim($tech) }}</span>
            @endforeach
        @endif
    </div>

    @if($project->image)
        <div class="rounded-2xl overflow-hidden mb-8 border border-gray-200 dark:border-gray-800 shadow-2xl" data-aos="zoom-in" data-aos-delay="200">
            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-auto">
        </div>
    @endif

    <div class="prose prose-lg dark:prose-invert max-w-none text-gray-600 dark:text-gray-400 leading-relaxed mb-10" data-aos="fade-up" data-aos-delay="300">
        {!! nl2br(e($project->description)) !!}
    </div>

    @if($project->link)
        <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-800" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ $project->link }}" target="_blank" class="inline-flex items-center gap-2 gradient-bg text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all">
                Kunjungi Project
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>
    @endif
</div>
@endsection
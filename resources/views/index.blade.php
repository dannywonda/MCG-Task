@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="courses">
            <h2 class="uppercase tracking-wider text-orange text-lg font-bold">
                courses
            </h2>
            <hr>
            <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8">
                @forelse ($results as $course)
                    @include('component.course', ['course' => $course, [$course['id']]])
                @empty
                    <div class="p-3">
                        No Course
                    </div>
                @endforelse
            </div>
        </div>
    </div>    
@endsection
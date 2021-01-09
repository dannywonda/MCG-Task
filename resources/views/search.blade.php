@extends('layouts.main')

@section('content')

    <div class="container mx-auto h-full sm:p-10">
        <h1 class="uppercase tracking-wider text-orange text-xl mb-4 font-bold border-b-2 border-solid border-blue-500">
            Search Result for {{ $tagName }}
        </h1>
        @forelse ($results as $result)
            <a href="{{ route('show', $result->slug) }}" class="mb-6">
                <div class="w-1/2 mb-2">                
                    <div class=" flex flex-wrap items-center text-gray-400">
                        <img width="300" height="200" src="{{ $result->image }}" alt="{{ $result->image }}" />
                    </div>
                    <h2 class="mt-2 font-extrabold">{{ $result->name }}</h2>    
                    <span>{{ $result->description }} </span> 
                    <hr class="mt-2" /> 
                </div>
            </a>
        @empty
            No Result
        @endforelse
    </div>
@endsection
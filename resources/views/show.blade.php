@extends('layouts.main')

@section('content')
<div class="flex flex-wrap">
    <div class="w-full sm:w-6/12 mb-10">
        <div class="container mx-auto h-full sm:p-10">
            <nav class="flex px-4 justify-between items-center">
                <div class="text-4xl font-bold">
                    {{ $result->name }}
                    <span class="text-green-700"> by {{ $result->author }}</span>
                </div>
            </nav>
            <header class="container px-4 lg:flex mt-10 items-center h-full lg:mt-0">
                <div class="w-full">                
                    <div class="flex flex-wrap items-center text-gray-400 text-sm">
                        <span class="ml-1">
                            @if (floor( $result->rating ))
                                @foreach (range(1, floor( $result->rating )) as $key => $value)
                                    <i class="fas fa-star"></i>
                                @endforeach
                                {!! is_numeric( $result->rating ) && strpos( $result->rating, '.' ) !== false ? '<i class="fas fa-star-half-alt"></i> ' : '' !!}
                            @else
                                No Rating
                            @endif
                        </span>
                        <span class="mx-2">|</span>
                        <span> ({{ $result->votes }})</span>
                        <span class="mx-2">|</span>
                        <span> tags: 
                            @foreach ($result->tags as $key => $value)
                                @if( count( $result->tags ) != $key + 1 )
                                    <a class="text-sm" href="{{ route('search', $value->slug) }}">{{ $value->name }} </a> |
                                @else
                                    <a class="text-sm" href="{{ route('search', $value->slug) }}">{{ $value->name }} </a>
                                @endif
                            @endforeach
                        </span> 
                    </div>
                    <div class="w-20 h-2 bg-green-700 my-4"></div>
                    <p class="text-xl mb-10"> {{  $result->description }} </p>
                </div>
            </header>
            <div class="text-4xl font-bold">
                <span class="text-green-700 border-b-2">Course Content</span>
            </div>
        </div>
    </div>
    <div class="w-full sm:w-6/12">
        <iframe class="w-full" height="550" src="https://www.youtube.com/embed/{{ $result->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
@endsection
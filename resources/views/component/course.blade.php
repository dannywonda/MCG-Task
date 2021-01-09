<div class="mt-8">
    <a href="{{ route('show', [ $course->slug ]) }}">
        <img 
            src="{{ $course->image }}"
            width="300"
            height="200"
            alt="course-name"
            class="hover:opacity-75 transition ease-in-out duration-150"
        />
        <div class="mt-2">
            <div class="text-lg mt-2 hover:text-gray:300">
                <span>{{ $course->name }}</span> 
                <div class="flex items-center">
                    <span class="text-gray-400 text-sm"> {{ $course->author }} </span>
                </div>
                <div class="flex items-center">
                    <span class="text-gray-400 text-sm mr-2">  {{ $course->rating }} </span>
                    <span class="text-gray-400 text-sm mr-2">
                        @if (floor( $course->rating ))
                            @foreach (range(1, floor( $course->rating )) as $key => $value)
                                <i class="fas fa-star"></i>
                            @endforeach
                            {!! is_numeric( $course->rating ) && strpos( $course->rating, '.' ) !== false ? '<i class="fas fa-star-half-alt"></i> ' : '' !!}
                        @else
                            No Rating
                        @endif
                    </span>
                    <span class="text-gray-400 text-sm"> ({{ $course->votes }}) </span>
                </div>
                <span class="flex text-gray-400">
                    @foreach ($course->tags as $key => $value)
                        @if( count( $course->tags ) != $key + 1 )
                            <a class="text-sm" href="{{ route('search', $value->slug) }}">{{ $value->name }} </a> |
                        @else
                            <a class="text-sm" href="{{ route('search', $value->slug) }}">{{ $value->name }} </a>
                        @endif
                    @endforeach
                </span>
                <div class="flex items-center">
                    <span class="text-gray-400 text-md font-semibold"> £{{ number_format($course->price, 2) }} </span>
                </div>
            </div>
        </div>
    </a>
</div>
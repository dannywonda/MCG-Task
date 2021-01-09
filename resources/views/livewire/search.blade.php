 <div class="relative">
    <input 
        type="text"
        class=" bg-gray-600 rounded-full flex w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
        placeholder="Search"
        wire:model="query"
        wire:keydown.escape="resetValues"
        wire:keydown.tab="resetValues"
        wire:keydown.arrow-up="decrementHighlight"
        wire:keydown.arrow-down="incrementHighlight"
        wire:keydown.enter="selectCourse"
    />

    <div class="absolute top-0">
        <svg class="svg-icon fill-current w-4 mt-2 text-gray-800 ml-2" viewBox="0 0 20 20">
            <path d="M18.125,15.804l-4.038-4.037c0.675-1.079,1.012-2.308,1.01-3.534C15.089,4.62,12.199,1.75,8.584,1.75C4.815,1.75,1.982,4.726,2,8.286c0.021,3.577,2.908,6.549,6.578,6.549c1.241,0,2.417-0.347,3.44-0.985l4.032,4.026c0.167,0.166,0.43,0.166,0.596,0l1.479-1.478C18.292,16.234,18.292,15.968,18.125,15.804 M8.578,13.99c-3.198,0-5.716-2.593-5.733-5.71c-0.017-3.084,2.438-5.686,5.74-5.686c3.197,0,5.625,2.493,5.64,5.624C14.242,11.548,11.621,13.99,8.578,13.99 M16.349,16.981l-3.637-3.635c0.131-0.11,0.721-0.695,0.876-0.884l3.642,3.639L16.349,16.981z"></path>
        </svg>
    </div>
    
    <div wire:loading class="absolute z-10 text-gray-800 bg-white w-full rounded-t-lg rounded-b-lg shadow-lg">
        <span class="flex p-2"> Searching </span>
    </div>

    @if (!empty($query))
        <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="resetValues"></div>
        <div class="absolute z-10 text-gray-800 bg-white w-full rounded-t-lg rounded-b-lg shadow-lg">
            @forelse ($results as $i => $result)
                @if ($result['categories'] !== 'tag')
                    <a href="{{ route('show', $result['slug']) }}" class="{{ $highlightIndex === $i ? 'bg-blue-700 ' : '' }}flex p-2">{{ $result['name'] }}</a>
                @else
                    <a href="{{ route('search', $result['slug']) }}" class="{{ $highlightIndex === $i ? 'bg-blue-700 ' : '' }}flex p-2">{{ $result['name'] }}</a>
                @endif
            @empty
                <span class="flex p-2">No Result</span>
            @endforelse
        </div>
    @endif
</div>
 
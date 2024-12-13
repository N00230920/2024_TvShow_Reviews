@props(['name','image','character', 'shows', 'cast'])

<!-- Show Detail Components -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto"> 
    <!-- Limit the overall container width to make the component more compact -->

    <!-- Show name -->
    <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{{ $name }}</h1> 
    <!-- Heading with Larger text and color -->

    <!-- Show Cover Image -->
    <div class="overflow-hidden rounded-lg mb-4 flex justify-center"> 
        <!-- Image is further restricted to a smaller size -->
        <img src="{{ asset('images/casts/' . $image) }}" alt="{{ $name }}" class="w-full max-w-xs h-auto object-cover"> 
        <!-- Restrict image to max-w-xs (20rem) and ensure responsiveness -->
    </div>

    <!-- character -->
    <h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;">{{ $character }}</h2> 
    <!-- Emphasizing year with italics and smaller text -->
    
    @if ($cast->shows->isNotEmpty())
        <h4 class="text-lg font-bold">Stars in {{ $cast->title }}:</h4>
        <div class="container grid grid-cols-2 mb-5 gap-4">
                    @foreach ($cast->shows as $show)
                        <a href="{{ route('shows.show', $show) }}">
                            <x-show-card
                                :title="$show->title"
                                :image="$show->image"
                                :genre="$show->genre"
                            /> 
                        </a>
                    @endforeach
        </div>
    @endif
</div>

@props(['title','image','genre','overview','where_to_watch','number_of_episodes','air_date','end_date'])

<!-- Show Detail Components -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto"> 
    <!-- Limit the overall container width to make the component more compact -->

    <!-- Show Title -->
    <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{{ $title }}</h1> 
    <!-- Heading with Larger text and color -->

    <!-- Show Cover Image -->
    <div class="overflow-hidden rounded-lg mb-4 flex justify-center"> 
        <!-- Image is further restricted to a smaller size -->
        <img src="{{ asset('images/shows/'. $image) }}" alt="{{ $title }}" class="w-full max-w-xs h-auto object-cover"> 
        <!-- Restrict image to max-w-xs (20rem) and ensure responsiveness -->
    </div>

    <!-- Genre -->
    <h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;">Genre {{ $genre }}</h2> 
    <!-- Emphasizing year with italics and smaller text -->

    <!-- Show Overview -->
    <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 2rem;">Overview</h3> 
    <!-- Subheading for Overview -->
    <p class="text-gray-700 leading-relaxed">{{ $overview }}</p> 
    <!-- Text is spaced out for readability -->
</div>

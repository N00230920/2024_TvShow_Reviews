<x-app-layout>
    <!-- Header title, displayed as "All shows" -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All shows') }}
        </h2>
    </x-slot>

    <!-- Show details component, with attributes like title, image, genre, etc -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Shows Details</h3>
                    <x-show-details
                        :title="$show->title"
                        :image="$show->image"
                        :genre="$show->genre"
                        :overview="$show->overview"
                        :where_to_watch="$show->where_to_watch"
                        :number_of_episodes="$show->number_of_episodes"
                        :air_date="$show->air_date"
                        :end_date="$show->end_date"
                        :show="$show"
                    />

                    {{-- Show Reviews --}}
                    <h4 class="font-semibold text-md mt-8"> Reviews</h4>
                    @if($show->reviews->isEmpty())
                        <p class="text-gray-600">No Reviews yet.</p>
                    @else
                        <ul class="mt-4 space-y-4">
                            @foreach($show->reviews as $review)
                                <li class="bg-gray-100 p-4 rounded-lg">
                                    <p class="font-semibold">{{ $review->user->name }} {{{ $review->created_at->format('M, D, Y') }}}</p>
                                    <p>Rating: {{ $review->rating }}/ 5 </p>
                                    <p>{{ $review->comment }}</p>

                                    {{-- If the logged-in user wrote the review OR the logged-in user is an admin, they can edit and delete the review --}}
                                    {{-- You need to consider your application to determine who has permissions to edit/delete content --}}
                                    @if ($review->user->is(auth()->user()) || auth()->user()->role === 'admin')
                                        <a href="{{ route('reviews.edit', $review) }}" 
                                            class="bg-yellow-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                                            {{ __('Edit Review') }}
                                        </a>

                                        <form action="{{ route('reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="bg-rose-400 hover:bg-rose-300 text-gray-600 font-bold py-2 px-4 rounded">
                                                Delete
                                            </button>
                                        </form>
                                    @endif
                                <li>
                            @endforeach
                        </ul>
                    @endif

                    {{-- Add a new Review --}}
                    <h4 class="font-semibold text-md mt-8">Add a Review</h4>
                    <form action="{{ route('reviews.store', $show) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <label for="rating" class="block font-medium text-sm text-gray-700">Rating</label>
                            <select name="rating" id="rating" class="mt-1 block w-full" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="comment" class="block font-medium text-sm text-gray-700">Comment</label>
                            <textarea name="comment" id="comment" rows="3" class="mt-1 block w-full" placeholder="Write your review here..."></textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Submit Review
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


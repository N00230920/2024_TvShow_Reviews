<x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('All Shows') }}
                </h2>

                <!-- Search Bar -->
                <form method="GET" action="{{ route('shows.index') }}" class="inline-form">
                    <input class="px-2 py-2 bg-red-0 border border-black-500 text-green-700 rounded-md" type="text" name="title" id="title" value="{{ request('title') }}" placeholder="Search title..." >
                </form>
            </div>
        </x-slot> 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- alert success is a component that i created to display a success message that is sent by the controller to give feedback to the user-->
        <x-alert-success>
            {{ session('success') }},
        </x-alert-success>


        <!-- Display for Show card components  -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Shows:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($shows as $show)
                            <div class = "border p-4 rounded-lg bg-sky-200 shadow-md">
                                <a href="{{ route('shows.show',$show) }}">
                                    <x-show-card
                                        :title="$show->title"
                                        :image="$show->image"
                                        :genre="$show->genre"
                                        :overview="$show->overview"
                                        :where_to_watch="$show->where_to_watch"
                                        :number_of_episodes="$show->number_of_episodes"
                                        :air_date="$show->air_date"
                                        :end_date="$show->end_date"
                                    />   
                                </a>
                                @if(auth()->user()->role === 'admin')
                                    <!-- Edit and Delete Buttons -->
                                    <div class="mt-4 flex space-x-2">
                                        <!-- Edit Button route to shows.edit and recieves the $show object so it knows which show is for editing -->
                                        <a href="{{ route('shows.edit', $show) }}" class="text-gray-600 bg-teal-400 hover:bg-teal-200 font-bold py-2 px-4 rounded">
                                            Edit 
                                        </a>
                                    
                                        <!-- Delete button (you need a from to send to DELETE request) -->
                                        <!-- Delete Button route to shows.destroy, passing $show object -->
                                        <form action="{{ route('shows.destroy', $show)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this show?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-rose-400 hover:bg-rose-300 text-gray-600 font-bold py-2 px-4 rounded">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>     
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

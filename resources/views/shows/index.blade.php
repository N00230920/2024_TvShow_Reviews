<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Shows') }}
        </h2>
    </x-slot>

 <!-- alert success is a component that i created to display a success message that is sent by the controller to give feedback to the user
    <x-alert-success>
            {{ session('success') }}
        </x-alert-success> -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Shows:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        
                        @foreach($shows as $show)
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

                        <!-- Edit and Delete Buttons -->
                        <div class="mt-4 flex space-x-2">
                            <!-- Edit Button route to shows.edit and recieves the $show object so it knows which show is for editing -->
                            <a a href="{{ route('shows.edit', $show) }}" class="text-gray-600 by-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                Edit 
                            </a>
                        
                            <!-- Delete button (you need a from to send to DELETE request) -->
                            <!-- Delete Button route to shows.destroy, passing $show object -->
                            <form action="{{ route('shows.destroy', $show)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this show?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">
                                    Delete
                                </button>
                            </form>
                        </div> 
                        @endforeach
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>

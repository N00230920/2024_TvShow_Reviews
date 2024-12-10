<x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('All Cast Members') }}
                </h2>
            </div>
        </x-slot> 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- alert success is a component that i created to display a success message that is sent by the controller to give feedback to the user-->
        <x-alert-success>
            {{ session('success') }},
        </x-alert-success>


        <!-- Display for cast card components  -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Cast:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($casts as $cast)
                            <div class = "border p-4 rounded-lg bg-sky-200 shadow-md">
                                <a href="{{ route('casts.show',$cast) }}">
                                    <x-cast-card
                                        :name="$cast->name"
                                        :image="$cast->image"
                                        :character="$cast->character"
                                    />   
                                </a>
                                @if(auth()->user()->role === 'admin')
                                    <!-- Edit and Delete Buttons -->
                                    <div class="mt-4 flex space-x-2">
                                        <!-- Edit Button route to cast.edit and recieves the $cast object so it knows which cast is for editing -->
                                        <a href="{{ route('cast.edit', $cast) }}" class="text-gray-600 bg-teal-400 hover:bg-teal-200 font-bold py-2 px-4 rounded">
                                            Edit 
                                        </a>
                                    
                                        <!-- Delete button (you need a from to send to DELETE request) -->
                                        <!-- Delete Button route to cast.destroy, passing $cast object -->
                                        <form action="{{ route('cast.destroy', $cast)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this cast?');">
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

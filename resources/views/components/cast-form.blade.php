@props(['action', 'method', 'show'])
<!-- Define properties for the form: action URL, HTTP method, and show data -->

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif
    

    <!-- Name input field -->
        <div class="mb-4">
            <label for="name" class="block text-sm text-gray-700">Name</label>
            <input
                type="text"
                name="name"
        id="name"
        value="{{ old('name', $cast->name ?? '') }}"
        required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

<!-- Image upload field -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Cast Member Image</label>
        <input
            type="file"
            name="image"
            id="image"
            {{ isset($show) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Character input -->
    <div class="mb-4">
            <label for="character" class="block text-sm text-gray-700">Character</label>
            <input
            type="text"
            name="character"
        id="character"
        value="{{ old('character', $cast->character ?? '') }}"
        required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('character')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    

    @isset($cast->image)
        <div class="mb-4">
            <img src="{{ asset($show->image) }}" alt="cast cover" class="w-24 h-32 object-cover" />
        </div>
    @endisset

<div>
    <x-primary-button>
        {{ isset($cast) ? 'Update cast' : 'Add Cast' }}
    </x-primary-button>
</div>

<h3 class="font-semibold text-lg mb-4 pt-5">Assign this category to existing casts</h3>
        <div>
            @foreach ($casts as $cast)
            <div>
                <input type="checkbox" id="cast_{{ $cast->id }}" name="casts[]" value="{{ $cast->id }}"
                @if(isset($categorycasts) && in_array($nailplish->id, $categorycasts)) checked @endif>
                <label for="cast_{{ $cast->id }}" class="ml-2">{{$cast->name}}</label>
            </div>
            @endforeach
        </div>

</div>

</form>

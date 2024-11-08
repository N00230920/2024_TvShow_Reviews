@props(['action', 'method', 'show'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif
    

    <!-- Insert title -->
        <div class="mb-4">
            <label for="title" class="block text-sm text-gray-700">Title</label>
            <input
                type="text"

                name="title"
        id="title"
        value="{{ old('title', $show->title ?? '') }}"
        required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('title')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Insert genre -->
    <div class="mb-4">
            <label for="genre" class="block text-sm text-gray-700">Genre</label>
            <select id="genre" class="rounded mb-2" name="genre">
                <option value="">Select a genre</option> 
                <option value="action">action</option>
                <option value="adventure">adventure</option>
                <option value="adult animation">adult animation</option>
                <option value="anime">anime</option>
                <option value="crime">crime</option>
                <option value="fantasy">fantasy</option>
                <option value="historical">historical</option>
                <option value="horror">horror</option>
                <option value="romance">romance</option>
                <option value="sci-fi">sci-fi</option>
            </select>
        @error('genre')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Insert overview -->
    <div class="mb-4">
            <label for="overview" class="block text-sm text-gray-700">Overview</label>
            <input
            type="text"
            name="overview"
        id="overview"
        value="{{ old('overview', $show->overview ?? '') }}"
        required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('overview')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- insert image -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Show Cover Image</label>
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

    @isset($show->image)
        <div class="mb-4">
            <img src="{{ asset($show->image) }}" alt="show cover" class="w-24 h-32 object-cover" />
        </div>
    @endisset

    <!-- Insert where_to_watch -->
    <div class="mb-4">
            <label for="where_to_watch" class="block text-sm text-gray-700">Where to watch</label>
            <input
                type="text"

                name="where_to_watch"
        id="where_to_watch"
        value="{{ old('where_to_watch', $show->where_to_watch ?? '') }}"
        required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('where_to_watch')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex item-row gap-5">
    <!-- Insert number_of_episodes -->
    <div class="mb-4">
        <label for="number_of_episodes" class="block text-sm text-gray-700">Number of episodes</label>
        <input
        type="integer"
        name="number_of_episodes"
        id="number_of_episodes"
        value="{{ old('number_of_episodes', $show->number_of_episodes ?? '') }}"
        required
        class="mt-1 block w-50 border-gray-300 rounded-md shadow-sm" />
        @error('number_of_episodes')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Insert air date -->
    <div class="mb-4">
        <label for="air_date" class="block text-sm text-gray-700">Air Date:</label>
        <input
        type="integer"
        name="air_date"
        id="air_date"
        value="{{ old('air_date', $show->air_date ?? '') }}"
        required
        class="mt-1 block w-50 border-gray-300 rounded-md shadow-sm" />
        @error('air_date')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Insert end date -->
    <div class="mb-4">
        <label for="end_date" class="block text-sm text-gray-700">End Date:</label>
        <input
        type="integer"
        name="end_date"
        id="end_date"
        value="{{ old('end_date', $show->end_date ?? '') }}"
        required
        class="mt-1 block w-50 border-gray-300 rounded-md shadow-sm" />
        @error('end_date')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
<div>
    <x-primary-button>
        {{ isset($show) ? 'Update show' : 'Add show' }}
    </x-primary-button>
</div>
</form>

<x-app-layout>
    <!-- Header title, displayed as "All casts" -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All casts') }}
        </h2>
    </x-slot>

    <!-- cast details component, with attributes like name, image, character, etc -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Casts Details</h3>
                    <x-cast-details
                        :name="$cast->name"
                        :image="$cast->image"
                        :character="$cast->character"
                    />
                </div>
                    
                <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Casts Starring</h3>
                </div> 

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                                </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>


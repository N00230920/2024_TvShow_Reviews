<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Cast') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-sky-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Add New Cast</h3>
                    
                    <!-- Using the CastFrom component for Cast creation -->
                    <x-cast-form
                        :action="route('casts.store')"
                        :method="'POST'"
                        :shows="$shows"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

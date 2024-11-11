@props(['title','image','genre','overview','where_to_watch','number_of_episodes','air_date','end_date'])
<!-- Define properties expected to be passed to this component -->


<!-- Displays css properties -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $title }}</h4>
    <div class="w-full rounded shadow-md">
        <img class="size-full rounded" src="{{asset('images/shows/' . $image)}}" alt="{{$title}}">
    </div>
    <p class="text-slate-700 font-bold mt-4">{{ $genre }}</p>
    <p class="mt-3 font-bold">Overview</p>
    <p class="text-gray-800 mt-0">{{ $overview }}</p>
    <p class="text-gray-800 mt-4">Stream: {{ $where_to_watch }}</p>
    <p class="text-gray-800 mt-4">Episodes: {{ $number_of_episodes }}</p>
    <p class="text-gray-800 mt-4">Status: {{ $air_date }} - {{ $end_date }}</p>
    

</div>
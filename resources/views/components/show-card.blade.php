@props(['title','image','genre','overview','where_to_watch','number_of_episodes','air_date','end_date'])
<!-- Define properties expected to be passed to this component -->


<!-- Displays css properties -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $title }}</h4>
    <div class="w-full rounded shadow-md">
        <img class="size-full rounded" src="{{asset('images/shows/' . $image)}}" alt="{{$title}}">
    </div>
    <p class="text-slate-700 font-bold mt-4">{{ $genre }}</p>


</div>
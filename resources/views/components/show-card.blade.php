@props(['title','image','genre','overview','where_to_watch','number_of_episodes','air_date','end_date'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $title }}</h4>
    <img src="{{asset('images/shows/'.$image)}}" alt="{{$title}}">
    <p class="text-gray-600">({{ $genre }})</p>
    <p class="text-gray-800 mt-4">{{ $overview }}</p>
    <p class="text-gray-800 mt-4">{{ $where_to_watch }}</p>
    <p class="text-gray-800 mt-4">{{ $number_of_episodes }}</p>
    <p class="text-gray-800 mt-4">{{ $air_date }}</p>
    <p class="text-gray-800 mt-4">{{ $end_date }}</p>

</div>
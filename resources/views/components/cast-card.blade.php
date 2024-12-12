@props(['name','image','character','shows'])
<!-- Define properties expected to be passed to this component -->


<!-- Displays css properties -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $name }}</h4>
    <div class="w-full rounded shadow-md">
        <img class="size-full rounded" src="{{asset('images/shows/' . $image)}}" alt="{{$name}}">
    </div>
    <p class="text-gray-800 mt-0">{{ $image }}</p>
    <p class="text-gray-800 mt-4">{{ $character }}</p>
    

</div>
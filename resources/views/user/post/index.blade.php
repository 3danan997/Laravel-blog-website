@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="bg-gray-200 p-6 mb-4 shadow-inner shadow-gray-800 rounded-lg">
                <h1 class="text-5xl font-bold border-red-50 text-opacity-30 text-shadow-md">{{$user->name}}</h1>
                <p>has {{ $posts->count() }} {{ Str::plural('post',$posts->count()) }}</p>
            </div>

            <div class="bg-gray-800 p-6 rounded-lg text-gray-300">
                @if($posts->count())
                    @foreach($posts as $post)
                        <x-post :post="$post"/>
                    @endforeach
                    {{   $posts->links() }}
                @else
                    <p>There is no Post</p>
                @endif
            </div>
        </div>
    </div>
@endsection

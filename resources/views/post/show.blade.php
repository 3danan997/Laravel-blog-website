@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-gray-800 p-6 rounded-lg text-gray-300">
                <x-post :post="$post"/>
        </div>
    </div>
@endsection

@php use App\Models\post; @endphp
@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            @guest
                <div class="bg-gray-200 p-6 mb-4 shadow-inner shadow-gray-800 rounded-lg">
                    <p>To post something you need to
                        <a href="{{ route('sign_up') }}" class="underline hover:text-red-500">signed up</a> or
                        <a href="{{ route('login') }}" class="underline hover:text-red-500">logged in</a></p>
                </div>
            @endguest
            <div class="bg-gray-800 p-6 rounded-lg text-white">
                @auth
                    <form action="{{ route('post') }}" method="post">
                        @csrf
                        <div class="relative mb-4">
                            <label for="body"
                                   class="absolute text-sm dark:text-red-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                                Textbereich</label>
                            <textarea name="body" id="body" cols="30" rows="4" value="{{old('body')}}" placeholder="Schreiben Sie bitte hier!"
                                      class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-100 border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-800 dark:border-red-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('title') border-red-500 @enderror"></textarea>
                            @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div>
                            <input type="submit" value="post"
                                   class="block px-2.5 pb-2 pt-2 border-b-2 dark:border-white dark:bg-red-500 rounded-t-lg w-full text-amber-50 focus:border-blue-600">
                        </div>
                    </form>
                @endauth
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

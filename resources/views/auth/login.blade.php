@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-1/3 bg-gray-800 p-6 rounded-lg">
            <form action="{{route('login')}}" , method="post">
                @csrf
                <div class="mb-4 relative">
                    <label for="email"
                           class="absolute text-sm dark:text-red-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Email</label>
                    <input type="email" name="email" id="email" placeholder="Bitte geben Sie Ihre Email ein!"
                           value="{{old('email')}}"
                           class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-100 border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-800 dark:border-red-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-4 relative">
                    <label for="password"
                           class="absolute text-sm text-red-500 dark:text-red-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Passwort</label>
                    <input type="password" name="password" id="password"
                           placeholder="Bitte geben Sie Ihre Passwort ein!"
                           class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-100 border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-800 dark:border-red-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="checkbox" name="remember" id="remember">
                    <label class="text-white" for="remember">angemeldet bleiben</label>
                </div>
                @if(session('status'))
                    <div class="text-white text-center bg-red-500 p-2.5 mb-2 rounded-lg w-full">
                        {{session('status')}}
                    </div>
                @endif
                <div>
                    <input type="submit" value="login"
                           class="block px-2.5 pb-2 pt-2 border-b-2 dark:border-white dark:bg-red-500 rounded-t-lg w-full text-amber-50 focus:border-blue-600">
                </div>
            </form>
        </div>
    </div>
@endsection

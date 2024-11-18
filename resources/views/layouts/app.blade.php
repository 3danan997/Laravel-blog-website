<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SWE</title>
</head>
<body
    class="bg-gray-100">
<nav class="flex justify-between mx-auto bg-gray-800 rounded-b-lg mb-4">
    <ul class="flex items-center">
        <li class="p-6 text-2xl text-gray-300">
            <a class="hover:text-red-500 transition duration-300" href="{{ route('home') }}">Home</a></li>
        <li class="p-6 text-2xl text-gray-300">
            <a class="hover:text-red-500 transition duration-300" href="{{route('post')}}">Post</a></li>
    </ul>
    <ul class="flex items-center">
        @auth
            <li class="p-6 text-2xl text-gray-300">
                <a class="hover:text-red-500 transition duration-300" href="{{ route('dashboard') }}">{{auth()->user()->name}}</a>
            </li>
            <li class="p-6 text-2xl text-gray-300">
                <form action="{{ route('logout') }}" method="post" class="inline p-3">
                    @csrf
                    <button class="hover:text-red-500 transition duration-300" type="submit">Logout</button>
                </form>
            </li>
        @endauth
        @guest
            <li class="p-6 text-2xl text-gray-300">
                <a class="hover:text-red-500 transition duration-300" href="{{ route('sign_up') }}">Sign up</a></li>
            <li class="p-6 text-2xl text-gray-300">
                <a class="hover:text-red-500 transition duration-300" href="{{ route('login') }}">login</a></li>
        @endguest

    </ul>
</nav>
@yield('content')
</body>
</html>

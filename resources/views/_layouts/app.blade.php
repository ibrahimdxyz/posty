<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <title>Posty</title>
    </head>
    <body class="bg-gray-100">
        <nav class="p-6 bg-white flex justify-between">
            <ul class="flex items-center">
                <li>
                    <a href="{{ route('home') }}" class="p-3">Home</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('posts') }}" class="p-3">Posts</a>
                </li>
            </ul>
            <ul class="flex items-center">
                @auth
                    <li>
                        <a href="{{ route('users.posts', Auth::user()) }}" class="p-3">{{ Auth::user()->name }}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <label for="logout" class="sr-only"></label>
                            <button id="logout" type="submit" class="mx-2">Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href={{ route('register') }} class="p-3">Register</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="p-3">Login</a>
                    </li>
                @endguest
            </ul>
        </nav>
        @yield('contents')
        {{-- to prevent unstylized flashing before page is fully loaded on firefox --}}
        <script type="text/javascript">0</script>
    </body>
</html>
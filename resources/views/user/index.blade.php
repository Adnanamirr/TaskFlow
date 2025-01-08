<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">

    <title>TaskFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="h-full">



<nav class="bg-gray-800 p-4  shadow-md">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/" class="{{ Route::currentRouteName() === '/' ? 'bg-gray-900 text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Home
                        </a>
                        @auth
                            <a href="{{ route('user.index') }}" class="{{Route::currentRouteName() === 'user.index' ? 'bg-gray-900 text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Users
                            </a>
                            <a href="{{ route('tasks.index') }}" class="{{ Route::currentRouteName() === 'tasks.index' ? 'bg-gray-900 text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Tasks
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    @auth

                </div>
                <div class="ml-3">
                    <form action="{{ route('user.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-white bg-red-600 hover:bg-red-500 px-3 py-2 rounded-md text-sm font-medium">Logout</button>
                    </form>
                </div>
                @else
                    <div class="ml-3">
                        <a href="{{ route('user.register') }}" class="{{ request()->is('user.register') ? 'bg-gray-900 text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Register
                        </a>
                        <a href="{{ route('login') }}" class="{{ request()->is('login') ? 'bg-gray-900 text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Log In
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>


<div class="flex h-screen">
    <aside class="bg-gray-700 text-white w-64 p-4 space-y-6">
        <nav class="space-y-4">
            <a href="/" class="block hover:bg-gray-600 px-3 py-2 rounded-md">Dashboard</a>

            @auth

                <a href="{{ route('user.index') }}"  class="{{ Route::currentRouteName() === 'user.index' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                      hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">Users</a>

                <a href="{{ route('user.archived') }}" class="{{ Route::currentRouteName() === 'user.archived' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                      hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">Archived Users</a>
                <a href="{{ route('user.register') }}"
                   class="{{ Route::currentRouteName() === 'user.register' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                      hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">
                    New User
                </a>
            @endauth

            @guest
                <a href="{{ route('user.register') }}"
                   class="{{ Route::currentRouteName() === 'user.register' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                      hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">
                    Sign Up
                </a>

                <a href="{{ route('login') }}"
                   class="{{ Route::currentRouteName() === 'login' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                      hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">
                    Log In
                </a>
            @endguest
        </nav>
    </aside>


    <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
        <div class="flex justify-center mt-6">
            <div>
                @include('components.success')
                @include('components.error')
            </div>
        </div>

        <div class="container mx-auto mt-8">
            @if($currentUser)
                <h1 class="text-2xl font-bold text-center mb-6">Hello, {{ $currentUser->name }}</h1>
            @endif

            @if(count($users) > 0)
                <ol class="space-y-4">
                    @foreach ($users as $user)
                        <div class="flex items-center justify-between bg-gray-100 p-4 rounded-md shadow-md">
                            <a href="{{ route('user.show', ['id' => $user->id]) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                                <li>{{ $user->name }}</li>
                            </a>
                            <form action="{{ route('user.archive', ['id' => $user->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to archive this task?')" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">
                                    Archive
                                </button>
                            </form>
                        </div>
                    @endforeach
                </ol>
                <div class="mt-6 flex justify-center">
                    {{ $users->links() }}
                </div>
            @else
                <p class="text-center text-gray-600 mt-6">
                    No Users available! Please click
                    <a href="{{ route('user.register') }}" class="text-indigo-500 hover:text-indigo-700 font-medium">
                        Sign Up
                    </a>
                    to register a new user.
                </p>
            @endif

{{--            <div class="mt-6 flex justify-center space-x-4">--}}
{{--                <a href="{{ route('user.register') }}" class="text-white bg-green-500 hover:bg-green-600 px-4 py-2 rounded-md">--}}
{{--                    Sign Up--}}
{{--                </a>--}}
{{--                <a href="{{ route('user.archived') }}" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md">--}}
{{--                    Archived Users--}}
{{--                </a>--}}
{{--            </div>--}}
        </div>
    </main>
</div>


</body>
</html>


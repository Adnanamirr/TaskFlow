<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <title>TaskFlow - Archived Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
<nav class="bg-gray-800 p-4 shadow-md">
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
                        <div class="ml-3">
                            <form action="{{ route('user.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="text-white bg-red-600 hover:bg-red-500 px-3 py-2 rounded-md text-sm font-medium">Logout</button>
                            </form>
                        </div>
                    @else
                        <div class="ml-3">
                            <a href="{{ route('user.register') }}" class="{{Route::currentRouteName() === 'user.index' ? 'bg-gray-900 text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Register
                            </a>
                            <a href="{{ route('login') }}" class="{{Route::currentRouteName() === 'user.index' ? 'bg-gray-900 text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Log In
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="flex h-screen">
    <aside class="bg-gray-700 text-white w-64 p-4 space-y-6">
        <nav class="space-y-4">
            <a href="/" class="block hover:bg-gray-600 px-3 py-2 rounded-md">Dashboard</a>
            <a href="{{ route('tasks.index') }}" class="{{ Route::currentRouteName() === 'tasks.index' ? 'bg-gray-900 text-white' : 'text-gray-300' }} hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">Tasks</a>
            <a href="{{ route('tasks.archived') }}" class="{{ Route::currentRouteName() === 'tasks.archived' ? 'bg-gray-900 text-white' : 'text-gray-300' }} hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">Archived Tasks</a>
           <a href="{{ route('tasks.create') }}" class="{{ Route::currentRouteName() === 'tasks.create' ? 'bg-gray-900 text-white' : 'text-gray-300' }} hover:bg-gray-600 hover:text-white block px-3 py-2 rounded-md">New Task</a>
        </nav>
    </aside>

    <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
        <div class="flex justify-center mt-6">
            <div class="w-full max-w-md">
                @include('components.success')
                @include('components.error')
            </div>
        </div>

        @if(count($archivedTasks) > 0)
            <div class="bg-gray-100 p-6 rounded-md shadow-md">
                <ol class="list-decimal pl-5 space-y-4">
                    @foreach ($archivedTasks as $task)
                        <li class="flex items-center justify-between bg-white p-4 rounded-md shadow-sm">
                            <div>
                                <a href="{{ route('tasks.show', ['id' => $task->id]) }}" class="text-indigo-600 hover:underline font-medium">
                                    {{ $task->title }}
                                </a>
                            </div>
                            <div class="flex items-center space-x-4">
                                <form action="{{ route('tasks.forceDelete', ['id' => $task->id]) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-red-600 hover:bg-red-500 px-3 py-2 rounded-md text-sm">
                                        Permanently Delete
                                    </button>
                                </form>
                                <a href="{{ route('tasks.restore', ['id' => $task->id]) }}" class="text-white bg-green-600 hover:bg-green-500 px-3 py-2 rounded-md text-sm">
                                    Restore
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
        @else
            <p class="text-center text-gray-600 mt-6">
                No Archived Tasks found! Please click
                <a href="{{ route('tasks.index') }}" class="text-indigo-500 hover:text-indigo-700 font-medium">
                    Tasks
                </a>
                to go back to the task list.
            </p>
        @endif
    </main>
</div>
</body>
</html>

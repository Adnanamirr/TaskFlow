<aside class="bg-gray-700 text-white w-64 p-4 space-y-6">
    <nav class="space-y-4">
        @auth
            <!-- Users Menu -->
            <div class="group">
                <a href="#"
                   class="text-gray-300 hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md relative">
                    Users
                    <span class="absolute right-4 text-sm">&#9662;</span>
                </a>
                <div class="hidden group-hover:block pl-4">
                    <a href="{{ route('user.index') }}"
                       class="{{ Route::currentRouteName() === 'user.index' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                   hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">
                        All Users
                    </a>
                    <a href="{{ route('user.archived') }}"
                       class="{{ Route::currentRouteName() === 'user.archived' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                   hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">
                        Archived Users
                    </a>
                    <a href="{{ route('user.register') }}"
                       class="{{ Route::currentRouteName() === 'user.register' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                   hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">
                        New User
                    </a>
                </div>
            </div>

            <!-- Tasks Menu -->
            <div class="group">
                <a href="#"
                   class="text-gray-300 hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md relative">
                    Tasks
                    <span class="absolute right-4 text-sm">&#9662;</span>
                </a>
                <div class="hidden group-hover:block pl-4">
                    <a href="{{ route('tasks.index') }}"
                       class="{{ Route::currentRouteName() === 'tasks.index' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                   hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">
                        All Tasks
                    </a>
                    <a href="{{ route('tasks.archived') }}"
                       class="{{ Route::currentRouteName() === 'tasks.archived' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                   hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">
                        Archived Tasks
                    </a>
                    <a href="{{ route('tasks.create') }}"
                       class="{{ Route::currentRouteName() === 'tasks.create' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                   hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">
                        New Task
                    </a>
                </div>
            </div>
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

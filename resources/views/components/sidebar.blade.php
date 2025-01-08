<aside class="bg-gray-700 text-white w-64 p-4 space-y-6">
 <nav class="space-y-4">


        @auth

        <a href="{{ route('user.index') }}" class="{{ Route::currentRouteName() === 'user.index' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                      hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">Users</a>

            <a href="{{ route('user.archived') }}" class="{{ Route::currentRouteName() === 'user.archived' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                  hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">Archived Users</a>
            <a href="{{ route('user.register') }}"
      class="{{ Route::currentRouteName() === 'user.register' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                      hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">
                New User
            </a>
            <a href="{{ route('tasks.index') }}"
            class="{{ Route::currentRouteName() === 'tasks.index' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                      hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">
                Tasks
            </a>

            <a href="{{ route('tasks.archived') }}" class="{{ Route::currentRouteName() === 'tasks.archived' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                      hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">Archived Tasks</a>

            <a href="{{ route('tasks.create') }}"
               class="{{ Route::currentRouteName() === 'tasks.create' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                      hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">
                New Task
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

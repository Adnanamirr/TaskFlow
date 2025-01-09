@extends('layout.app')

@section('content')

        <div class="container mx-auto mt-8">
            @if($currentUser)
                <h1 class="text-2xl font-bold text-center mb-6">Hello, {{ $currentUser->name }}</h1>
            @endif

            @if(count($users) > 0)
                <ol class="space-y-4">
                    @foreach ($users as $user)
                        <div class="flex items-center justify-between bg-gray-100 p-4 rounded-md shadow-md">
                            <a href="{{ route('user.show', ['id' => $user->id]) }}"
                               class="text-indigo-600 hover:text-indigo-800 font-medium">
                                <li>{{ $user->name }}</li>
                            </a>
                            <form action="{{ route('user.archive', ['id' => $user->id]) }}" method="POST"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Are you sure you want to archive this task?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">
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
@endsection

@extends('layout.app')

@section('content')

    @if(count($archivedUser) > 0)
            <div class="bg-gray-100 p-6 rounded-md shadow-md">
                <ol class="list-decimal pl-5 space-y-4">
                    @foreach ($archivedUser as $user)
                        <li class="flex items-center justify-between bg-white p-4 rounded-md shadow-sm">
                            <div>
                                <a href="{{ route('user.show', ['id' => $user->id]) }}"
                                   class="text-indigo-600 hover:underline font-medium">
                                    {{ $user->name }}
                                </a>
                            </div>
                            <div class="flex items-center space-x-4">
                                <form action="{{ route('user.forceDelete', ['id' => $user->id]) }}" method="POST"
                                      class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this task permanently?')"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">
                                        Delete
                                    </button>
                                </form>
                                <a href="{{ route('user.restore', ['id' => $user->id]) }}"
                                   class="text-white bg-green-600 hover:bg-green-500 px-3 py-2 rounded-md text-sm">
                                    Restore
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
        @else
            <p class="text-center text-gray-600 mt-6">
                No Archived Users found! Please click
                <a href="{{ route('user.index') }}" class="text-indigo-500 hover:text-indigo-700 font-medium">
                    Users
                </a>
                to go back to the user list.
            </p>
        @endif
@endsection

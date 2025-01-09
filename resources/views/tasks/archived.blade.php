@extends('layout.app')

@section('content')


    @if(count($archivedTasks) > 0)
            <div class="bg-gray-100 p-6 rounded-md shadow-md">
                <ol class="list-decimal pl-5 space-y-4">
                    @foreach ($archivedTasks as $task)
                        <li class="flex items-center justify-between bg-white p-4 rounded-md shadow-sm">
                            <div>
                                <a href="{{ route('tasks.show', ['id' => $task->id]) }}"
                                   class="text-indigo-600 hover:underline font-medium">
                                    {{ $task->title }}
                                </a>
                            </div>
                            <div class="flex items-center space-x-4">
                                <form action="{{ route('tasks.forceDelete', ['id' => $task->id]) }}" method="POST"
                                      class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-white bg-red-600 hover:bg-red-500 px-3 py-2 rounded-md text-sm">
                                        Permanently Delete
                                    </button>
                                </form>
                                <a href="{{ route('tasks.restore', ['id' => $task->id]) }}"
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
                No Archived Tasks found! Please click
                <a href="{{ route('tasks.index') }}" class="text-indigo-500 hover:text-indigo-700 font-medium">
                    Tasks
                </a>
                to go back to the task list.
            </p>
        @endif
@endsection

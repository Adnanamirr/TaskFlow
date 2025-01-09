@extends('layout.app')

@section('content')
        <div class="flex justify-center mt-6">
            <div>
                @include('components.alerts.success')
                @include('components.alerts.error')
            </div>
        </div>

        <div class="container mx-auto  px-4">
            <h2 class="text-3xl font-bold text-center mb-6">Task List</h2>

            @if(count($tasks) > 0)
                <ol class="space-y-4 mt-6">
                    @foreach ($tasks as $task)
                        <div class="flex items-center justify-between bg-gray-100 p-4 rounded-md shadow-md">
                            <div class="flex items-center">
                                <span class="font-bold text-indigo-600 mr-2">{{ $loop->iteration }}.</span>
                                <a href="{{ route('tasks.show', ['id' => $task->id]) }}"
                                   class="text-indigo-600 hover:text-indigo-800 font-medium">
                                    {{ $task->title }}
                                </a>
                            </div>

                            <div class="flex space-x-4">
                                <form action="{{ route('tasks.archive', ['id' => $task->id]) }}" method="POST"
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
                        </div>
                    @endforeach
                </ol>

                <div class="mt-6 flex justify-center">
                    {{ $tasks->links() }}
                </div>

            @else
                <p class="text-center text-gray-600 mt-6">
                    No tasks available! Please click
                    <a href="{{ route('tasks.create') }}" class="text-indigo-500 hover:text-indigo-700 font-medium">
                        Create Task
                    </a>
                    to create a new task.
                </p>
            @endif
        </div>
@endsection

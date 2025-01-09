@extends('layout.app')

@section('content')
        <div class="flex justify-center mt-6">
            <div>
                @include('components.alerts.success')
                @include('components.alerts.error')
            </div>
        </div>

        <div class="container mx-auto mt-8">
            <div class="flex flex-col justify-center px-6 py-12 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit Task</h2>

                    <form class="space-y-6" action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-900">Task Title:</label>
                            <div class="mt-2">
                                <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}"
                                       required
                                       class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="description"
                                   class="block text-sm font-medium text-gray-900">Description:</label>
                            <div class="mt-2">
                                <input type="text" name="description" id="description"
                                       value="{{ old('description', $task->description) }}" required
                                       class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                            </div>
                        </div>

                        <input type="hidden" name="project_id" value="1">

                        <div>
                            <button type="submit"
                                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Update Task
                            </button>
                        </div>
                    </form>


                    <div class="mt-6 text-center">
                        <a href="{{ route('user.index') }}"
                           class="inline-block text-indigo-600 hover:text-indigo-800 font-medium">
                            Back to Task List
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection

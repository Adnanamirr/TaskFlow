@extends('layout.app')

@section('content')

        <div class="container mx-auto mt-8">
            <div class="flex flex-col justify-center px-6 py-12 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit User</h2>

                    <form class="space-y-6" action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-900">User Name:</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                                       class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-900">Email:</label>
                            <div class="mt-2">
                                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                       required
                                       class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Update User
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 text-center">
                        <a href="{{ route('user.index') }}"
                           class="inline-block text-indigo-600 hover:text-indigo-800 font-medium">
                            Back to User List
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection

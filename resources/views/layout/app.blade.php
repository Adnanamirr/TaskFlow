<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <title>TaskFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">

@include('components.navbar')

<div class="flex h-screen">
    @include('components.sidebar')

    <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
        <div class="flex justify-center mt-6">
            <div class="">
                @include('components.alerts.success')
                @include('components.alerts.error')
                @include('components.alerts.info')
            </div>
        </div>

        @yield('content')
    </main>
</div>
</body>
</html>

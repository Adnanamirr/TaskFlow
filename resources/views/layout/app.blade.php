<!DOCTYPE html>
<html lang="" class="h-full bg-white">
<head>
    <title>TaskFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style type="text/tailwindcss">
        .btn{
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-blue-100
        }
        .btn2{
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-red-100
        }

        label {
            @apply block uppercase text-slate-700 mb-2
        }
        input,
        textarea{
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }

        .link{
            @apply font-medium text-slate-700 underline decoration-blue-500
        }
        .error{
            @apply text-red-500 text-sm
        }
    </style>
    @yield('styles')
</head>
<body class="h-full ">
<h1 class="text-2xl mb-4"> @yield('title')</h1>
<div>

    @yield('content')
</div>
</body>
</html>

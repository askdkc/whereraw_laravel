<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Laravel</title>
    </head>
    <body class="antialiased">
            <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 ">
                <div class="m-2 p-2">
                    <a href="{{ route('withoutoptional') }}" class="text-lg text-blue-600 underline">Without Optional</a>
                </div>
                <div class="m-2 p-2">
                    <a href="{{ route('withoptional') }}" class="text-lg text-blue-600 underline">With Optional</a>
                </div>
            </div>
    </body>
</html>

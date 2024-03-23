<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Create Post</title>
</head>

<body>
@if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10" align="center">
        @auth
            <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
        @else
            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
        @endauth
    </div>
@endif
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <br>
            <br>
            <a class="btn btn-success" href="{{ url('/create_category') }}">Добавить категорию</a>
            <a class="btn btn-success" href="{{ url('/create_specification') }}">Добавить спецификацию</a>
            <br>
            <br>
            <h3>Категории</h3>
            @foreach ($categories as $category)
                @if($type == 'category')
                    <div class="row">
                        <a href="{{ url('/catalog/' . $category->id) }}">{{ $category->name }}</a>
                    </div>
                @endif

                    @if($type == 'subcategory')
                        <div class="row">
                            <a href="{{ url('/products/' . $category->id) }}">{{ $category->name }}</a>
                        </div>
                    @endif

            @endforeach
        </div>
    </div>
</div>
</body>

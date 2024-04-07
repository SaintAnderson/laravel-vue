<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>CRUD</title>
</head>

<body>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 mt-5 mb-5">
                    <a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Главная</a>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <a class="btn btn-success" href="{{ url('/create') }}">Создать новое изделие</a>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <a class="btn btn-success" href="{{ url('/create_category') }}">Добавить новую категорию</a>
                    <a class="btn btn-success" href="{{ url('/create_specification') }}">Добавить новую  спецификацию</a>
                </div>

                @yield('content')
            </div>
        </div>
    </div>
</body>

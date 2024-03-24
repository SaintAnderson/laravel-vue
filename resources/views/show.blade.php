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

<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 z-10 mt-5 mb-5">
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
                <div class="d-flex justify-content-between mb-2">
                    <a class="btn btn-success" href="{{ url('/create') }}">Создать новое изделие</a>
                </div>
            <div class="d-flex justify-content-between mb-2">
                <a class="btn btn-success" href="{{ url('/create_category') }}">Добавить новую категорию</a>
                <a class="btn btn-success" href="{{ url('/create_specification') }}">Добавить новую спецификацию</a>
            </div>
            <h3>Продукты </h3>
            @if (!auth()->check())
                <h6>Редактировать изделия могут только зарегестрированные пользователи</h6>
            @endif
            <div>

                <div class="container">
                    <div class="row">
                        <strong class="col-sm text-center" >Наименование</strong>
                        <strong class="col-sm text-center" >Спецификация</strong>
                        <strong class="col-sm text-center" >Действия</strong>
                    </div>
                    @foreach($products as $key => $product)
                        <div class=" d-flex border border-secondary rounded mb-2 row ">
                            <div class="p-2 col-sm">
                                <strong>{{ $product->name }}</strong>
                            </div>
                            <div class="p-2 col-sm ">
                                @foreach($product->specification as $specification)
                                    <div>
                                       <strong> {{$specification->measure}} :</strong> {{ $specification->pivot->value }}
                                    </div>

                                @endforeach
                            </div>

                            @if (auth()->check())
                                <div class="col-sm p-0">
                                    <div>
                                        <a class="btn btn-success rounded-0 text-nowrap w-100" href="{{ url('/create_category/'.$product->id) }}">Добавить категорию</a>
                                    </div>
                                    <div>
                                        <a class="btn btn-success rounded-0 text-nowrap w-100" href="{{ url('/create_specification/' . $product->id) }}">Добавить спецификацию</a>
                                    </div>
                                    <div>
                                        <a class="btn btn-success rounded-0 text-nowrap w-100" href="{{ url('update/' . $product->id) }}">Редактировать</a>
                                    </div>
                                    <div>
                                        <a class="btn btn-danger rounded-0 text-nowrap w-100" href="{{ url('delete/' . $product->id) }}">Удалить</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</body>

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
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        {{--        <a class="navbar-brand h1" href={{ route('posts.index') }}>CRUDPosts</a>--}}
        <div class="justify-end ">
            <div class="col ">
                {{--                <a class="btn btn-sm btn-success" href={{ route('posts.create') }}>Add Post</a>--}}
            </div>
        </div>
</nav>

<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <br>
            <br>
            <a class="btn btn-success" href="{{ url('/create_category') }}">Добавить категорию</a>
            <a class="btn btn-success" href="{{ url('/create_category') }}">Добавить спецификацию</a>
            <br>
            <br>
            <h3>Продукты </h3>
            <table>
                <thead>
                    <th>Имя</th>
                    <th>Спецификация</th>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>
                                @foreach ($product->specifications as $specification)
                                    {{$specification->name}}
                                    <br/><br/>
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{ url('/create_category/'.$product->id) }}">Добавить категорию</a>
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{ url('/create_specification/' . $product->id) }}">Добавить спецификацию</a>
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{ url('update/' . $product->id) }}">Редактировать</a>
                            </td>
                            <td>
                            <a class="btn btn-danger" href="{{ url('delete/' . $product->id) }}">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

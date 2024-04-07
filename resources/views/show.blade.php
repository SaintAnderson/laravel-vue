@extends('layouts.default')
@section('content')
    <h3>Продукты </h3>

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
                            <a class="btn btn-danger rounded-0 text-nowrap w-100" href="{{ url('delete/' . $product->id . '/' . $categoryId) }}">Удалить</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

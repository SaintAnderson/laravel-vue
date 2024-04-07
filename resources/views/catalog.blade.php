@extends('layouts.default')
@section('content')
    <h3>Категории</h3>
    @foreach ($categories as $category)
        <div class="row">
            <a class="h5 text-decoration-none" href="{{ url('/category/' . $category->id) }}">{{ $category->name }}</a>
        </div>
    @endforeach
@endsection

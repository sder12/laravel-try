@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        <h1>Dashboard</h1>
        <a href="{{ route('admin.drinks.index') }}" class="btn btn-primary ">drinks</a> <br>
        <a href="{{ route('token') }}" class="btn btn-danger my-5"> Pay </a>
    </div>
@endsection

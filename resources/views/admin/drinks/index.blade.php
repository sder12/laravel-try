@extends('layouts.admin')

@section('content')
    <h2>Drinks</h2>
    <a href="{{ route('admin.drinks.create') }}" class="btn btn-primary">
        create new
    </a>
    <ul>
        @foreach ($drinks as $drink)
            <li><a href="{{ route('admin.drinks.show', $drink->id) }}">
                    {{ $drink->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection

@extends('layouts.admin')

@section('content')
    <h2>Drinks</h2>
    <ul>
        @foreach ($drinks as $drink)
            <li><a href="{{ route('admin.drinks.show', $drink->id) }}">
                    {{ $drink->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection

@extends('layouts.admin')

@section('content')
    <h2>Drinks</h2>
    <ul>
        @foreach ($drinks as $drink)
            <li>{{ $drink->name }}</li>
        @endforeach
    </ul>
@endsection

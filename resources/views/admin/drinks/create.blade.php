@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Crea un nuovo drink</h2>
        <form action="{{ route('admin.drinks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name">Nome drink</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>

            {{-- {{ json_encode($techniques) }} --}}
            <div class="mb-3">
                <select name="technique" id="technique">
                    <option value="">Seleziona tecnica</option>
                    @foreach ($techniques as $tech)
                        <option value="{{ $tech->code }}"> {{ $tech->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Aggiungi
            </button>
        </form>
    </div>
@endsection

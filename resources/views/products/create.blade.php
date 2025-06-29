@extends('layouts.main')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Wystąpił błąd!</strong>
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<h2>Dodaj produkt</h2>

<form method="POST" action="/products">
    @csrf
    <div class="mb-3">
        <label>Nazwa</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Opis</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Cena</label>
        <input type="number" name="price" step="0.01" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Kategoria</label>
        <select name="category_id" class="form-select" required>
            <option value="">-- wybierz kategorię --</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Marka</label>
        <select name="brand_id" class="form-select" required>
            <option value="">-- wybierz markę --</option>
            @foreach($brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Dodaj</button>
    <a href="/products" class="btn btn-secondary">Anuluj</a>
</form>
@endsection
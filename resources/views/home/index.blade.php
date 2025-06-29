@extends('layouts.main')

@section('content')
    <h1>Witaj na stronie naszego sklepu muzycznego!</h1>
    <p>Wybierz jedną z opcji:</p>

    <div class="row gy-3">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <a href="/products" style="text-decoration:none">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title h5 text-black clearfix">Produkty</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection

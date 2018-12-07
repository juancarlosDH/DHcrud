@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Listado de Productos
            <a href="/products/create" class="btn btn-primary">Nuevo Producto</a>
        </h3>
        <div class="row card-columns">
            <div class="col-2">
                <ul>
                    <li>A</li>
                    <li>B</li>
                    <li>C</li>
                    <li>D</li>
                </ul>
            </div>
            <div class="col-10 ">
                @forelse ($products as $product)
                    {{--EMPIEZA CADA PRODUCTO--}}
                    <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="/{{ $product->image }}" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                    {{--TERMINA CADA PRODUCTO--}}
                @empty
                    <div class="alert alert-danger" role="alert">
                      No hay productos registrados
                    </div>
                @endforelse



            </div>
        </div>
    </div>



@endsection

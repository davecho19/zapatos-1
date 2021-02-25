@extends('layouts.app')
@section('content')
    {{--<h1>{{$pedido}}</h1>--}}
    <article class="contenido-pedido">
        <h1 class="text-center">{{$pedido->nombre}}</h1>
        <div class="imagen-pedido">
            <img src="/storage/{{$pedido->imagen}}" class="w-100">
        </div>
        <div class="pedido-data mt-2">
            <p>
                <span class="font-weight-bold text-primary">Tipo: </span>{{$pedido->tipo->nombre}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Cliente: </span>{{$pedido->nombre->nombre}}
            </p>

            <p>
                <span class="font-weight-bold text-primary">Fecha de creación: </span>
                {{date('d-m-y', strtotime($pedido->created_at))}}
            </p>

        </div>

        <div class="Tipos">
            <h2 class="my-3 text-primary">Tipos</h2>
            {!!$pedido->tipo!!}
        </div>

        <div class="cantidades">
            <h2 class="my-3 text-primary">cantidad</h2>
            {!!$pedido->cantidad!!}
        </div>

    </article>
@endsection
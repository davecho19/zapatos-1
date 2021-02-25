@extends('layouts.app')
@section('botones')
   <a href={{route('tropical.create')}} class="btn btn-primary  mr-2 text-white ml-5">Crear Pedido</a>
@endsection
@section('content')
    <h2 class="text-center mb-5">Verifica tus pedidos</h5>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Nombre Cliente</th>
                    <th scole="col">Tipo Producto</th>
                    <th scole="col">Cantidad</th>
                    <th scole="col">Precio</th>
                    
                </tr>
            </thead>
            <tbody>
            @foreach($userPedidos as $userPedidos)
                <tr>
                    <td>{{$userPedidos->nombre}}</td>
                    <td>{{$userPedidos->tipoPedido->nombre}}</td>
                    <td>{{$userPedidos->tipoCantidad->nombre}}</td>
                    <td>{{$userPedidos->tipoPrecio->nombre}}</td>
                    <td>
                    <a href="{{route('tropical.show',['pedido'=>$userPedidos->id])}}" class="btn btn-success mr-1 d-block mb-2">Ver</a>
                    <a href="{{route('tropical.edit',['pedido'=>$userPedidos->id])}}" class="btn btn-dark mr-1 d-block mb-2">Editar</a>

                    <form action="{{ route('tropical.destroy', ['pedido' => $userPedidos->id]) }}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger d-block w-100 mb-2" value="Eliminar &times;">
                    </form>

                    
                    </td>
                </tr>
             @endforeach
            </tbody>
            
            
        </table>
    </div>
@endsection
@extends('layouts.app')

<!--Estilos-->
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
@endsection

@section('botones')
    <a href={{route('tropical.index')}} class="btn btn-primary  mr-2 text-white ml-5">Seguimiento Pedidos</a>
@endsection

@section('content')

{{$pedido}}

    <h2 class="text-center mb-5"> Editar Pedido: {{$pedido->nombre}}</h2>
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <form method="POST" action="{{route('pedido.update', ['pedido' => $pedido->id])}}" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nombre">Nombre Cliente</label>
                        <input type="text" name="nombre" class="form-control @error('nombre')
                            is-invalid
                        @enderror"  
                        id="nombre" placeholder="Pedido" value={{$pedido->nombre}}>
                        @error('nombre')
                            <span class="invalid-feedback d-block" role="alert"> 
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                    <label for="tipo">Tipo de Producto</label>
                    <select name="tipo" class="form-control @error('tipo')
                            is-invalid
                        @enderror"   
                        id="tipo">
                        <option value="">--Seleccione--</option>
                        @foreach($tipo as $tipo)
                            <option value="{{$tipo->id}}" {{$pedido->tipo == $tipo->id  ? 'selected':''}}>{{$tipo->nombre}}</option>
                        @endforeach
                    </select>
                      @error('tipo')
                            <span class="invalid-feedback d-block" role="alert"> 
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                   


                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input id=imagen type="file" class="form-control @error('preparacion') is-invalid @enderror" name="imagen" >

                        <div class="mt-4">
                            <p>Imagen Actual</p>
                            <img src="/storage/{{$pedido->imagen}}" style="width: 300px">
                        </div>
                         @error('imagen')
                            <span class="invalid-feedback d-block" role="alert"> 
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <select name="cantidad" class="form-control @error('cantidad')
                            is-invalid
                        @enderror"   
                        id="cantidad">
                        <option value="">--Seleccione--</option>
                        @foreach($cantidad as $cantidad)
                            <option value="{{$cantidad->id}}" {{$pedido->cantidad == $cantidad->id  ? 'selected':''}}>{{$tipo->nombre}}</option>
                        @endforeach
                    </select>
                      @error('cantidad')
                            <span class="invalid-feedback d-block" role="alert"> 
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="text" name="precio" class="form-control @error('precio')
                            is-invalid
                        @enderror"  
                        id="precio" placeholder="precio" value={{$precio->nombre}}>
                        @error('precio')
                            <span class="invalid-feedback d-block" role="alert"> 
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Agregar Pedido" />
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Agregar pedido" />
                    </div>
                </form>
            </div>
        </div>
@endsection
<!--Scripts-->
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" defer></script>
@endsection
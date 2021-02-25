@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
@endsection

@section('botones')
    <a href={{route("tropical.index")}} class="btn btn-primary  mr-2 text-white ml-5">Pedidos</a>
@endsection

@section('content')
    <h2 class="text-center mb-5"> Hacer Pedido</h2>
       
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <form method="POST" action="{{route('pedidos.store')}}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre cliente</label>
                            <input type="text" name="nombre" class="form-control @error('nombre')
                            is-invalid
                        @enderror"  
                        id="nombre" placeholder="Nombre cliente" value={{old('nombre')}}>
                        @error('nombre')
                            <span class="invalid-feedback d-block" role="alert"> 
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                         <label for="tipo">Tipo Producto</label>
                            <select name="tipo" class="form-control" id="tipo">
                            <option value="">--Seleccione</option>
                                @foreach($tipo as $id => $tipo)
                                    <option value="{{$id}}" {{old('tipo')==$id ? 'selected':''}}>{{$tipo}}</option>
                                @endforeach
                                </select>
                                @error('tipo')
                            <span class="invalid-feedback d-block" role="alert"> 
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                            <select name="cantidad" class="form-control" id="cantidad">
                             <option value="">--Seleccione</option>
                                 @foreach($cantidad as $id => $cantidad)
                                    <option value="{{$id}}" {{old('cantidad')==$id ? 'selected':''}}>{{$cantidad}}</option>
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
                        id="precio" placeholder="precio " value={{old('precio')}}>
                        @error('precio')
                            <span class="invalid-feedback d-block" role="alert"> 
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="imagen">Foto Producto</label>
                            <input id=imagen type="file" name="precio" class="form-control" @error('nombre ') is-invalid @enderror>
                           
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Agregar Pedido" />
                    </div>
                </form>
            </div>
        </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous"></script>
@endsection

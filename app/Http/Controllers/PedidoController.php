<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Tipo;
use App\Cantidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth', ['except'=>'show']);
    }
    public function index()
    {
        $userPedidos=Auth::user()->userPedidos;
               return view('tropical.index')->with('userPedidos',$userPedidos);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo=DB::Table('tipo')->get()->pluck('id','nombre');
        $cantidad=DB::Table('cantidad')->get()->pluck('id','nombre');
       // $tipo=Tipo::all(['id','nombre']);
        //$cantidad=Cantidad::all(['id','nombre']);
         return view('tropical.create',['cantidad'=>$cantidad, 'tipo'=>$tipo]);
         // return view('tropical.create')->with('tipo',$tipo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data=$request->validate([
           'nombre'=>'required|min:6',
           'tipo'=>'required',
           'cantidad'=>'required',
           'precio'=>'required',
           'imagen'=>'required|image'
       ]);

       $rutaImagen=$request['imagen']->store('upload-pedido','public');
       $imgResize=Image::make(public_path("storage/{$rutaImagen}"))->fit(500,500);
       $imgResize->save(); 


        //almacenamos con Modelo
        //$data=$request;
        /*DB::table('pedidos')->insert([
            'nombre'=>$data['nombre'],
            'tipo_id'=>$data['tipo'],
            'cantidad_id'=>$data['cantidad'],
            'imagen'=>$rutaImagen,
            'precio'=>$data['precio'],
        ]);*/
        Auth::user()->userPedidos()->create([
            'nombre'=>$data['nombre'],
            'tipo_id'=>$data['tipo'],
            'cantidad_id'=>$data['cantidad'],
            'imagen'=>$rutaImagen,
            'precio'=>$data['precio'],
            ]);

        return redirect()->action('PedidoController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        return view('tropical.show')->with('pedido', $pedido);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $tipo=Tipo::all(['id','nombre']);
       // $tipo=BD::all(['id','nombre']);
        return view('tropical.edit', compact('tipo', 'pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $this->authorize('update', $pedido);

        $data=$request->validate([
            'nombre'=>'required|min:6',
            'tipo'=>'required',
            'cantidad'=>'required',
            'precio'=>'required',
            //'imagen'=>'required|image'
        ]);

        $pedido->nombre=$data['nombre'];
        $pedido->tipo_id=$data['tipo'];
        $pedido->cantidad_id=$data['cantidad'];
        $pedido->precio=$data['precio'];
        


        if(request('imagen')){
            $rutaImagen=$request['imagen']->store('upload-pedido','public');
            $imgResize=Image::make(public_path("storage/{$rutaImagen}"))->fit(1000,500);
            $imgResize->save();

            $pedido->imagen = $rutaImagen;
        }
        $pedido->save();    

        return redirect()->action('PedidoController@index');

        
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $this->authorize('delete', $pedido);
        $pedido->delete();
        return redirect()->action('PedidoController@index');
    }
}

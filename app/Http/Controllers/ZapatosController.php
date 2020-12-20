<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZapatosController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $zapatos = ['Niños','Adultos','Jovenes'];
        $marcas = ['Adidas','Nike','Bunky'];

        return view('zapatos.index', compact('zapatos','marcas'));// llmando a la vista
    }
}

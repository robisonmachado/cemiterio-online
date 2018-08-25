<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\Quadra;
use App\Fila;
use App\Cova;
use App\Sepultamento;

class SepultamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $validatedData = $request->validate([
            'falecido' => 'required',
            'data_falecimento' => 'required',
            'quadra' => 'required',
            'fila' => 'required',
            'cova' => 'required',
            'numero_sepultamento' => 'required',
        ],[
            'required'    => 'O campo ":attribute" é obrigatório',
            'unique'    => 'O campo ":attribute" deve ser único.',
        ]);
        
        $result = Sepultamento::addSepultamento($request);
        
        if($result){
            return back()->with('status', 'SEPULTAMENTO INSERIDO COM SUCESSO!');
        }
        
        //echo "result of operation: {{ $result }}";
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sepultamento  $sepultamento
     * @return \Illuminate\Http\Response
     */
    public function show(Sepultamento $sepultamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sepultamento  $sepultamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Sepultamento $sepultamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sepultamento  $sepultamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sepultamento $sepultamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sepultamento  $sepultamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sepultamento $sepultamento)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $clientes=Cliente::get();
            return response()->json(['status'=>1,'data'=>$clientes]);
        } catch (\Throwable $th) {
            return response()->json(['status'=>-1,'mensaje'=>$th]);
        }
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
        //
        try {
            $validated=$request->validate([
                'nombreComercial' => 'required',
                'razonSocial' => 'required',
                'rubro' => 'required',
                'observacion' => 'required',
            ]);
            $cliente=new Cliente();
            $cliente->nombreComercial=$request->nombreComercial;
            $cliente->razonSocial=$request->razonSocial;
            $cliente->rubro=$request->rubro;
            $cliente->observacion=$request->observacion;

            if($cliente->save())
                return response()->json(['status'=>1,'mensaje'=>'Datos guardados satisfactoriamente.']);
            else
                return response()->json(['status'=>0,'mensaje'=>'No se pudieron guardar los datos.']);

        } catch (\Throwable $th) {
            return response()->json(['status'=>-1,'mensaje'=>$th]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $clientes=Cliente::find($id);
            return response()->json(['status'=>1,'data'=>$clientes]);
        } catch (\Throwable $th) {
            return response()->json(['status'=>-1,'mensaje'=>$th]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validated=$request->validate([
                'nombreComercial' => 'required',
                'razonSocial' => 'required',
                'rubro' => 'required',
                'observacion' => 'required',
            ]);

            $cliente= Cliente::findOrfail($id);
            $cliente->nombreComercial=$request->nombreComercial;
            $cliente->razonSocial=$request->razonSocial;
            $cliente->rubro=$request->rubro;
            $cliente->observacion=$request->observacion;

            if($cliente->save())
                return response()->json(['status'=>1,'mensaje'=>'Datos editados satisfactoriamente.']);
            else
                return response()->json(['status'=>0,'mensaje'=>'No se pudieron editar los datos.']);

        } catch (\Throwable $th) {
            return response()->json(['status'=>-1,'mensaje'=>$th]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $cliente=Cliente::find($id);
            if($cliente->delete()){
                return response()->json(['status'=>1,'mensaje'=>'Datos borrados satisfactoriamente.']);
            }
            else{   return response()->json(['status'=>0,'mensaje'=>'No se pudieron borar los datos.']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status'=>-1,'mensaje'=>$th]);
        }
    }
}

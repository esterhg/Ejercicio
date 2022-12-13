<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\empleadosRequest;
use App\Models\Empleados;
use Illuminate\Http\Request;

class empleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = empleados::all();

        return response()->json([
            'empleados' => $empleados
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(empleadosRequest $request)
    {
        $empleados = empleados::create($request->all());

        return response()->json([
            'message' => "Empleado creado!",
            'empleados' => $empleados
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleados $empleados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(empleadosRequest $request, Empleados $empleados,$id)
    {
      
        $empleados=Empleados::find($id);
        $empleados->id= $request->input('id');
        $empleados->nombres= $request->input('nombres');
        $empleados->apellidos= $request->input('apellidos');
        $empleados->direccion= $request->input('direccion');
        $empleados->telefono= $request->input('telefono');
        $empleados->fechanac= $request->input('fechanac');
        $empleados->save();
        return response()->json([
            'message' => "Registro de empleado actualizado!",
            'empleados updated' => $empleados
           
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy(empleados $empleados,$id)
    {
        $empleados=Empleados::find($id);
        $empleados->delete();

        return response()->json([
            'message' => "Registro de empleado eliminado!",
            'empleados updated' => $empleados
        ], 200);
    }
}

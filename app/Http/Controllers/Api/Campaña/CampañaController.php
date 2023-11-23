<?php

namespace  App\Http\Controllers\Api\Campaña;

use Illuminate\Http\Request;
use App\Models\Campaña;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Profesion;
use App\Models\TipoDocumento;
use App\Http\Controllers\Controller;

class CampañaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $Campañas = Campaña::get();
            return response()->json([
                'success' => true,
                'message' => 'Campañas encontradas',
                'data' => $Campañas
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al encontrar las campañas',
                'data' => $th
            ], 500);
        }

    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        try {

            $Campaña = new Campaña();

            $credentials = $request->only('user_id', 'fecha_inicio', 'fecha_Caducidad', 'estado', 'valor', 'nombre');

            $validator = Validator::make($credentials, [

                'fecha_inicio' => 'required|date',
                'fecha_Caducidad' => 'required|date',
                'estado' => 'required|boolean',
                'valor' => 'required|numeric',
                'nombre' => 'required|string',
                'user_id' => 'required|numeric'
            ]);

            $Campaña->fecha_inicio = $request->fecha_inicio;
            $Campaña->fecha_Caducidad = $request->fecha_Caducidad;
            $Campaña->estado = $request->estado;
            $Campaña->valor = $request->valor;
            $Campaña->nombre = $request->nombre;
            $Campaña->user_id = $request->user_id;

            $Campaña->save();

            return response()->json([
                'success' => true,
                'message' => 'Campaña creada exitosamente',
                'data' => $Campaña
            ], 200);


        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la campaña',
                'data' => $th
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($idCampaña)
    {
        //
        try {
            $Campaña = Campaña::find($idCampaña);

            return response()->json([
                'success' => true,
                'message' => 'Campaña encontrada',
                'data' => $Campaña
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al encontrar la campaña',
                'data' => $th
            ], 500);
        }

    }

    /**
     * 
    
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idCampaña)
    {
        //
        try {

            $Campaña = Campaña::find($idCampaña);

            $credentials = $request->only('user_id', 'fecha_inicio', 'fecha_Caducidad', 'estado', 'valor', 'nombre');

            $validator = Validator::make($credentials, [

                'fecha_inicio' => 'required|date',
                'fecha_Caducidad' => 'required|date',
                'estado' => 'required|boolean',
                'valor' => 'required|numeric',
                'nombre' => 'required|string',
                'user_id' => 'required|numeric'
            ]);

            $Campaña->fecha_inicio = $request->fecha_inicio;
            $Campaña->fecha_Caducidad = $request->fecha_Caducidad;
            $Campaña->estado = $request->estado;
            $Campaña->valor = $request->valor;
            $Campaña->nombre = $request->nombre;
            $Campaña->user_id = $request->user_id;

            $Campaña->save();

            return response()->json([
                'success' => true,
                'message' => 'Campaña actualizada exitosamente',
                'data' => $Campaña
            ], 200);
        }catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la campaña',
                'data' => $th
            ], 500);
        }

        /**
         * Remove the specified resource from storage.
         */
    }

    public function destroy($idCampaña)
    {
        //
        try {
            $Campaña = Campaña::find($idCampaña);
            $Campaña->delete();

            return response()->json([
                'success' => true,
                'message' => 'Campaña eliminada exitosamente',
                'data' => $Campaña
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar la campaña',
                'data' => $th
            ], 500);
        }


    }

}

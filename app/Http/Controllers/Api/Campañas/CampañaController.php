<?php

namespace App\Http\Controllers\Api\Campañas;

use Illuminate\Http\Request;
use App\Models\Campaña;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CampañaController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('fecha_inicio', 'fecha_caducidad', 'valor', 'user_id', 'nombre');  

        $validator = Validator::make($credentials, [
            'fecha_inicio' => 'required',
            'fecha_caducidad' => 'required',
            'valor' => 'required',
            'user_id' => 'required',
            'nombre' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Los datos no son validos',
                'errors' => $validator->errors()
            ],422);
        }
        
        $campaña = new Campaña();
        $campaña->fecha_inicio = $request->fecha_inicio;
        $campaña->fecha_caducidad = $request->fecha_caducidad;
        $campaña->valor = $request->valor;
        $campaña->user_id = $request->user_id;
        $campaña->nombre = $request->nombre;
        $campaña->save();


        return response()->json([
            'success' => true,
            'message' => 'Campaña creada',
        ], 200);
    }
    public function update(Request $request, $campaña_id)
    {
        $credentials = $request->only('fecha_inicio', 'fecha_caducidad', 'valor', 'user_id', 'estado', 'nombre');  

        $validator = Validator::make($credentials, [
            'fecha_inicio' => 'required',
            'fecha_caducidad' => 'required',
            'valor' => 'required',
            'user_id' => 'required',
            'estado' => 'required',
            'nombre' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Los datos no son validos',
                'errors' => $validator->errors()
            ],422);
        }

        $campaña = Campaña::where('id', $campaña_id)->first();

        if(!$campaña):
            return response()->json([
                'success' => false,
                'message' => 'No se encontro la campaña',
            ], 404);
        endif;


        $campaña->fecha_inicio = $request->fecha_inicio;
        $campaña->fecha_caducidad = $request->fecha_caducidad;
        $campaña->valor = $request->valor;
        $campaña->estado = $request->estado;
        $campaña->user_id = $request->user_id;
        $campaña->nombre = $request->nombre;
        $campaña->save();


        return response()->json([
            'success' => true,
            'message' => 'Campaña actualizada',
        ], 200);
    }

    public function destroy($campaña_id)
    {
        $campaña = Campaña::where('id', $campaña_id)->first();

        if(!$campaña):
            return response()->json([
                'success' => false,
                'message' => 'No se encontro la campaña',
            ], 404);
        endif;
        
        $campaña->delete();

        return response()->json([
            'success' => true,
            'message' => 'Campaña eliminada',
        ], 200);
    }
}

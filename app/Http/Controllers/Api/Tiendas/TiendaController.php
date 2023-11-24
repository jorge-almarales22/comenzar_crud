<?php

namespace App\Http\Controllers\Api\Tiendas;

use App\Models\Tienda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TiendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('nombre', 'user_id');  

        $validator = Validator::make($credentials, [
            'nombre' => 'required',
            'user_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Los datos no son validos',
                'errors' => $validator->errors()
            ],422);
        }
        
        $tienda = new Tienda();
        $tienda->user_id = $request->user_id;
        $tienda->nombre = $request->nombre;
        $tienda->save();


        return response()->json([
            'success' => true,
            'message' => 'Tienda creada',
        ], 200);
    }
    public function update(Request $request, $tienda_id)
    {
        $credentials = $request->only('nombre', 'user_id');  

        $validator = Validator::make($credentials, [
            'nombre' => 'required',
            'user_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Los datos no son validos',
                'errors' => $validator->errors()
            ],422);
        }
        
        $tienda = Tienda::where('id', $tienda_id)->first();

        if(!$tienda):
            return response()->json([
                'success' => false,
                'message' => 'No se encontro la tienda',
            ], 404);
        endif;

        $tienda->nombre = $request->nombre;
        $tienda->user_id = $request->user_id;
        $tienda->save();


        return response()->json([
            'success' => true,
            'message' => 'Tienda actualizada',
        ], 200);
    }

    public function destroy($tienda_id)
    {
        $tienda = Tienda::where('id', $tienda_id)->first();

        if(!$tienda):
            return response()->json([
                'success' => false,
                'message' => 'No se encontro la tienda',
            ], 404);
        endif;
        
        $tienda->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tienda eliminada',
        ], 200);
    }
}

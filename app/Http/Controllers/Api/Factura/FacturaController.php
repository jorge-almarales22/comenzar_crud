<?php

namespace App\Http\Controllers\Api\Factura;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Profesion;
use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FacturaController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('jwt.auth');
    // }

    public function index()
    {
        $facturas = Factura::get();
        return response()->json([
            'success' => true,
            'data' => $facturas
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            

            $credentials = $request->only('user_id','cliente_id', 'tienda_id', 'campaña_id','valor_factura' ,'numero_factura', 'foto_factura', 'saldo_factura_por_redimir', 'redimido_status');   

            $validator = Validator::make($credentials, [
                'cliente_id' => 'required|numeric',
                'tienda_id' => 'required|numeric',
                'campaña_id' => 'required|numeric',
                'numero_factura' => 'required|string',
                'foto_factura' => 'string',
                'saldo_factura_por_redimir' => 'required|numeric',
                'redimido_status' => 'required|boolean',
                'valor_factura' => 'required|numeric',
                'user_id' => 'required|numeric'
            ]);

            if($validator->fails()){
                return response()->json([
                    'success' => false,
                    'message' => 'Los datos no son validos',
                    'errors' => $validator->errors()
                ],422);
            }
           
            $factura = Factura::where('numero_factura', $request->numero_factura)->first();
            
            if($factura){
                return response()->json([
                    'success' => false,
                    'message' => 'La factura ya existe'
                ], 422);
            } 
                 
            $factura = new Factura();
            $factura->cliente_id = $request->cliente_id;
            $factura->tienda_id = $request->tienda_id;
            $factura->campaña_id = $request->campaña_id;
            $factura->numero_factura = $request->numero_factura;
            $factura->foto_factura = $request->foto_factura;
            $factura->saldo_factura_por_redimir = $request->saldo_factura_por_redimir;
            $factura->redimido_status = $request->redimido_status;
            $factura->valor_factura = $request->valor_factura;
            $factura->user_id = $request->user_id;

            $factura->save();

            return response()->json([
                'success' => true,
                'message' => 'La factura ha sido creado',
                'statuscode'=> 200,
                'data' => $factura
            ]);
       
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la factura',
                'statuscode'=> 500,
                'data' => $th->getMessage()
            ]);
        }
       
    }

    public function update(Request $request, $documento)
    {
        $credentials = $request->only('user_id','cliente_id', 'tienda_id', 'campaña_id','valor_factura' ,'numero_factura', 'foto_factura', 'saldo_factura_por_redimir', 'redimido_status');   

        $validator = Validator::make($credentials, [
            'cliente_id' => 'required|numeric',
            'tienda_id' => 'required|numeric',
            'campaña_id' => 'required|numeric',
            'numero_factura' => 'required|string',
            'foto_factura' => 'string',
            'saldo_factura_por_redimir' => 'required|numeric',
            'redimido_status' => 'required|boolean',
            'valor_factura' => 'required|numeric',
            'user_id' => 'required|numeric'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Los datos no son validos',
                'errors' => $validator->errors()
            ],422);
        }
        
        $cliente = Cliente::where('numero_documento',$documento)->first();

        if(!$cliente){
            return response()->json([
                'success' => false,
                'message' => 'El cliente no existe'
            ], 404);
        }

        $cliente->profesion_id = $request->profesion_id;
        $cliente->tipo_documento_id = $request->tipo_documento_id;
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->hijos = $request->hijos;

        if($cliente->numero_documento != $request->numero_documento){
            $cliente->numero_documento = $request->numero_documento;
        }

        $cliente->mascotas = $request->mascotas;
        $cliente->user_id = $request->user_id;

        $cliente->save();

        return response()->json([
            'success' => true,
            'message' => 'El cliente ha sido actualizado',
            'data' => $cliente
        ]);
    }

    public function delete($documento , $tiendaId)
    {
        $cliente = Cliente::where('numero_documento', $documento)->first();

        if(!$cliente){

            return response()->json([
                'success' => false,
                'message' => 'El cliente no existe'
            ], 404);

        }

        $factura = Factura::where('cliente_id', $cliente->id)
        ->where('tienda_id',$tiendaId)  // Reemplaza $tiendaId con el valor deseado
        ->first();

        if(!$factura){

            $cliente->delete();

            return response()->json([
                'success' => true,
                'message' => 'El cliente ha sido eliminado'
            ]);

        }

        return response()->json([
            'success' => false,
            'message' => 'El cliente no se puede eliminar, ya que tiene una factura registrada'
        ], 404);       

        
    }

   
    public function BuscarClienteConFacturas($documento)
    {
        $cliente = Cliente::where('numero_documento', $documento)->first();

        if(!$cliente){
            return response()->json([
                'success' => false,
                'message' => 'El cliente no existe'
            ], 404);
        }


        $facturas = Factura::where('cliente_id', $cliente->id)->get();

        $cliente->facturas = $facturas;
       


        if(!$cliente && !$facturas){
            return response()->json([
                'success' => false,
                'message' => 'El cliente no existe'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $cliente , 
        ]);

    }

    public function findFactura($numeroFactura){
            
            $factura = Factura::where('numero_factura', $numeroFactura)->first();
    
            if(!$factura){
                return response()->json([
                    'success' => false,
                    'message' => 'La factura no existe'
                ], 404);
            }
    
            return response()->json([
                'success' => true,
                'data' => $factura
            ], 200);



    }

}



<?php

namespace App\Http\Controllers\Api\Facturas;

use App\Models\Ticket;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Campaña;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FacturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function guardarFactura(Request $request)
    {
        $credentials = $request->only('cliente_id', 'tienda_id', 'campaña_id', 'foto_factura', 'valor_factura', 'saldo', 'user_id');  

        $validator = Validator::make($credentials, [
            'cliente_id' => 'required',
            'tienda_id' => 'required',
            'campaña_id' => 'required',
            'foto_factura' => 'required',
            'valor_factura' => 'required',
            'user_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Los datos no son validos',
                'errors' => $validator->errors()
            ],422);
        }

        $factura = new Factura();
        $factura->numero_factura = uniqid();
        $factura->cliente_id = $request->cliente_id;
        $factura->tienda_id = $request->tienda_id;
        $factura->campaña_id = $request->campaña_id;
        $factura->foto_factura = $request->foto_factura;
        $factura->valor_factura = $request->valor_factura;
        $factura->saldo = $request->valor_factura;
        $factura->user_id = $request->user_id;
        $factura->redimido = false;
        $factura->save();

        return response()->json([
            'success' => true,
            'data' => $factura,
            'message' => 'Factura guardada',
        ]);
    }

    public function BuscarFacturasPorCliente(Request $request)
    {

        $credentials = $request->only('numero_documento', 'campaña_id');  

        $validator = Validator::make($credentials, [
            'numero_documento' => 'required',
            'campaña_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Los datos no son validos',
                'errors' => $validator->errors()
            ],422);
        }

        $cliente = Cliente::where('numero_documento', $request->numero_documento)->first();

        if(!$cliente)
        {
            return response()->json([
                'success' => false,
                'message' => 'No se encontro el cliente',
            ], 404);
        }

        $facturas = Factura::where('cliente_id', $cliente->id)
                    ->where('campaña_id', $request->campaña_id)
                    ->where('redimido', 0)
                    ->orderBy('created_at', 'desc')
                    ->get();
        
        return response()->json([
            'success' => true,
            'data' => $facturas,
            'message' => 'Facturas encontradas',

        ], 200);
    }


    public function RedimirFacturas(Request $request)
    {
        $facturas = Factura::whereIn('id', $request->facturas)->where('redimido', 0)->orderBy('created_at', 'ASC')->get();

        $campana = Campaña::find($request->campaña_id);

        $saldo_total = 0;

        if($facturas->count() == 0 || $campana == null)
        {
            return response()->json([
                'success' => false,
                'message' => 'No se encontraron facturas',
            ], 404);
        }

        foreach($facturas as $factura):

            $saldo_total += $factura->saldo;

        endforeach;

        $lenght = sizeof($facturas);

        foreach($facturas as $index => $factura):

            if($factura->saldo >= $campana->valor):

                while($factura->saldo >= $campana->valor):
    
                    $factura->saldo = $factura->saldo - $campana->valor;
    
                    $ticket = new Ticket();
                    $ticket->numero = uniqid();
                    $ticket->save();

                    if($factura->saldo == 0):

                        $factura->redimido = true;
                        
                    endif;

                    $factura->save();
    
                endwhile;
                
                //verificamos si la ultima factura del array de facturas
                if($index + 1 < $lenght):
    
                    //sumamos saldo a la proxima factura
                    $facturas[$index + 1]->saldo = $facturas[$index + 1]->saldo + $factura->saldo;
        
                    $facturas[$index + 1]->save();
    
                    //reiniciamos el saldo de la actual factura y estado pasa a redimido
                    $factura->saldo = 0;
    
                    $factura->redimido = true;
    
                    $factura->save();
    
                endif;
            else:

                if($index + 1 < $lenght):
    
                    //sumamos saldo a la proxima factura
                    $facturas[$index + 1]->saldo = $facturas[$index + 1]->saldo + $factura->saldo;
        
                    $facturas[$index + 1]->save();
    
                    //reiniciamos el saldo de la actual factura y estado pasa a redimido
                    $factura->saldo = 0;
    
                    $factura->redimido = true;
    
                    $factura->save();
    
                endif;


            endif;


        endforeach;
        
        return response()->json([
            'success' => true,
            'message' => 'Facturas redimidas',
        ]);


    }
}

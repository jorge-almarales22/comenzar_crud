<?php

namespace App\Http\Controllers\Api\Facturas;

use App\Models\Ticket;
use App\Models\Campaña;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\ClienteCampañaSaldo;
use Illuminate\Http\Request;
use App\Models\FacturaTicket;
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
        $credentials = $request->only('cliente_id', 'tienda_id', 'campaña_id', 'valor_factura', 'user_id');  

        $validator = Validator::make($credentials, [
            'cliente_id' => 'required',
            'tienda_id' => 'required',
            'campaña_id' => 'required',
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
        $factura->user_id = $request->user_id;
        $factura->foto_factura = $request->foto_factura;
        $factura->valor_factura = $request->valor_factura;
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
        $facturas = Factura::whereIn('id', $request->facturas)->where('redimido', 0)->get();

        $campana = Campaña::find($request->campaña_id);

        if($facturas->count() == 0 || $campana == null)
        {
            return response()->json([
                'success' => false,
                'message' => 'No se encontraron facturas',
            ], 404);
        }

        $valorTotalFacturas = 0;

        foreach($facturas as $factura):
            $valorTotalFacturas = $valorTotalFacturas + $factura->valor_factura;  
        endforeach;

        $saldoCliente = ClienteCampañaSaldo::where('campaña_id', $request->campaña_id)->where('cliente_id', $factura->cliente_id)->first(); 

        
        if($saldoCliente && $saldoCliente->saldo > 0 && ($valorTotalFacturas + $saldoCliente->saldo) >= $campana->valor):
            
            $valorTotalFacturas = $valorTotalFacturas + $saldoCliente->saldo;
            $saldoCliente->delete();            
            
        endif;

        $saldoGenerado = $valorTotalFacturas % $campana->valor;
        
        
        if($valorTotalFacturas >= $campana->valor):
            
            if($saldoGenerado > 0):
                
                $saldoTemporal = new ClienteCampañaSaldo();
                $saldoTemporal->cliente_id = $request->cliente_id;
                $saldoTemporal->campaña_id = $request->campaña_id;
                $saldoTemporal->saldo = $saldoGenerado;
                $saldoTemporal->save();
            endif;
                
            foreach($facturas as $factura):
    
                $factura->redimido = true;
                $factura->fecha_redimido = date("Y-m-d H:i:s");
    
                $factura->save();
    
            endforeach;
    
    
            for($i = 1; $i <= floor($valorTotalFacturas / $campana->valor); $i++)
            {
                $ticket = new Ticket();
                $ticket->cliente_id = $request->cliente_id;
                $ticket->numero = uniqid();
                $ticket->save();
            }

        else:

            return response()->json([
                'success' => false,
                'message' => 'No se puede redimir facturas, la suma de las facturas es menor al valor de la campaña',
            ], 404);

        endif;


        return response()->json([
            'success' => true,
            'message' => 'Facturas redimidas',
        ]);


    }
}

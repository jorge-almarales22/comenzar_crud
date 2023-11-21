<?php

namespace App\Http\Controllers\Api\Facturas;

use App\Models\Ticket;
use App\Models\Cliente;
use App\Models\Factura;
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
        $facturas = Factura::whereIn('id', $request->facturas)->where('redimido', 0)->orderBy('created_at', 'desc')->get();

        $saldo_total = 0;

        if($facturas->count() == 0)
        {
            return response()->json([
                'success' => false,
                'message' => 'No se encontraron facturas',
            ], 404);
        }

        foreach($facturas as $factura):
            $saldo_total += $factura->saldo;
        endforeach;

        $ticketsGenerados = floor($saldo_total / 50000);
        $saldoGenerado = $saldo_total % 50000;

        \Log::info($saldoGenerado);
        for ($i = 1; $i <= $ticketsGenerados; $i++) {
            $ticket = new Ticket();
            $ticket->numero = uniqid();
            $ticket->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Facturas redimidas',
        ]);
    }
}

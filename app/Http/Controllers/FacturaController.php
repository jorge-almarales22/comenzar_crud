<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\Ticket;
use App\Models\Tienda;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Campaña;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        // return view('home');
    }

    public function create()
    {
        $clientes = Cliente::get();
        $tiendas = Tienda::get();
        $campañas = Campaña::get();
        
        return view('facturas.home', compact('clientes', 'tiendas', 'campañas'));
    }

    public function updating(Factura $factura)
    {
        $clientes = Cliente::get();
        $tiendas = Tienda::get();
        
        return view('facturas.update', compact('clientes', 'tiendas', 'factura'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'tienda_id' => 'required',
            'campaña_id' => 'required',
            'user_id' => 'required',
            'numero_factura' => 'required',
            'valor' => 'required',
            'redimido' => 'required',
            'foto_factura' => 'required',
        ]);

        $factura = new Factura();

        $factura->cliente_id = $request->cliente_id;
        $factura->tienda_id = $request->tienda_id;
        $factura->campaña_id = $request->campaña_id;
        $factura->user_id = $request->user_id;
        $factura->numero_factura = $request->numero_factura;
        $factura->valor = $request->valor;
        $factura->redimido = $request->redimido;
    
        $request->file('foto_factura')->store('public');
        $factura->foto_factura = $request->file('foto_factura')->store('public');

        $factura->save();

        $ticketsGenerados = floor($request->valor / 50000);
        $saldoGenerado = $request->valor % 50000;

        $saldo = Saldo::where('cliente_id', $request->cliente_id)->first();

        if (!$saldo && $saldoGenerado > 0) {

            $newSaldo = new Saldo();
            $newSaldo->cliente_id = $request->cliente_id;
            $newSaldo->campaña_id = $request->campaña_id;
            $newSaldo->valor = $saldoGenerado;
            $newSaldo->save();

        }else{

            $saldo->valor = $saldo->valor + $saldoGenerado;

            if($saldo->valor >= 50000){

                $ticketsGenerados = $ticketsGenerados + floor($saldo->valor / 50000);
                
                $saldo->valor = $saldo->valor - 50000;

            }

            $saldo->save();
        }

        for ($i = 1; $i <= $ticketsGenerados; $i++) {
            $ticket = new Ticket();
            $ticket->numero = "aaaa";
            $ticket->save();
        }

        return redirect()->route('home')->with('status', 'Factura creada exitosamente');
    }

    public function update(Request $request)
    {

        $request->validate([
            'cliente_id' => 'required',
            'tienda_id' => 'required',
            'campaña_id' => 'required',
            'user_id' => 'required',
            'numero_factura' => 'required',
            'valor' => 'required',
            'redimido' => 'required',
            'foto_factura' => 'required',
        ]);


        $factura = Factura::where('id', $request->factura_id)->first();

        if (!$factura) {
            return redirect()->route('home')->with('error', 'Factura no encontrada');
        }

        $factura->cliente_id = $request->cliente_id;
        $factura->tienda_id = $request->tienda_id;
        $factura->campaña_id = $request->campaña_id;
        $factura->user_id = $request->user_id;
        $factura->numero_factura = $request->numero_factura;
        $factura->valor = $request->valor;
        $factura->redimido = $request->redimido;
        $request->file('foto_factura')->store('public');
        $factura->foto_factura = $request->file('foto_factura')->store('public');
        $factura->save();

        return redirect()->route('home')->with('status', 'Factura creada exitosamente');
    }

    public function destroy($id)
    {
        $factura = Factura::where('id', $id)->first();
        $factura->delete();
        return redirect()->route('home')->with('status', 'Factura eliminado exitosamente');
    }
}
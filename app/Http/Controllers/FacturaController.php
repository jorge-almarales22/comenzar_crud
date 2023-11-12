<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\Ticket;
use App\Models\Tienda;
use App\Models\Cliente;
use App\Models\Factura;
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
        
        return view('facturas.home', compact('clientes', 'tiendas'));
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
            'numero_factura' => 'required',
            'valor' => 'required',
            'fecha_caducidad' => 'required',
            'foto_factura' => 'required',
            'campaña' => 'required',
        ]);

        $factura = new Factura();

        $factura->cliente_id = $request->cliente_id;
        $factura->tienda_id = $request->tienda_id;
        $factura->numero_factura = $request->numero_factura;
        $factura->valor = $request->valor;
        
        $fechaActual = new \DateTime();
        $fechaParametro = new \DateTime($request->fecha_caducidad);
    
        if ($fechaParametro <= $fechaActual) {
            return redirect()->route('home')->with('error', 'La fecha de caducidad no puede ser menor o igual a la fecha actual');
        } 

        $factura->fecha_caducidad = $request->fecha_caducidad;
        $request->file('foto_factura')->store('public');
        $factura->foto_factura = $request->file('foto_factura')->store('public');
        $factura->campaña = $request->campaña;

        $factura->save();

        $ticketsGenerados = floor($request->valor / 50000);
        $saldoGenerado = $request->valor % 50000;

        $saldo = Saldo::where('cliente_id', $request->cliente_id)->first();

        if (!$saldo && $saldoGenerado > 0) {

            $newSaldo = new Saldo();
            $newSaldo->cliente_id = $request->cliente_id;
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
            $ticket->cliente_id = $request->cliente_id;
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
            'factura_id' => 'required',
            'numero_factura' => 'required',
            'valor' => 'required',
            'fecha_caducidad' => 'required',
            'foto_factura' => 'required',
        ]);

        $factura = Factura::where('id', $request->factura_id)->first();

        if (!$factura) {
            return redirect()->route('home')->with('error', 'Factura no encontrada');
        }

        $factura->cliente_id = $request->cliente_id;
        $factura->tienda_id = $request->tienda_id;
        $factura->numero_factura = $request->numero_factura;
        $factura->valor = $request->valor;

        $fechaActual = new \DateTime();
        $fechaParametro = new \DateTime($request->fecha_caducidad);
    
        if ($fechaParametro <= $fechaActual) {
            return redirect()->route('home')->with('error', 'La fecha de caducidad no puede ser menor o igual a la fecha actual');
        } 

        $factura->fecha_caducidad = $request->fecha_caducidad;
        $request->file('foto_factura')->store('public');
        $factura->foto_factura = $request->file('foto_factura')->store('public');
        $factura->campaña = $request->campaña;
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
<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        return view('home');
        
    }

    public function create()
    {
        $clientes = Cliente::get();
        $tiendas = Tienda::get();
        
        return view('cliente.create', compact('clientes', 'tiendas'));
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
        $factura->fecha_caducidad = $request->fecha_caducidad;
        $factura->foto_factura = $request->foto_factura;
        $factura->campaña = $request->campaña;

        $factura->save();

        return redirect()->route('home')->with('success', 'Factura creada exitosamente');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'cliente_id' => 'required',
            'tienda_id' => 'required',
            'numero_factura' => 'required',
            'valor' => 'required',
            'fecha_caducidad' => 'required',
        ]);

        $factura = Factura::where('id', $id)->first();

        if (!$factura) {
            return redirect()->route('home')->with('error', 'Factura no encontrada');
        }

        $factura->cliente_id = $request->cliente_id;
        $factura->tienda_id = $request->tienda_id;
        $factura->numero_factura = $request->numero_factura;
        $factura->valor = $request->valor;
        $factura->fecha_caducidad = $request->fecha_caducidad;
        $factura->foto_factura = $request->foto_factura;
        $factura->campaña = $request->campaña;

        return redirect()->route('home')->with('success', 'Factura creada exitosamente');
    }

    public function destroy($id)
    {
        $factura = Factura::where('id', $id)->first();
        $factura->delete();
        return redirect()->route('home')->with('success', 'Factura eliminado exitosamente');
    }
}


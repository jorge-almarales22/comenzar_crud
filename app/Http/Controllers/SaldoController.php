<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    public function index()
    {
        // return view('home');
    }

    public function create()
    {
        $clientes = Cliente::get();
        
        return view('saldo.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'campaña_id' => 'required',
            'valor' => 'required'
        ]);

        $saldo = new Saldo();

        $saldo->cliente_id = $request->cliente_id;
        $saldo->campaña_id = $request->campaña_id;
        $saldo->valor = $request->valor;

        $saldo->save();

        return redirect()->route('home')->with('success', 'Saldo creado exitosamente');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'cliente_id' => 'required',
            'campaña_id' => 'required',
            'valor' => 'required'
        ]);

        $saldo = Saldo::where('id', $id)->first();

        if (!$saldo) {
            return redirect()->route('home')->with('error', 'Saldo no encontrado');
        }

        $saldo->cliente_id = $request->cliente_id;
        $saldo->campaña_id = $request->campaña_id;
        $saldo->valor = $request->valor;

        return redirect()->route('home')->with('success', 'Saldo actualizado exitosamente');
    }

    public function destroy($id)
    {
        $saldo = Saldo::where('id', $id)->first();
        $saldo->delete();
        return redirect()->route('home')->with('success', 'Saldo eliminado exitosamente');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index()
    {
        // return view('home');
    }

    public function create()
    {
        // return view('cliente.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $tienda = new Tienda();
        $tienda->nombre = $request->nombre;
        $tienda->save();

        return redirect()->route('home')->with('success', 'Tienda creada exitosamente');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $tienda = Tienda::where('id', $id)->first();

        if (!$tienda) {
            return redirect()->route('home')->with('error', 'Tienda no encontrada');
        }

        $tienda->nombre = $request->nombre;
        $tienda->save();

        return redirect()->route('home')->with('success', 'Tienda actualizada exitosamente');
    }

    public function destroy($id)
    {
        $tienda = Tienda::where('id', $id)->first();
        $tienda->delete();
        return redirect()->route('home')->with('success', 'Tienda eliminada exitosamente');
    }
}
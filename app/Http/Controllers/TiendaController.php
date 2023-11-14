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
        return view('tiendas.home');
    }

    public function updating(Tienda $tienda)
    {
        return view('tiendas.update', compact('tienda'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'user_id' => 'required',
        ]);

        $tienda = new Tienda();
        $tienda->nombre = $request->nombre;
        $tienda->user_id = $request->user_id;
        $tienda->save();

        return redirect()->route('home')->with('status', 'Tienda creada exitosamente');
    }

    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'tienda_id' => 'required',
            'user_id' => 'required',
        ]);

        $tienda = Tienda::where('id', $request->tienda_id)->first();

        if (!$tienda) {
            return redirect()->route('home')->with('error', 'Tienda no encontrada');
        }

        $tienda->nombre = $request->nombre;
        $tienda->user_id = $request->user_id;
        $tienda->save();

        return redirect()->route('home')->with('status', 'Tienda actualizada exitosamente');
    }

    public function destroy($id)
    {
        $tienda = Tienda::where('id', $id)->first();
        $tienda->delete();
        return redirect()->route('home')->with('status', 'Tienda eliminada exitosamente');
    }
}
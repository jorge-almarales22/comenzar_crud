<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        // return view('home');
    }

    public function create()
    {
        return "hola";
        // return view('cliente.create');
    }

    public function store(Request $request)
    {
        return $request;
        
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
            'fecha_nacimiento' => 'required',
            'profesion' => 'required',
            'hijos' => 'required',
            'mascotas' => 'required',
        ]);

        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;

        $fechaActual = new DateTime();
        $fechaParametro = new DateTime($request->fecha_nacimiento);
    
        if ($fechaActual < $fechaParametro) {
            return redirect()->route('home')->with('error', 'La fecha de nacimiento no puede ser posterior a la fecha actual');
        } 

        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->profesion = $request->profesion;
        $cliente->hijos = $request->hijos;
        $cliente->mascotas = $request->mascotas;
        $cliente->save();

        return redirect()->route('home')->with('success', 'Cliente creado exitosamente');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
            'fecha_nacimiento' => 'required',
            'profesion' => 'required',
            'hijos' => 'required',
            'mascotas' => 'required',
        ]);

        $cliente = Cliente::where('id', $id)->first();

        if (!$cliente) {
            return redirect()->route('home')->with('error', 'Cliente no encontrado');
        }

        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;

        $fechaActual = new DateTime();
        $fechaParametro = new DateTime($request->fecha_nacimiento);
    
        if ($fechaActual < $fechaParametro) {
            return redirect()->route('home')->with('error', 'La fecha de nacimiento no puede ser posterior a la fecha actual');
        } 

        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->profesion = $request->profesion;
        $cliente->hijos = $request->hijos;
        $cliente->mascotas = $request->mascotas;
        $cliente->save();

        return redirect()->route('home')->with('success', 'Cliente actualizado exitosamente');
    }

    public function destroy($id)
    {
        $cliente = Cliente::where('id', $id)->first();
        $cliente->delete();
        return redirect()->route('home')->with('success', 'Cliente eliminado exitosamente');
    }
}

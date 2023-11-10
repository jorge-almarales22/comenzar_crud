<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        //Aca se va a retornar la vista de home
        // return view('home');
    }
    public function create()
    {
        return view('clientes.home');
    }
    public function updating(Cliente $cliente)
    {
        return view('clientes.update', compact('cliente'));
    }

    public function store(Request $request)
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

        $cliente = new Cliente();

        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;

        $fechaActual = new \DateTime();
        $fechaParametro = new \DateTime($request->fecha_nacimiento);
    
        if ($fechaActual < $fechaParametro) {
            return redirect()->route('home')->with('error', 'La fecha de nacimiento no puede ser posterior a la fecha actual');
        } 

        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->profesion = $request->profesion;
        $cliente->hijos = $request->hijos;
        $cliente->mascotas = $request->mascotas;
        $cliente->save();

        return redirect()->route('home')->with('status', 'Cliente creado exitosamente');
    }

    public function update(Request $request)
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
            'cliente_id' => 'required',
        ]);

        $cliente = Cliente::where('id', $request->cliente_id)->first();

        if (!$cliente) {
            return redirect()->route('home')->with('error', 'Cliente no encontrado');
        }

        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;

        $fechaActual = new \DateTime();
        $fechaParametro = new \DateTime($request->fecha_nacimiento);
    
        if ($fechaActual < $fechaParametro) {
            return redirect()->route('home')->with('error', 'La fecha de nacimiento no puede ser posterior a la fecha actual');
        } 

        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->profesion = $request->profesion;
        $cliente->hijos = $request->hijos;
        $cliente->mascotas = $request->mascotas;
        $cliente->save();

        return redirect()->route('home')->with('status', 'Cliente actualizado exitosamente');
    }

    public function destroy($id)
    {
        $cliente = Cliente::where('id', $id)->first();
        $cliente->delete();
        return redirect()->route('home')->with('status', 'Cliente eliminado exitosamente');
    }
}

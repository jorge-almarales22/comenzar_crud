<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        // return view('home');
    }

    public function create()
    {
        $clientes = Cliente::get();
        
        return view('ticket.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'numero' => 'required',
            'QR' => 'required'
        ]);

        $ticket = new Ticket();

        $ticket->cliente_id = $request->cliente_id;
        $ticket->numero = $request->numero;
        $ticket->QR = $request->QR;

        $ticket->save();

        return redirect()->route('home')->with('success', 'Ticket creado exitosamente');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'cliente_id' => 'required',
            'numero' => 'required',
            'QR' => 'required'
        ]);

        $ticket = Ticket::where('id', $id)->first();

        if (!$ticket) {
            return redirect()->route('home')->with('error', 'Ticket no encontrado');
        }

        $ticket->cliente_id = $request->cliente_id;
        $ticket->numero = $request->numero;
        $ticket->QR = $request->QR;

        return redirect()->route('home')->with('success', 'Ticket actualizado exitosamente');
    }

    public function destroy($id)
    {
        $ticket = Ticket::where('id', $id)->first();
        $ticket->delete();
        return redirect()->route('home')->with('success', 'Ticket eliminado exitosamente');
    }
}
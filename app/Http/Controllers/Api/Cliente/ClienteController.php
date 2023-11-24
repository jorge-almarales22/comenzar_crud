<?php

namespace App\Http\Controllers\Api\Cliente;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Profesion;
use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function index()
    {
        $clientes = Cliente::get();
        return response()->json([
            'success' => true,
            'data' => $clientes
        ], 200);
    }

    public function store(Request $request)
    {
        $credentials = $request->only('profesion_id', 'tipo_documento_id', 'nombre', 'apellidos', 'email', 'telefono', 'direccion', 'fecha_nacimiento', 'hijos', 'numero_documento', 'mascotas', 'user_id');   

        $validator = Validator::make($credentials, [
            'profesion_id' => 'required|numeric',
            'tipo_documento_id' => 'required|numeric',
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'required|numeric',
            'numero_documento' => 'required|numeric|max:9999999999|min:9999999|unique:clientes,numero_documento',
            'user_id' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Los datos no son validos',
                'errors' => $validator->errors()
            ],422);
        }

        $cliente = new Cliente();
        $cliente->profesion_id = $request->profesion_id;
        $cliente->tipo_documento_id = $request->tipo_documento_id;
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->hijos = $request->hijos;
        $cliente->numero_documento = $request->numero_documento;
        $cliente->mascotas = $request->mascotas;
        $cliente->user_id = $request->user_id;

        $cliente->save();

        return response()->json([
            'success' => true,
            'message' => 'El cliente ha sido creado',
            'data' => $cliente
        ]);
    }

    public function update(Request $request, $documento)
    {
        $credentials = $request->only('profesion_id', 'tipo_documento_id', 'nombre', 'apellidos', 'email', 'telefono', 'direccion', 'fecha_nacimiento', 'hijos', 'numero_documento', 'mascotas', 'user_id');   

        $validator = Validator::make($credentials, [
            'profesion_id' => 'required|numeric',
            'tipo_documento_id' => 'required|numeric',
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'required|numeric',
            'numero_documento' => 'required|numeric|max:9999999999|min:9999999',
            'user_id' => 'required|numeric'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Los datos no son validos',
                'errors' => $validator->errors()
            ],422);
        }

        $cliente = Cliente::where('numero_documento',$documento)->first();

        if(!$cliente){
            return response()->json([
                'success' => false,
                'message' => 'El cliente no existe'
            ], 404);
        }
        $cliente->profesion_id = $request->profesion_id;
        $cliente->tipo_documento_id = $request->tipo_documento_id;
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->hijos = $request->hijos;

        if($cliente->numero_documento != $request->numero_documento){
            $cliente->numero_documento = $request->numero_documento;
        }

        $cliente->mascotas = $request->mascotas;
        $cliente->user_id = $request->user_id;

        $cliente->save();

        return response()->json([
            'success' => true,
            'message' => 'El cliente ha sido actualizado',
            'data' => $cliente
        ]);
    }

    public function delete($documento)
    {
        $cliente = Cliente::where('numero_documento', $documento)->first();

        if(!$cliente){

            return response()->json([
                'success' => false,
                'message' => 'El cliente no existe'
            ], 404);

        }

        $factura = Factura::where('cliente_id', $cliente->id)->first();

        if(!$factura){

            $cliente->delete();

            return response()->json([
                'success' => true,
                'message' => 'El cliente ha sido eliminado'
            ]);

        }

        return response()->json([
            'success' => false,
            'message' => 'El cliente no se puede eliminar, ya que tiene una factura registrada'
        ], 404);       

        
    }

    public function infoSelect()
    {
        $profesiones = Profesion::get();
        $operadores = User::get();
        $tipoDocumentos = TipoDocumento::get();
        
        return response()->json([
            'success' => true,
            'profesiones' => $profesiones,
            'operadores' => $operadores,
            'tipoDocumentos' => $tipoDocumentos
        ], 200);
    }

    public function show($documento)
    {
        $cliente = Cliente::where('numero_documento', $documento)->first();

        if(!$cliente){
            return response()->json([
                'success' => false,
                'message' => 'El cliente no existe'
            ], 404);
        }

        $tipoDocumento = TipoDocumento::where('id', $cliente->tipo_documento_id)->first();
        $profesion = Profesion::where('id', $cliente->profesion_id)->first();

        $cliente->tipo_documento = $tipoDocumento->nombre_tipo_documento;
        $cliente->tipo_documento_id = $tipoDocumento->id;
        $cliente->profesion = $profesion->nombre_profesion;

        $dateFormat = new \DateTime($cliente->fecha_nacimiento);
        $cliente->fecha_nacimiento = $dateFormat->format('Y-m-d');
        $cliente->profesion_id = $profesion->id;

        if(!$cliente){
            return response()->json([
                'success' => false,
                'message' => 'El cliente no existe'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $cliente
        ]);
    }

}

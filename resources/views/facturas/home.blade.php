@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Clientes</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('store.factura') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="mb-3">
                            <label class="form-label">Tienda</label>
                            <select name="tienda_id" id="" class="form-control">
                                @foreach ($tiendas as $tienda)
                                    <option value="{{ $tienda->id }}">{{ $tienda->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cliente</label>
                            <select name="cliente_id" id="" class="form-control">
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Numero de la factura</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="numero_factura">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Foto factura</label>
                            <input type="file" class="form-control" id="exampleInputPassword1" name="foto_factura">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Campaña</label>
                            <input type="text" class="form-control" name="campaña">
                            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Valor</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="valor">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Fecha de caducidad</label>
                            <input type="date" class="form-control" id="exampleInputPassword1" name="fecha_caducidad">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

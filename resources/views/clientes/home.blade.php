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

                    <form action="{{ route('store.cliente') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"/>
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="nombre" class="form-control" name="nombre">
                            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="apellidos">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleInputPassword1" name="email">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Telefono</label>
                            <input type="text" class="form-control" name="telefono">
                            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">direccion</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="direccion">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="exampleInputPassword1" name="fecha_nacimiento">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Profesion</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="profesion">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Hijos</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" name="hijos">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mascotas</label>
                            <input type="checkbox" name="mascotas">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

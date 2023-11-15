@extends('layouts.app')

@section('content')
<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden vh-100">
    <div class="container_formulario_request">
        <div class="container_formulario_text">
            <div class="text_info">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    CRM para Centros Comerciales<br />
                    <span style="color: hsl(218, 81%, 75%)">Para Registrar tus Compras</span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                </p>
            </div>
    
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-10-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-8-strong"></div>

                <div class="card bg-glass custom-form" style="border-radius: 26px;">
                    <div class="card-body px-4 py-4 px-md-5">
                        <form onsubmit="return validarFormulario()" method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" id="email"
                                            class="form-control  @error('email') is-invalid @enderror"
                                            placeholder="Correo" name="email" value="{{ old('email') }}" required
                                            autocomplete="email" autofocus />
                                        <label class="form-label" for="form3Example3">Email address</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Contraseña" name="password" required
                                            autocomplete="current-password" />
                                        <label class="form-label" for="form3Example4">Password</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="containerbtnIniciar">
                                        <input type="submit" value="Iniciar">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    .background-radial-gradient {
        background-color: hsl(218, 41%, 15%);
        background-image: radial-gradient(650px circle at 0% 0%,
                hsl(218, 41%, 35%) 15%,
                hsl(218, 41%, 30%) 35%,
                hsl(218, 41%, 20%) 75%,
                hsl(218, 41%, 19%) 80%,
                transparent 100%),
            radial-gradient(1250px circle at 100% 100%,
                hsl(218, 41%, 45%) 15%,
                hsl(218, 41%, 30%) 35%,
                hsl(218, 41%, 20%) 75%,
                hsl(218, 41%, 19%) 80%,
                transparent 100%);
    }
    </style>
</section>
<!-- Section: Design Block -->
@endsection
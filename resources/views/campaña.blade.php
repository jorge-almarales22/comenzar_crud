<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="ccs/clientes.css">
    <title>CRM</title>

    <style>
    /* Estilos para el botón "Iniciar" */
    input[type="submit"] {
        background-color: #4CAF50;
        /* Color de fondo */
        color: white;
        /* Color del texto */
        padding: 10px 20px;
        /* Espaciado interno */
        border: none;
        /* Sin borde */
        border-radius: 5px;
        /* Bordes redondeados */
        cursor: pointer;
        /* Cambia el cursor al pasar sobre el botón */
        font-size: 16px;
        /* Tamaño de fuente */
    }

    /* Estilos adicionales cuando el cursor pasa sobre el botón */
    input[type="submit"]:hover {
        background-color: #45a049;
        /* Cambia el color de fondo al pasar sobre el botón */
    }

    .container_formulario_request {
        height: 100vh;
        width: 100vw;
        display: flex;
        padding-right: 20px;
        justify-content: center;
        align-items: center;
        background-color: hsl(218, 41%, 15%);
        overflow: hidden;
    }

    .container_formulario_text {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 80%;
        /* Puedes ajustar según tus necesidades */
    }

    .text_info {
        width: 50%;
        text-align: right;
        padding-right: 20px;
        /* Espaciado a la derecha para separar del formulario */
    }

    .containerbtnIniciar {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #radius-shape-1 {
        height: 220px;
        width: 220px;
        top: -60px;
        left: -10px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
    }

    #radius-shape-2 {
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
        bottom: -60px;
        right: -110px;
        width: 300px;
        height: 300px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
    }

    .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.9) !important;
        backdrop-filter: saturate(200%) blur(25px);
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="/">
                    <img src="/img/crm.jpeg" height="70" alt="CRM Logo" loading="lazy" style="border-radius: 50%;" />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-size: 1.25rem;">Registro Informacion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-size: 1.25rem;">Campaña y Fidelizacion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-size: 1.25rem;">Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-size: 1.25rem;">Generar Ticket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-size: 1.25rem;">Actualizar</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Icon -->
                <a class="text-reset me-3" href="#">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <!-- Avatar -->
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                        id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="/img/acceso.png" class="rounded-circle" height="50"
                            alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="#">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden vh-90">
        <div class="container_formulario_request">
            <div class="container_formulario_text">
                <div class="text_info">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        CRM para Centros Comerciales <br />
                        <span style="color: hsl(218, 81%, 75%)">Campañas</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-10-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-8-strong"></div>

                    <div class="card bg-glass custom-form" style="border-radius: 26px;">
                        <div class="card-body px-4 py-4 px-md-5">
                            <h1 style="text-align:center">Campañas</h1>
                            <form>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="campaña">
                                    <div class="form-outline mb-4">
                                        <select id="form3Example2" class="form-control" onchange="showInputField(this)">
                                            <option value="campañamoto">Campaña Moto</option>
                                            <option value="campañacarro">Campaña Carro</option>
                                            <option value="campañabicicleta">Campaña bicicleta</option>
                                        </select>
                                        <input type="text" id="campaña" class="form-control" style="display: none;" />
                                        <label class="form-label" for="labelvalorfactura">Campaña</label>

                                    </div>
                                </div>
                                <!--datos -->
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="date" id="form3Example1" class="form-control" />
                                            <label class="form-label" for="form3Example1">Fecha de inicio</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="date" id="form3Example1" class="form-control" />
                                            <label class="form-label" for="form3Example1">Fecha finalizacion</label>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="form3Example1" class="form-control"
                                                    placeholder="Activo,Inactivo,No existente" />
                                                <label class="form-label" for="form3Example1">Estado</label>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="valor">
                                    <!-- valor facutura input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="labelvalorticket">Valor ticket</label>
                                        <input type="number_format" id="inputvalorticket" class="form-control"
                                            placeholder="$ 150.000 " oninput="formatoMoneda()" />
                                    </div>
                                </div>
                                    <div class="containerbtnIniciar" >

                                        <a class="btn btn-primary " tabindex="-1"
                                            role="button">Validar</a>

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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
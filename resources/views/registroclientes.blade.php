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

    <script>
    function validarFormulario() {
        var email = document.getElementById('form3Example3').value;
        var password = document.getElementById('form3Example4').value;

        var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

        if (!email.match(emailPattern)) {
            alert('Por favor, introduce un correo electrónico válido.');
            return false;
        }

        if (!password.match(passwordPattern)) {
            alert(
                'La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula y un número.'
            );
            return false;
        }

        // Si las validaciones son exitosas, puedes realizar alguna acción adicional aquí.
        // Agrega la acción que deseas realizar después de la validación exitosa.
        console.log('Formulario enviado con éxito!');
    }
    </script>
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
                    <li class="nav-item" id="registroInformacion">
                        <a class="nav-link" href="#" style="font-size: 1.25rem;">Registro Informacion</a>
                        <!-- Submenu for Registro Informacion -->
                        <ul class="submenu">
                            <li><a class="nav-link" href="/registroclientes">Registro clientes</a></li>
                            <li><a class="nav-link" href="/factura">Registro Facturas</a></li>
                            <li><a class="nav-link" href="/campaña">Campañas</a></li>
                            <li><a class="nav-link" href="/">Tipos Documentos</a></li>
                            <li><a class="nav-link" href="/">Tipo Profesiones Profesiones</a></li>

                            <!-- Agrega más subitems según sea necesario -->
                        </ul>
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


    <!-- JavaScript para mostrar/ocultar el submenú al pasar el cursor -->
    <script>
    var registroInformacion = document.getElementById('registroInformacion');
    var submenu = registroInformacion.querySelector('.submenu');
    var timeout;

    registroInformacion.addEventListener('mouseenter', function() {
        clearTimeout(timeout);
        submenu.style.display = 'block';
    });

    registroInformacion.addEventListener('mouseleave', function() {
        timeout = setTimeout(function() {
            submenu.style.display = 'none';
        }, 200); // 2000 milliseconds = 2 seconds
    });

    submenu.addEventListener('mouseenter', function() {
        clearTimeout(timeout);
    });
    </script>

    <style>
    /* Estilo para ocultar el submenú por defecto */
    .submenu {
        display: none;
        position: absolute;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        z-index: 1;
        padding: 10px;
        margin-top: 10px;
    }

    .submenu a {
        color: #333;
        text-decoration: none;
        display: block;
        padding: 8px;
        transition: background-color 0.3s;
    }

    .submenu a:hover {
        background-color: #f8f9fa;
    }
    </style>

    <!-- Navbar -->

    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden vh-100">
        <div class="container_formulario_request">
            <div class="container_formulario_text">
                <div class="text_info">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        CRM para Centros Comerciales <br />
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
                            <h1 style="text-align:center">Registro Cliente</h1>
                            <form onsubmit="return validarFormulario()">
                                <form>

                                    <!--formulario-->
                                    <div class="row">
    <div class="col-md-6 mb-4">
        <div class="form-outline">
            <label class="form-label" for="form3Example2">Tipo de Documento</label>
            <select id="form3Example2" class="form-control" onchange="showInputField(this)">
                <option value="CC">Cédula de Ciudadanía</option>
                <option value="TI">Tarjeta de Identidad (T.I)</option>
                <option value="CE">Cédula de Extranjería (C.E)</option>
                <option value="Pasaporte">Pasaporte</option>
                <option value="Otro">Otro</option>
            </select>
            <input type="text" id="otro" class="form-control" style="display: none;" />
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="form-outline">
            <label class="form-label" for="numeroDocumento">Número de Documento</label>
            <input type="text" id="numeroDocumento" class="form-control" onkeypress="return validate(event)" placeholder="Número de documento" />
        </div>
    </div>

    <div class="col-md-12 mb-4">
    <!-- Botón de Consultar al inicio -->
    <button class="btn btn-primary" onclick="consultarBaseDeDatos()">Consultar</button>

    <!-- Botón de Eliminar en el medio -->
    <button class="btn btn-danger" onclick="eliminarCliente()">Eliminar</button>

    <!-- Botón de Modificar -->
    <button class="btn btn-success" id="btnModificar" onclick="modificarCliente()" disabled>Modificar</button>
</div>
</div>

<script>
    
    function consultarBaseDeDatos() {
        // Realiza la lógica de consulta aquí
        
        // Después de realizar la consulta, habilita el botón de Modificar
        document.getElementById("btnModificar").removeAttribute("disabled");
        

           function consultarBaseDeDatos() {
        // Aquí deberías realizar la lógica para consultar la base de datos
        // usando el tipo de documento y el número de documento seleccionados

        // Después de la consulta, habilitar el botón de Eliminar
        document.getElementById("btnEliminar").removeAttribute("disabled");
        // También puedes deshabilitar otros campos si es necesario
        document.getElementById('form3Example2').disabled = true;
        document.getElementById('numeroDocumento').disabled = true;
    }

    }

    function eliminarCliente() {
        // Lógica de eliminación del cliente
    }

    function modificarCliente() {
        // Lógica de modificación del cliente
    }

     function eliminarCliente() {
        // Obtener el número de documento del cliente
        var numeroDocumento = document.getElementById("numeroDocumento").value;

        // Aquí debes realizar la lógica para eliminar el cliente de la base de datos.
        // Puedes usar AJAX para enviar una solicitud al servidor y realizar la eliminación.

        // Por ejemplo:
        // var xhr = new XMLHttpRequest();
        // xhr.open("POST", "eliminar_cliente.php", true);
        // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // xhr.onreadystatechange = function () {
        //     if (xhr.readyState == 4 && xhr.status == 200) {
        //         // Manejar la respuesta del servidor, si es necesario.
        //         console.log(xhr.responseText);
        //     }
        // };
        // xhr.send("numeroDocumento=" + numeroDocumento);

        // Nota: Esto es solo un ejemplo, debes adaptarlo según tu entorno y lógica de eliminación.

        // Una vez que hayas eliminado el cliente, puedes realizar acciones adicionales, si es necesario.
        limpiarFormulario();
    }

    function limpiarFormulario() {
        // Limpiar los campos del formulario
        document.getElementById("form3Example2").value = "CC";
        document.getElementById("numeroDocumento").value = "";
        document.getElementById("otro").style.display = "none";
    }
    function showInputField(select) {
        var inputField = document.getElementById('otro');
        if (select.value === 'Otro') {
            inputField.style.display = 'block';
        } else {
            inputField.style.display = 'none';
        }
    }

    function consultarBaseDeDatos() {
        // Aquí deberías realizar la lógica para consultar la base de datos
        // usando el tipo de documento y el número de documento seleccionados

        // Después de la consulta, deshabilitar los campos
        document.getElementById('form3Example2').disabled = true;
        document.getElementById('numeroDocumento').disabled = true;
    }
</script>
                    <script>
                    function validate(evt) {
                        var theEvent = evt || window.event;

                        // Handle paste
                        if (theEvent.type === 'paste') {
                            key = event.clipboardData.getData('text/plain');
                        } else {
                            // Handle key press
                            var key = theEvent.keyCode || theEvent.which;
                            key = String.fromCharCode(key);
                        }
                        var regex = /[0-9\.]|\./;
                        if (!regex.test(key)) {
                            theEvent.returnValue = false;
                            if (theEvent.preventDefault) theEvent.preventDefault();
                        }
                    }
                    </script>

                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example1">Nombres</label>
                                <input type="text" id="form3Example1" class="form-control" placeholder="Juan" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example2">Apellidos</label>
                                <input type="text" id="form3Example2" class="form-control" placeholder="Zuluaga" />
                            </div>
                        </div>
                    </div>

                    <!--datos -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example1">Teléfono</label>
                                <input type="text" id="form3Example1" class="form-control" placeholder="# Celular" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example2">Dirección</label>
                            </div>
                            <input type="text" id="form3Example1" class="form-control" placeholder="Calle #" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example1">Fecha Nacimiento</label>
                                <input type="date" id="form3Example1" class="form-control" />

                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example2">Profesión</label>
                                <select id="form3Example2" class="form-control" onchange="showInputField(this)">
                                    <option value="Estudiante">Estudiante</option>
                                    <option value="Empleado">Empleado</option>
                                    <option value="Desempleado">Desempleado</option>
                                    <option value="Profesional">Profesional</option>
                                    <option value="Tecnico">Técnico</option>
                                    <option value="Otraprofesion">Otro</option>
                                </select>
                                <input type="text" id="otroprofesion" class="form-control" style="display: none;" />
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example1">Hijos</label>
                                <select id="form3Example1" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="0">Ninguno</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example2">Mascotas</label>
                                <input type="number" id="form3Example2" class="form-control" min="0" placeholder="0" />
                            </div>
                        </div>
                    </div>

                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Email</label>
                                <input type="email" id="form3Example3" class="form-control" placeholder="Correo" />

                            </div>
                            <!-- Email input -->
                            <div class="containerbtnIniciar" href="factura">

                                <a href="factura" class="btn btn-primary " tabindex="-1" role="button">Registrar</a>

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
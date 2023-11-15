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
                alert('La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula y un número.');
                return false;
            }

            // Si las validaciones son exitosas, puedes realizar alguna acción adicional aquí.
            // Agrega la acción que deseas realizar después de la validación exitosa.
            console.log('Formulario enviado con éxito!');
        }
    </script>
</head>

<body>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRM</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="ccs/clientes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="/public/css/style.css" />
    <title>CRM</title>
    <!-- Styles -->
    <style>
    body {
        /* Establecer la imagen de fondo */
        background-image: url('img/unicentro.jpg');

        /* Ajustar la imagen al tamaño de la ventana del navegador */
        background-size: cover;

        /* Centrar la imagen en el fondo */
        background-position: center;

        /* Fijar la imagen para que no se desplace con el contenido */
        background-attachment: fixed;

        /* Agregar un color de fondo en caso de que la imagen no se cargue o no cubra completamente la ventana */
        background-color: #f0f0f0;
    }

    /* Puedes agregar estilos adicionales para otros elementos en tu página aquí */
    h1 {
        color: white;
        /* Color del texto para que sea legible en la imagen de fondo */
    }

    .containerborde {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 85vh;
        text-shadow:
            3px 0px 0px black,
            0px 3px 0px black,
            -3px 0px 0px goldenrod,
            0px -3px 0px silver;

    }

    h1 {
        font-size: 80px;
    }
    </style>
</head>

<body class="antialiased">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-gray" style="background-color: #e3f2fd;">
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
            </div>
            </a>
            <!-- Avatar -->
            <div
                class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
                @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                    <a href="{{ url('/home') }}"
                        class="font-s
                            emibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>

                    @else
                    <a href="{{ route('login') }}"
                        style="display: inline-block; padding: 10px 20px; background-color: black; color: white; text-decoration: none; border-radius: 5px; transition: background-color 0.3s ease;"
                        onmouseover="this.style.backgroundColor='#333'"
                        onmouseout="this.style.backgroundColor='black'">Login</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        style="display: inline-block; padding: 10px 20px; background-color: black; color: white; text-decoration: none; border-radius: 5px; transition: background-color 0.3s ease;"
                        onmouseover="this.style.backgroundColor='#333'"
                        onmouseout="this.style.backgroundColor='black'">Register</a>

                    @endif
                    @endauth
                </div>
                @endif


            </div>
        </div>
        <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    </div>
</body>

<h1 class="containerborde">CRM Centro Comercial Unicentro</h1>


</body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


</html>
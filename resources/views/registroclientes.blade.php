<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('ccs/clientes.css')}} ">
    <title>CRM</title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="/">
        <img
          src="/img/crm.jpeg"
          height="70"
          alt="CRM Logo"
          loading="lazy"
          style="border-radius: 50%;"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-size: 1.25rem;">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-size: 1.25rem;">Información</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-size: 1.25rem;">Reportes</a>
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
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <img
            src="/img/acceso.png"
            class="rounded-circle"
            height="50"
            alt="Black and White Portrait of a Man"
            loading="lazy"
          />
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
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
<section class="background-radial-gradient overflow-hidden vh-100">
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

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
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

  <div class="container px-4 py-6 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Campaña Unicentro CRM <br />
          <span style="color: hsl(218, 81%, 75%)">Para tus compras</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          Te gustaria poder concursar en nuestro CRM campaña, por la compra de 50.000 en cualquiera de nuestras tiendas, estaras participando para adquirir grandes premios todo a tu suerte, si estas listo registrate aquí.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form>
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-12 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" placeholder="Juan Zuluaga" />
                    <label class="form-label" for="form3Example1">Nombre y apellidos</label>
                  </div>
                </div>
           
              </div>
              <!--datos -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" placeholder="# Celular" />
                    <label class="form-label" for="form3Example1">Teléfono</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <input type="text" id="form3Example1" class="form-control" placeholder="Calle #" />                    <label class="form-label" for="form3Example2">Dirección</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="date" id="form3Example1" class="form-control" />
                    <label class="form-label" for="form3Example1">Fecha Nacimiento</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <select id="form3Example2" class="form-control" onchange="showInputField(this)">
                <option value="Estudiante">Estudiante</option>
                <option value="Empleado">Empleado</option>
                <option value="Desempleado">Desempleado</option>
                <option value="Profesional">Profesional</option>
                <option value="Tecnico">Técnico</option>
                <option value="Otraprofesion">Otro</option>
            </select>
            <input type="text" id="otroprofesion" class="form-control" style="display: none;" />
            <label class="form-label" for="form3Example2">Profesión</label>
        </div>
    </div>
</div>
<script>
function showInputField(select) {
    var inputField = document.getElementById('otraprofesion');
    if (select.value === 'Otraprofesion') {
        inputField.style.display = 'block';
    } else {
        inputField.style.display = 'none';
    }
}
</script>

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <select id="form3Example1" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
                    <label class="form-label" for="form3Example1">Hijos</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <select id="form3Example2" class="form-control" onchange="showInputField(this)">
                <option value="Perro">Perro</option>
                <option value="Gato">Gato</option>
                <option value="Otro">Otro</option>
                <option value="Ninguno">Ninguno</option>
            </select>
            <input type="text" id="otroTipo" class="form-control" style="display: none;" />
            <label class="form-label" for="form3Example2">Mascotas</label>
        </div>
    </div>
</div>
<script>
function showInputField(select) {
    var inputField = document.getElementById('otroTipo');
    if (select.value === 'Otro') {
        inputField.style.display = 'block';
    } else {
        inputField.style.display = 'none';
    }
}
</script>


              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" placeholder="Correo" />
                <label class="form-label" for="form3Example3">Email address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control"placeholder="Contraseña" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>
              <input type="submit" value="Submit">
</form>

<script>
document.getElementById('myForm').addEventListener('submit', function(e) {
    e.preventDefault();

    var email = document.getElementById('email').value;
    var password = document.getElementById('pwd').value;

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

    this.sumit();
});
</script>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

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
          <a class="nav-link" href="#" style="font-size: 1.25rem;">Regitro de informacion </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="font-size: 1.25rem;">Campaña y fidelizacion</a>
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
           CRM PARA CENTRO COMERCIALES <br />
          <span style="color: hsl(218, 81%, 75%)">Para tus compras</span>
        </h1>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-4 px-md-5">
            <form>
            <label class="form-label" for="form3Example1">REGISTRAR FACUTURA</label>
            <div>
            <label class="form-label" for="form3Example1">consultar usuario por cedula</label>
            </div>


              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="d-flex justify-content-center">

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <button class="btn btn-outline-secondary" type="button">Consultar</button>
        </div>
        <input type="text" class="form-control" placeholder="cc.1457446852" aria-label="" aria-describedby="basic-addon1">
    </div>
</div>


              <div class="row">
                <div class="col-md-12 mb-4">
                  <div class="form-outline">
                  <label class="form-label" for="form3Example1">Nombre y apellidos</label>
                    <input type="text" id="form3Example1" class="form-control" placeholder="Juan Zuluaga" />

                  </div>
                </div>
              </div>
              <!--datos select-->
             <!--startrow-->
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
                  <input type="text" id="form3Example1" class="form-control" placeholder="Calle #" />
                  </div>
                  <!--endrow-->
                 </div>
             </div>

             <div class = "numero_de_factura">

            <!-- Email input -->
                <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example3">Numero factura</label>
                      <input type="number_format" id="form3Example3" class="form-control" placeholder="No° 09832" />
                </div>
             </div>

            <div class = "valor">
            <!-- valor facutura input -->
                <div class="form-outline mb-4">
                      <label class="form-label" for="labelvalorfactura">Valor factura</label>
                      <input type="number_format" id="inputvalorfactura" class="form-control" placeholder="$ 150.000 " oninput="formatoMoneda()" />
                </div>
             </div>
              <!--startrow-->
              <div class="row">
                 <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <label class="form-label" for="form3Example1">Fecha Caducidad</label>
                    <input type="date" id="form3Example1" class="form-control" />

                  </div>
                 </div>
                 <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <label class="form-label" for="form3Example2">Tienda</label>
                  <select id="form3Example2" class="form-control" onchange="showInputField(this)">
                  <option value="Koak">Koak</option>
                    <option value="exito">exito</option>
                      <option value="olimpica">olimpica</option>
                      <option value="carulla">carulla</option>
                      <option value="gym">gym</option>
                      <option value="Otratienda">Otro</option>
                  </select>
                   <input type="text" id="otroprofesion" class="form-control" style="display: none;" />
                <!--endrow-->
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


                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">


            <input type="text" id="otroTipo" class="form-control" style="display: none;" />

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
<script>
    function formatoMoneda() {
        // Obtener el valor ingresado
        let valorInput = document.getElementById('inputvalorfactura').value;

        // Verificar si el campo está vacío
        if (valorInput === "") {
            document.getElementById('inputvalorfactura').value = "$0";
            return;
        }

        // Eliminar cualquier caracter no numérico
        let valorNumerico = parseFloat(valorInput.replace(/[^\d]/g, ''));

        // Verificar si el valor numérico es NaN
        if (isNaN(valorNumerico)) {
            document.getElementById('inputvalorfactura').value = "$0";
        } else {
            // Formatear el valor como moneda colombiana (COP)
            let formatoMoneda = new Intl.NumberFormat('es-CO', {
                style: 'currency',
                currency: 'COP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(valorNumerico);

            // Asignar el valor formateado de nuevo al campo de entrada
            document.getElementById('inputvalorfactura').value = formatoMoneda;
        }
    }
</script>






                <!-- Submit button -->
              <input type="submit" value="Guardar" class="btn btn-primary" />
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

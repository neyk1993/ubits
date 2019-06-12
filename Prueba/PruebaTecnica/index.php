<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Prueba </div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action bg-light">Registros Medicos</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Tienda</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Servicios Medicos</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Spa</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <h1 class="mt-4">Prueba de Ingreso</h1>
        <!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Cliente</label>
  <div class="col-md-4">
        <select id="cliente" class="form-control">
          <option value="0">Seleccione</option>
        </select>
      </div>
    </div>
    <div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Mascota</label>
  <div class="col-md-4">
        <select id="mascota" class="form-control">
          <option value="0">Seleccione</option>
        </select>
</div>
    </div>
        
        <div id="formulario"></div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/procesa.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>

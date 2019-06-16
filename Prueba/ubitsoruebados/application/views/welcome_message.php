<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Bogota');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>css/simple-sidebar.css" rel="stylesheet">

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
        <div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Cliente</label>
  <div class="col-md-4">
        <select id="cliente" class="form-control">
        	<option value="0">Seleccione</option>
          <?php 
foreach ($listclientes->result() as $row){
        $id_cliente = $row->id_cliente;
        $nombre_cliente = $row->nombre_cliente;
        ?>
        <option value="<?=$id_cliente?>"><?=$nombre_cliente?></option>
        <?php
    }?>
        </select>
      </div>
    </div>


        <div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Mascota</label>
  <div class="col-md-4">
<select id="mascota" class="form-control">
</select>
 </div>
    </div>
<div id="citamascota">
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Descripcion Solicitud</label>
  <div class="col-md-4"> 
<textarea id="agregartextare" ></textarea>
</div>
</div>
<div id="resumenMascota" style="font-weight: bold;"></div>
<button class="btn btn-primary" id="guardardatos">Guardar</button>
</div>
<div id="agregarmascota" >
<h3>Crear Mascota</h3>	
		<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nombre Mascota</label>  
  <div class="col-md-4"><input type="text" id="nombremascotaform" class="form-control input-md" value=""></div></div>


  <div class="form-group">
  <label class="col-md-4 control-label" for="radios">Tamaño Mascota</label>
  <div class="col-md-4"> 

  	<?php 
foreach ($infotamanosmascota->result() as $row){
        $id_tamano = $row->id_tamano;
        $descripcion = $row->descripcion;
        ?>
<label class="radio-inline" for="tamano-<?=$id_tamano ?>">
          				<input type="radio" name="tamano" class="tamano" id="tamano-<?=$id_tamano ?>" value="<?=$id_tamano ?>">
          					<?=$descripcion?>
        				</label>
        <?php
    }
    ?>    				
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Tipo Mascota</label>
  <div class="col-md-4"><select id="tipomascota"  class="form-control">';

  	<?php 
foreach ($infotipomascota->result() as $row){
        $descripcion_mascota = $row->descripcion_mascota;
        $id_tipo_mascota = $row->id_tipo_mascota;
        ?>
<option value="<?=$id_tipo_mascota?>"><?=$descripcion_mascota ?></option>
        <?php
    }
    ?>
			</select>
			

</div>
</div>


<button class="btn btn-primary" onclick="guardarunamascota();">Guardar Mascota</button> 		


</div>
<hr>
	<h1>Historial de Ingresos</h1>
	
	<table class="table">
		<tr>
			<th>Nombre Cliente</th>
			<th>Nombre Mascota</th>
			<th>Motivo Ingreso</th>
			<th>Fecha Ingreso</th>
			<th>Ver Detalle</th>
			<th>Eliminar</th>
		</tr>
	<?php 
foreach ($info->result() as $row){
        $id = $row->id_ingreso;
        $nombre_cliente = $row->nombre_cliente;
        $nombre_mascota = $row->nombre_mascota;
        $descripcion_ingreso = $row->descripcion_ingreso;
        $fecha = $row->fecha;
        ?>
        <tr>
			<td><?=$nombre_cliente?></td>
			<td><?=$nombre_mascota?></td>
			<td><?=$descripcion_ingreso?></td>
			<td><?=$fecha?></td>
			<td>Ver Detalle</td>
			<td><button onclick="Eliminar(<?=$id?>)" class="btn btn-danger">Eliminar</button></td>
		</tr>
        <?php
    }
    ?>
</table>
	</div>
    </div>
        
        <div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>js/procesa.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>














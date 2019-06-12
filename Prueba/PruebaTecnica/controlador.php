<?php 
require_once('clases/Conectar.php');
$objdueno=new Trabajo();

if(isset($_GET['accion']) and $_GET['accion']!=""){
	switch ($_GET['accion']) {
		case 'mostrarDuenos':
			$dueños=$objdueno->mostrarDuenos();
			$duenos = "";
			for($i=0;$i<count($dueños);$i++)
			{
				$id= $dueños[$i]['id_cliente'];
				$nombre = $dueños[$i]['nombre_cliente'];
				$duenos.='<option value="'.$id.'">'.$nombre.'</option>';
			}
			echo $duenos;
			
			break;
			case 'Guardar':
			$datos = array("id" => $_POST['idmascota'],"mensaje"=>$_POST["nuevacita"]);
			$dueños=$objdueno->Crear($datos);
			echo $duenos;
			break;

			case 'Eliminar':
			$dueños=$objdueno->Eliminar($_POST['segui']);
			echo $duenos;
			
			break;
		case 'mostrarmascotas':
			$objmascota=$objdueno->mostrarMascotas($_POST['cliente']);
			$duenos = '<option value="0">Seleccione</option>';
			for($i=0;$i<count($objmascota);$i++)
			{
				$id= $objmascota[$i]['id_mascota'];
				$nombre = $objmascota[$i]['nombre_mascota'];
				$duenos.='<option value="'.$id.'">'.$nombre.'</option>';
			}
			echo $duenos;
			break;

			case 'cargarFormulario':
			$form = '<form id="formulariomascota">';
			$objmascota=$objdueno->mostrarMascotas($_POST['mascota']);
			for($i=0;$i<count($objmascota);$i++)
			{
				$id= $objmascota[$i]['id_mascota'];
				$iddueno= $objmascota[$i]['id_cliente'];
				$id_tipo_mascota= $objmascota[$i]['id_tipo_mascota'];
				$tamano= $objmascota[$i]['id_tamano'];
				$nombre = $objmascota[$i]['nombre_mascota'];
				$form.='<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nombre Mascota</label>  
  <div class="col-md-4"><input type="text" id="nombremascota" class="form-control input-md" value="'.$nombre.'"></div></div>';
			}
			$tipomascotas=$objdueno->mostrarTipoMascota();
			$tamanomascota=$objdueno->mostrartamanoMascota();
			$historial=$objdueno->historial($_POST['mascota']);
			$dueños=$objdueno->mostrarDuenos();

			for($i=0;$i<count($dueños);$i++)
			{
				$idcliente= $dueños[$i]['id_cliente'];
				$nombrecliente = $dueños[$i]['nombre_cliente'];
				if($iddueno==$idcliente){
					$form.='<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nombre Cliente</label>  
  <div class="col-md-4"><input type="text" id="nombrecliente" value="'.$nombrecliente.'" class="form-control input-md"></div></div>';
				}
			}

			$form.='<div class="form-group">
  <label class="col-md-4 control-label" for="radios">Inline Radios</label>
  <div class="col-md-4"> ';
			for($i=0;$i<count($tamanomascota);$i++)
			{
				$id_tamano= $tamanomascota[$i]['id_tamano'];
				$descripciontamano = $tamanomascota[$i]['descripcion'];
				$fun = "";
				if($tamano==$id_tamano){
					$fun="checked";
				}
				$form.='<label class="radio-inline" for="tamano-'.$i.'">
          				<input type="radio" name="tamano" class="tamano" id="tamano-'.$i.'" value="'.$id_tamano.'" '.$fun.'>
          			'.$descripciontamano.'
        				</label>';
			}
			$form.='</div>
</div><div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Tipo Mascota</label>
  <div class="col-md-4"><select id="tipomascota"  class="form-control">';
			for($i=0;$i<count($tipomascotas);$i++)
			{

				$id_tipomascota= $tipomascotas[$i]['id_tipo_mascota'];
				$descripciontipo = $tipomascotas[$i]['descripcion_mascota'];
				$fun = "";
				if($tamano==$id_tamano){
					$fun="selected";
				}
				$form.='<option value="'.$id_tipomascota.'" '.$fun.'>'.$descripciontipo.'</option>';
			}
			$form.='</select></div></div>';

			$form .= '<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Descripcion Solicitud</label>
  <div class="col-md-4">  <textarea id="registronuevo"></textarea> </div>
</div>';
			$form .= '<button onclick="guardar()" class="btn btn-primary">Agregar Cita</button>';
			$form .= '</form>';

			$form .= '<hr><table class="table"><tr><th>ID</th><th>Descripcion</th><th>Fecha</th><th>acciones</th></tr>';
			for($i=0;$i<count($historial);$i++)
			{

				$descripcion_ingreso= $historial[$i]['descripcion_ingreso'];
				$fecha = $historial[$i]['fecha'];
				$id_ingreso = $historial[$i]['id_ingreso'];
				$fun = "";
				if($tamano==$id_tamano){
					$fun="selected";
				}
				$form .= '<tr><td>'.$id_ingreso.'</td><td>'.$descripcion_ingreso.'</td><td>'.$fecha.'</td><td><button onclick="eliminar('.$id_ingreso.')" class="btn btn-danger">Eliminar</button></td></tr>';
			}
			echo $form;
			break;
		
		default:
			# code...
			break;
	}
}

?>
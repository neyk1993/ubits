<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->model("Mascotas_model");
		$datos['listclientes']= $this->Mascotas_model->obtener_clientes();
 		$datos['info']= $this->Mascotas_model->obtener_todos();
 		$datos['infotipomascota']= $this->Mascotas_model->obtener_todos_tipos();
 		$datos['infotamanosmascota']= $this->Mascotas_model->obtener_todos_tamanos();
 		$this->load->view('welcome_message', $datos);

	}

	public function mostrarMascotas (){
		$this->load->model("Mascotas_model");
		$datos =$this->Mascotas_model->obtener_mascota($_POST['cliente']);
		$info = "<option value='0'>Seleccione</option>";
		foreach ($datos->result() as $row){
        $id_mascota = $row->id_mascota;
        $nombre_mascota = $row->nombre_mascota;
       	$info .='<option value="'.$id_mascota.'">'.$nombre_mascota.'</option>';
       	
 
        }
        $info .= "<option value='0000'>--Crear Mascotas--</option>";
		echo $info;
	}

	public function MostrarResumenMascota(){
		$idmascota = $_POST["mascota"];
		$this->load->model("Mascotas_model");
		$datos = $this->Mascotas_model->obtenerInformacionMascota($idmascota);
		foreach ($datos->result() as $row){
        $descripcion = $row->descripcion;
        $descripcion_mascota = $row->descripcion_mascota;
        $nombre_mascota = $row->nombre_mascota;
       	$info ="-------Es un {$descripcion_mascota} De tamaño {$descripcion}----";
 
        }
        echo $info;
	}

	public function guardarIngreso(){
		$this->load->model("Mascotas_model");
		$id = $_POST['idmascota'];
		$descr = $_POST['nuevacita'];

		$data = array(
         'id_mascota' => $id,
         'descripcion_ingreso' => $descr,
         'fecha' => '2019-06-15'
      );
		$this->Mascotas_model->guardar($data);

		return true;
	}

	public function guardarMascota(){
		$this->load->model("Mascotas_model");
		$tipomascota = $_POST['tipomascota'];
		$selectedci = $_POST['selectedci'];
		$nombremascotaform = $_POST['nombremascotaform'];
		$idcliente = $_POST['idcliente'];

		$data = array(
         'id_cliente' => $idcliente,
         'nombre_mascota' => $nombremascotaform,
         'id_tamano' => $selectedci,
         'id_tipo_mascota' => $tipomascota,
      );
		$this->Mascotas_model->guardarMascota($data);

		return true;
	}

	public function Eliminar(){
		$this->load->model("Mascotas_model");
		$id = $_POST['id'];
		$this->Mascotas_model->eliminar($id);

		return true;
	}


	
}

<?php
class Mascotas_model extends CI_Model { 
	  public function __construct() {
      parent::__construct();
   }
   public function guardar($datos, $id=null){
      
      if($id){
         $this->db->where('id_ingreso', $id);
         $this->db->update('ingresos', $datos);
      }else{
         $this->db->insert('ingresos', $datos);
      } 
   }

   public function guardarMascota($datos, $id=null){
      
      if($id){
         $this->db->where('id_mascota', $id);
         $this->db->update('mascota', $datos);
      }else{
         $this->db->insert('mascota', $datos);
      } 
   }
   public function eliminar($id){
      $this->db->where('id_ingreso', $id);
      $this->db->delete('ingresos');
   }
   public function obtenerInformacionMascota($id){
      $sql = "SELECT nombre_mascota, descripcion,descripcion_mascota FROM detallemascota where id_mascota = {$id}";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
        return $query;
      }
   }
   public function obtener_todos(){

   	 $sql = "SELECT nombre_cliente, nombre_mascota,id_ingreso,descripcion_ingreso,fecha FROM informe_ingresos";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
        return $query;
      }
   }

   public function obtener_todos_tipos(){

   	 $sql = "SELECT id_tipo_mascota, descripcion_mascota FROM tipo_mascota";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
        return $query;
      }
   }

   public function obtener_todos_tamanos(){

   	 $sql = "SELECT id_tamano, descripcion FROM tamanos";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
        return $query;
      }
   }

   public function obtener_clientes($id=null){

   	if($id!=null){
   	 	$sql.=" AND id_cliente={$id}";
   	 }
   	 $sql = "SELECT id_cliente,nombre_cliente FROM clientes";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
        return $query;
      }
   }

   public function obtener_mascota($cliente=null,$id=null){

   	 $sql = "SELECT id_mascota,nombre_mascota FROM mascota where 1=1 ";

   	 if($cliente!=null){
   	 	$sql.=" AND id_cliente={$cliente}";
   	 }

   	 if($id!=null){
   	 	$sql.=" AND id_mascota={$id}";
   	 }
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
        return $query;
      }
   }



}
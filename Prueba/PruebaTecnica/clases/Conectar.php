<?php
session_start();
class Conectar
{
	public static function con()
	{
		$con=mysql_connect("localhost","root","rootroot");
		mysql_query("SET NAMES 'utf8'");
		//mysql_query("SET NAMES 'utf8'");
		mysql_select_db("pruebaubits");
		return $con;
	}

	
}

class Trabajo
{
	private $mascota=array();
	private $tipomasco=array();
	private $duenos=array();
	private $tamano=array();
	private $historial=array();
	

	public function mostrarDuenos()
	{
		$sql="select * from clientes";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->duenos[]=$reg;
		}
			return $this->duenos;
	}

	public function mostrarMascotas($id)
	{
		$sql="select * from mascota where id_cliente= {$id}";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->mascota[]=$reg;
		}
			return $this->mascota;
	}

	public function mostrarTipoMascota()
	{
		$sql="select * from tipo_mascota";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->tipomasco[]=$reg;
		}
			return $this->tipomasco;
	}

	public function mostrartamanoMascota()
	{
		$sql="select * from tamanos";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->tamano[]=$reg;
		}
			return $this->tamano;
	}

	public function historial($id)
	{
		$sql="select * from ingresos where id_mascota= {$id}";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->historial[]=$reg;
		}
			return $this->historial;
	}

	public function Eliminar($id)
	{
		$sql="delete from ingresos where id_ingreso= {$id}";
		$res=mysql_query($sql,Conectar::con());
		return true;
	}

	public function Crear($datos)
	{

		$id = $datos['id'];
		$mensaje = $datos['mensaje'];
		$sql="insert into ingresos(descripcion_ingreso,id_mascota,fecha) values ('{$mensaje}',{$id},now())";
		$res=mysql_query($sql,Conectar::con());
		return $sql;
	}
	public function mostrarInformacionMascota($id)
	{
		$sql="select * from mascota where id_cliente= {$id}";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->mascota[]=$reg;
		}
			return $this->mascota;
	}

	public function saluda_al_usuario()
	{
		 return "HOLA";
	}
	
}
?>
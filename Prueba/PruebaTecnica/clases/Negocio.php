<?php
require_once('Conectar.php');
$cone =new Conectar();
$con = $cone->con();
Class Negocio 
{
	
	//***************************************************
	//Función para obtener el nombre del usuario logueado
	public function saluda_al_usuario($id_usuario)
	{
		$sql="select nombre from usuarios where id_usuario=$id_usuario";
		$res=mysqli_query($sql,Conectar::con());
		while ($reg=mysqli_fetch_assoc($res))
		{
			$this->nombre[]=$reg;
		}
			return $this->nombre;
	}
}
?>
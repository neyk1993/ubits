<?php
Class persona{

	private $_fechaNacimiento;
    private $_direccion;

	public function __construct()
	{
    	$this->_fechaNacimiento = "21 de Septiembre de 1990";
    	$this->_direccion = "calle condell 500";
	}
	public function getFechaNacimiento()
    {
        return $this->_fechaNacimiento;
    }

    public function getDireccion()
    {
        return $this->_direccion;
    }

    public function setDireccion($direccion)
    {
        $this->_direccion = $direccion;
    }
    public function setFechaNacimiento($fecha)
    {
        $this->_direccion = $direccion;
    }


}

?>
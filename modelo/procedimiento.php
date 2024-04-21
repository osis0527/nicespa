<?php
class procedimiento
{
	private $Codigo;
	private $Nombre;

	
	public function setCodigo($Codigo)
	{
		$this->Codigo=$Codigo;
	}
	public function getCodigo()
	{
		return ($this->Codigo);
	}
	

	public function setNombre($Nombre)
	{
		$this->Nombre=$Nombre;
	}
	public function getNombre()
	{
		return ($this->Nombre);
	}
	

	public function procedimiento()
	{
		
	}
	

	public function datosProcedimiento($Codigo,$Nombre)
	{
		$this->Codigo=$Codigo;
		$this->Nombre=$Nombre;
	}
	

	public function crearProcedimiento()
	{	
		$this->Conexion=conectarse();
		$sql="INSERT INTO PROCEDIMIENTO (Cod_Pro,Nom_Pro)
			  VALUES ('$this->Codigo','$this->Nombre')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function actualizarProcedimiento()
	{	
		$this->Conexion=conectarse();
		$sql="UPDATE PROCEDIMIENTO SET Cod_Pro='$this->Codigo',Nom_Pro='$this->Nombre' WHERE Cod_Pro = '$_REQUEST[Codigo]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function borrarProcedimiento()
	{	
		$this->Conexion=conectarse();
		$sql="DELETE FROM PROCEDIMIENTO WHERE Cod_Pro = '$_REQUEST[Codigo]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
	

	public function consultarProcedimientos()
	{
		$this->Conexion=conectarse();
		$sql="SELECT * FROM PROCEDIMIENTO";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function consultarProcedimiento($id)
	{
		$this->Conexion=Conectarse();
		$sql="SELECT * FROM PROCEDIMIENTO WHERE Cod_Pro='$id'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

}

?>
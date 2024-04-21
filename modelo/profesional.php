<?php
class profesional
{
	private $CodigoProfesional;
	private $NombreProfesional;
	private $ApellidoProfesional;
	private $TipoProfesional;
	private $EstadoProfesional;

	
	public function setCodigoProfesional($CodigoProfesional)
	{
		$this->CodigoProfesional=$CodigoProfesional;
	}
	public function getCodigoProfesional()
	{
		return ($this->CodigoProfesional);
	}


	public function setNombreProfesional($NombreProfesional)
	{
		$this->NombreProfesional=$NombreProfesional;
	}
	public function getNombreProfesional()
	{
		return ($this->NombreProfesional);
	}


	public function setApellidoProfesional($ApellidoProfesional)
	{
		$this->ApellidoProfesional=$ApellidoProfesional;
	}
	public function getApellidoProfesional()
	{
		return ($this->ApellidoProfesional);
	}


	public function setTipoProfesional($TipoProfesional)
	{
		$this->TipoProfesional=$TipoProfesional;
	}
	public function getTipoProfesional()
	{
		return ($this->TipoProfesional);
	}


	public function setEstadoProfesional($EstadoProfesional)
	{
		$this->EstadoProfesional=$EstadoProfesional;
	}
	public function getEstadoProfesional()
	{
		return ($this->EstadoProfesional);
	}
	

	public function profesional()
	{
		
	}


	public function datosProfesional($CodigoProfesional,$NombreProfesional,$ApellidoProfesional,$TipoProfesional)
	{
		$this->CodigoProfesional=$CodigoProfesional;
		$this->NombreProfesional=$NombreProfesional;
		$this->ApellidoProfesional=$ApellidoProfesional;
		$this->TipoProfesional=$TipoProfesional;

	}


	public function datosProfesionalM($CodigoProfesional,$NombreProfesional,$ApellidoProfesional,$TipoProfesional,$EstadoProfesional)
	{
		$this->CodigoProfesional=$CodigoProfesional;
		$this->NombreProfesional=$NombreProfesional;
		$this->ApellidoProfesional=$ApellidoProfesional;
		$this->TipoProfesional=$TipoProfesional;
		$this->EstadoProfesional=$EstadoProfesional;

	}


	public function crearProfesional()
	{	
		$this->Conexion=conectarse();
		$sql="INSERT INTO USUARIOS (CODIGO,NOMBRE,APELLIDO,TIPO,ESTADO)
			  VALUES ('$this->CodigoProfesional','$this->NombreProfesional','$this->ApellidoProfesional','$this->TipoProfesional','ACTIVO')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function actualizarProfesional()
	{	
		$this->Conexion=conectarse();
		$sql="UPDATE USUARIOS SET CODIGO ='$this->CodigoProfesional', NOMBRE ='$this->NombreProfesional', APELLIDO ='$this->ApellidoProfesional', TIPO ='$this->TipoProfesional', ESTADO ='$this->EstadoProfesional' WHERE CODIGO = '$_REQUEST[Cod_Prf]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function consultarProfesional()
	{
		$this->Conexion=conectarse();
		$sql="SELECT *, concat(nombre,' ',apellido) profesional FROM USUARIOS";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function consultarProfesionalId($id)
	{
		$this->Conexion=conectarse();
		$sql="SELECT *, concat(nombre,' ',apellido) profesional FROM USUARIOS WHERE CODIGO = '$id'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


}

?>
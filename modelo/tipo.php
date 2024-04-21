<?php
class tipo
{
	private $DescripcionT;
	
	public function setDescripcionT($DescripcionT)
	{
		$this->DescripcionT=$DescripcionT;
	}
	public function getDescripcionT()
	{
		return ($this->DescripcionT);
	}
	

	public function tipo()
	{
		
	}
	

	public function datosTipo($DescripcionT)
	{
		$this->DescripcionT=$DescripcionT;
	}
	

	public function crearTipo()
	{	
		$this->Conexion=conectarse();
		$sql="INSERT INTO TIPO_PLAN (Tip_Nom)
			  VALUES ('$this->DescripcionT')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function actualizarTipo()
	{	
		$this->Conexion=conectarse();
		$sql="UPDATE TIPO_PLAN SET Tip_Nom ='$this->DescripcionT' WHERE Tip_Pro = '$_REQUEST[Tip_Pro]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function borrarTipo()
	{	
		$this->Conexion=conectarse();
		$sql="DELETE FROM TIPO_PLAN WHERE Tip_Pro = '$_REQUEST[Tip_Pro]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function consultarTipo()
	{
		$this->Conexion=conectarse();
		$sql="SELECT * FROM TIPO_PLAN";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

}

?>
<?php
class tipoPrf
{
	private $DescripcionTPrf;
	
	public function setDescripcionTPrf($DescripcionTPrf)
	{
		$this->DescripcionTPrf=$DescripcionTPrf;
	}
	public function getDescripcionTPrf()
	{
		return ($this->DescripcionTPrf);
	}
	

	public function tipoPrf()
	{
		
	}
	

	public function datosTipoPrf($DescripcionTPrf)
	{
		$this->DescripcionTPrf=$DescripcionTPrf;
	}


	public function crearTipoPrf()
	{	
		$this->Conexion=conectarse();
		$sql="INSERT INTO TIPO_PRF (Prf_Nom)
			  VALUES ('$this->DescripcionTPrf')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function actualizarTipoPrf()
	{	
		$this->Conexion=conectarse();
		$sql="UPDATE TIPO_Prf SET Prf_Nom ='$this->DescripcionTPrf' WHERE Prf_Cod = '$_REQUEST[Prf_Cod]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function borrarTipoPrf()
	{	
		$this->Conexion=conectarse();
		$sql="DELETE FROM TIPO_PRF WHERE Prf_Cod = '$_REQUEST[Prf_Cod]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function consultarTipoPrf()
	{
		$this->Conexion=conectarse();
		$sql="SELECT * FROM TIPO_PRF";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

}

?>
<?php
class plan
{
	private $DescripcionP;
	private $TipoP;
	private $Sesion;

	
	public function setDescripcionP($DescripcionP)
	{
		$this->DescripcionP=$DescripcionP;
	}
	public function getDescripcionP()
	{
		return ($this->DescripcionP);
	}


	public function setTipoPTipoP($TipoP)
	{
		$this->TipoP=$TipoP;
	}
	public function getTipoP()
	{
		return ($this->TipoP);
	}


	public function setSesion($Sesion)
	{
		$this->Sesion=$Sesion;
	}
	public function getSesion()
	{
		return ($this->Sesion);
	}
	

	public function plan()
	{
		
	}


	public function datosPlan($DescripcionP,$TipoP,$Sesion)
	{
		$this->DescripcionP=$DescripcionP;
		$this->TipoP=$TipoP;
		$this->Sesion=$Sesion;
	}


	public function crearPlan()
	{	
		$this->Conexion=conectarse();
		$sql="INSERT INTO PLAN_1 (Nom_Pla,Tip_Pro,Cnt_Ses)
			  VALUES ('$this->DescripcionP','$this->TipoP','$this->Sesion')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function actualizarPlan()
	{	
		$this->Conexion=conectarse();
		$sql="UPDATE PLAN_1 SET Nom_Pla ='$this->DescripcionP', Tip_Pro ='$this->TipoP', Cnt_Ses ='$this->Sesion' WHERE Id_Pla = '$_REQUEST[Id_Pla]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function borrarPlan()
	{	
		$this->Conexion=conectarse();
		$sql="DELETE FROM PLAN_1 WHERE Id_Pla = '$_REQUEST[Id_Pla]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function consultarPlan()
	{
		$this->Conexion=conectarse();
		$sql="SELECT P.*, T.Tip_Nom FROM plan_1 P LEFT JOIN tipo_plan T on (T.Tip_Pro = P.Tip_Pro)";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

}

?>
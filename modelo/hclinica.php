<?php
class clinica
{
	private $Aten_cita;
	private $Peso;
	private $Altura;
	private $IMC;
	private $Ante_Per;
	private $Ante_Fam;
	private $Obse_Cita;

	
	public function setAten_cita($Aten_cita)
	{
		$this->Aten_cita=$Aten_cita;
	}
	public function getAten_cita()
	{
		return ($this->Aten_cita);
	}


	public function setPeso($Peso)
	{
		$this->Peso=$Peso;
	}
	public function getPeso()
	{
		return ($this->Peso);
	}


	public function setAltura($Altura)
	{
		$this->Altura=$Altura;
	}
	public function getAltura()
	{
		return ($this->Altura);
	}
	

	public function setIMC($IMC)
	{
		$this->IMC=$IMC;
	}
	public function getIMC()
	{
		return ($this->IMC);
	}


	public function setAnte_Per($Ante_Per)
	{
		$this->Ante_Per=$Ante_Per;
	}
	public function getAnte_Per()
	{
		return ($this->Ante_Per);
	}


	public function setAnte_Fam($Ante_Fam)
	{
		$this->Ante_Fam=$Ante_Fam;
	}
	public function getAnte_Fam()
	{
		return ($this->Ante_Fam);
	}


	public function setObse_Cita($Obse_Cita)
	{
		$this->Obse_Cita=$Obse_Cita;
	}
	public function getObse_Cita()
	{
		return ($this->Obse_Cita);
	}


	public function clinica()
	{
		
	}




	public function datosClinica($Aten_cita,$Peso,$Altura,$IMC,$Ante_Per,$Ante_Fam,$Obse_Cita)
	{
		$this->Aten_cita=$Aten_cita;
		$this->Peso=$Peso;
		$this->Altura=$Altura;
		$this->IMC=$IMC;
		$this->Ante_Per=$Ante_Per;
		$this->Ante_Fam=$Ante_Fam;
		$this->Obse_Cita=$Obse_Cita;
	}


	public function crearFolio()
	{	
		$this->Conexion=conectarse();
		$sql="INSERT INTO clinica (Id_Pac,Id_Fol,Num_Cit,HC_Desc,HC_Peso,HC_Alt,HC_IMC,HC_Ant,HC_Fam,HC_Obs)
			  VALUES ('$_REQUEST[Id_Pac]','$_REQUEST[Folio]','$_REQUEST[Cita]','$this->Aten_cita','$this->Peso','$this->Altura','$this->IMC','$this->Ante_Per','$this->Ante_Fam','$this->Obse_Cita')";
		//$act="UPDATE CITA SET Cit_Esta='Atendida' WHERE Num_Cit = '$_REQUEST[Num_Cit]'";
		$resultado=$this->Conexion->query($sql);
		//$resultado1=$this->Conexion->exec($act);
		$this->Conexion->close();
		return $resultado;	
	}


	public function consultarFolio($id)
	{	
		$this->Conexion=conectarse();
		$sql="SELECT COUNT(*) CONTEO FROM clinica WHERE id_Pac = '$id'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function atenderCita()
	{	
		$this->Conexion=conectarse();
		$sql="UPDATE CITA SET Cit_Esta='Atendida' WHERE Num_Cit = '$_REQUEST[Num_Cit]'";
		$citas=$this->Conexion->query($sql);
		$this->Conexion->close();
	}
}
?>
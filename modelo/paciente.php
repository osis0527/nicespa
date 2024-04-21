<?php
class paciente
{
	private $TipDocumento;
	private $Documento;
	private $Nombres;
	private $Apellidos;
	private $FechaNac;
	private $Sexo;
	private $EstaCivil;
	private $Dirección;
	private $Barrio;
	private $Tele;
	private $Celu;
	private $Mail;
	private $Conexion;

	
	public function setTipDocumento($TipDocumento)
	{
		$this->TipDocumento=$TipDocumento;
	}
	public function getTipDocumento()
	{
		return ($this->TipDocumento);
	}
	

	public function setDocumento($Documento)
	{
		$this->Documento=$Documento;
	}
	public function getDocumento()
	{
		return ($this->Documento);
	}
	

	public function setNombres($Nombres)
	{
		$this->Nombres=$Nombres;
	}
	public function getNombres()
	{
		return ($this->Nombres);
	}
	

	public function setApellidos($Apellidos)
	{
		$this->Apellidos=$Apellidos;
	}
	public function getApellidos()
	{
		return ($this->Apellidos);
	}
	

	public function setFechaNac($FechaNac)
	{
		$this->FechaNac=$FechaNac;
	}
	public function getFechaNac()
	{
		return ($this->FechaNac);
	}


	public function setSexo($Sexo)
	{
		$this->Sexo=$Sexo;
	}
	public function getSexo()
	{
		return ($this->Sexo);
	}
	

	public function setEstaCivil($EstaCivil)
	{
		$this->EstaCivil=$EstaCivil;
	}
	public function getEstaCivil()
	{
		return ($this->EstaCivil);
	}
	

	public function setDirección($Direccion)
	{
		$this->Direccion=$Direccion;
	}
	public function getDireccion()
	{
		return ($this->Direccion);
	}
	

	public function setBarrio($Barrio)
	{
		$this->Barrio=$Barrio;
	}
	public function getBarrio()
	{
	return ($this->Barrio);
	}
	

	public function setTele($Tele)
	{
		$this->Tele=$Tele;
	}
	public function getTele()
	{
		return ($this->Tele);
	}


	public function setCelu($Celu)
	{
		$this->Celu=$Celu;
	}
	public function getCelu()
	{
		return ($this->Celu);
	}


	public function setMail($Mail)
	{
		$this->Mail=$Mail;
	}
	public function getMail()
	{
		return ($this->Mail);
	}

	
	public function paciente()
	{
		
	}
	

	public function datosPaciente($TipDocumento,$Documento,$Nombres,$Apellidos,$FechaNac,$Sexo,$EstaCivil,$Direccion,$Barrio,$Tele,$Celu,$Mail)
	{
		$this->TipDocumento=$TipDocumento;
		$this->Documento=$Documento;
		$this->Nombres=$Nombres;
		$this->Apellidos=$Apellidos;
		$this->FechaNac=$FechaNac;
		$this->Sexo=$Sexo;
		$this->EstaCivil=$EstaCivil;
		$this->Direccion=$Direccion;
		$this->Barrio=$Barrio;
		$this->Tele=$Tele;
		$this->Celu=$Celu;
		$this->Mail=$Mail;		
	}
	

	public function crearPaciente()
	{	
		$this->Conexion=conectarse();
		$sql="INSERT INTO PACIENTES (Tip_Doc,Nro_Doc,Nom_Pac,Ape_Pac,Nac_Pac,Sex_Pac,Civ_Pac,Dir_Pac,Bar_Pac,Tel_Pac,Cel_Pac,Mai_Pac)
			  VALUES ('$this->TipDocumento','$this->Documento','$this->Nombres','$this->Apellidos','$this->FechaNac','$this->Sexo','$this->EstaCivil','$this->Direccion','$this->Barrio','$this->Tele','$this->Celu','$this->Mail')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function actualizarPaciente()
	{	
		$this->Conexion=conectarse();
		$sql="UPDATE PACIENTES SET Tip_Doc='$this->TipDocumento',Nro_Doc='$this->Documento',Nom_Pac='$this->Nombres',Ape_Pac='$this->Apellidos',Nac_Pac='$this->FechaNac',Sex_Pac='$this->Sexo',Civ_Pac='$this->EstaCivil',Dir_Pac='$this->Direccion',Bar_Pac='$this->Barrio',Tel_Pac='$this->Tele',Cel_Pac='$this->Celu',Mai_Pac='$this->Mail' WHERE Id_Pac = '$_REQUEST[Id_Pac]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function borrarPaciente()
	{	
		$this->Conexion=conectarse();
		$sql="DELETE FROM PACIENTES WHERE Id_Pac = '$_REQUEST[Id_Pac]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
	

	public function consultarPacientes()
	{
		$this->Conexion=conectarse();
		$sql="SELECT * FROM PACIENTES";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function consultarPaciente($id)
	{
		$this->Conexion=Conectarse();
		$sql="SELECT * FROM PACIENTES WHERE Id_Pac='$id'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
}

?>
<?php
class citas
{
	private $Paciente;
	private $Fec_cita;
	private $Hora_Cita;
	private $Plan;
	private $Plan_Proc;
	private $Profesional;
	private $Estado;
	private $Observacion;


	
	public function setPaciente($Paciente)
	{
		$this->Paciente=$Paciente;
	}
	public function getPaciente()
	{
		return ($this->Paciente);
	}
	

	public function setFec_cita($Fec_cita)
	{
		$this->Fec_cita=$Fec_cita;
	}
	public function getFec_cita()
	{
		return ($this->Fec_cita);
	}
	

	public function setHora_Cita($Hora_Cita)
	{
		$this->Hora_Cita=$Hora_Cita;
	}
	public function getHora_Cita()
	{
		return ($this->Hora_Cita);
	}
	

	public function setPlan($Plan)
	{
		$this->Plan=$Plan;
	}
	public function getPlan()
	{
		return ($this->Plan);
	}
	

	public function setPlan_Proc($Plan_Proc)
	{
		$this->Plan_Proc=$Plan_Proc;
	}
	public function getPlan_Proc()
	{
		return ($this->Plan_Proc);
	}


	public function setProfesional($Profesional)
	{
		$this->Profesional=$Profesional;
	}
	public function getProfesional()
	{
		return ($this->Profesional);
	}
	

	public function setEstado($Estado)
	{
		$this->Estado=$Estado;
	}
	public function getEstado()
	{
		return ($this->Estado);
	}


	public function setObservacion($Observacion)
	{
		$this->Observacion=$Observacion;
	}
	public function getObservacion()
	{
		return ($this->Observacion);
	}



	public function citas()
	{
		
	}
	

	public function datosCita($Paciente,$Fec_cita,$Hora_Cita,$Plan,$Plan_Proc,$Profesional)
	{
		$this->Paciente=$Paciente;
		$this->Fec_cita=$Fec_cita;
		$this->Hora_Cita=$Hora_Cita;
		$this->Plan=$Plan;
		$this->Plan_Proc=$Plan_Proc;
		$this->Profesional=$Profesional;	
	}

	public function datosCancela($Observacion)
	{
		$this->Observacion=$Observacion;
	}
	

	public function crearCita()
	{	
		$this->Conexion=conectarse();
		$sql="INSERT INTO CITA (Id_Pac,Fec_Cit,Hor_Cit,Id_Pla,Cod_Pro,Cod_Prf,Cit_Esta)
			  VALUES ('$this->Paciente','$this->Fec_cita','$this->Hora_Cita','$this->Plan','$this->Plan_Proc','$this->Profesional','Reservada')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function actualizarCita()
	{	
		$this->Conexion=conectarse();
		$sql="UPDATE CITA SET Id_Pac='$this->Paciente',Fec_Cit='$this->Fec_cita',Hor_Cit='$this->Hora_Cita',Id_Pla='$this->Plan',Cod_Pro='$this->Plan_Proc',Cod_Prf='$this->Profesional' WHERE Num_Cit = '$_REQUEST[Num_Cit]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function cancelarCita()
	{	
		$this->Conexion=conectarse();
		$sql="UPDATE CITA SET Cit_Esta='Cancelada',Cit_Obs='$this->Observacion' WHERE Num_Cit = '$_REQUEST[Num_Cit]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function consultarCitas()
	{
		$this->Conexion=conectarse();
		$sql="SELECT * FROM CITA";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function consultarContenido()
	{
		$this->Conexion=Conectarse();
		$sql="SELECT C.*, P.Nom_Pac, P.Ape_Pac, P1.Nom_Pla, PR.Nom_Pro FROM CITA C INNER JOIN PACIENTES P ON (P.Id_Pac = C.Id_Pac) INNER JOIN PLAN_1 P1 ON (P1.Id_Pla = C.Id_Pla) INNER JOIN PROCEDIMIENTO PR on (PR.Cod_Pro = C.Cod_Pro)";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function consultarCita($id)
	{
		$this->Conexion=Conectarse();
		$sql="SELECT C.*, P.Nom_Pac, P.Ape_Pac, CONCAT (P.Nom_Pac,' ',P.Ape_Pac) Nombre, CONCAT (P.Tip_Doc,' ',P.Nro_Doc) Documento, P1.Nom_Pla, PR.Nom_Pro, TIMESTAMPDIFF(YEAR,Nac_Pac,CURDATE()) Edad, Sex_Pac, Tel_Pac, Mai_Pac, CONCAT(U.nombre,' ',U.apellido) Profesional, P1.Cnt_Ses FROM CITA C INNER JOIN PACIENTES P ON (P.Id_Pac = C.Id_Pac) INNER JOIN PLAN_1 P1 ON (P1.Id_Pla = C.Id_Pla) INNER JOIN PROCEDIMIENTO PR on (PR.Cod_Pro = C.Cod_Pro) INNER JOIN USUARIOS U ON (U.codigo = C.Cod_Prf) WHERE Num_Cit='$id'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function consultarSesion($id,$ses)
	{	
		$this->Conexion=conectarse();
		$sql="SELECT COUNT(*) CONTEO FROM cita WHERE id_Pac = '$id' AND Id_Pla = '$ses'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function listarPacientes()
	{
		$this->Conexion=Conectarse();
		$sql="SELECT Id_Pac, concat(Tip_Doc,' ',Nro_Doc,' - ',Nom_Pac,' ',Ape_Pac) Paciente FROM PACIENTES";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
}

?>
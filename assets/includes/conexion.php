	<?php
	function conectar_bd()
	{
		$servidor_bd = "localhost";
		$usuario_bd = "root";
		$contrasenha_bd = "";
		$BD = "bd_colonche2";

		$conexion_bd = @mysql_connect($servidor_bd,$usuario_bd,$contrasenha_bd);

		if(!$conexion_bd)
		{
			die('<strong>No Pudo conectarse: </strong>'.mysql_error());
		}
		mysql_select_db($BD,$conexion_bd) or die(mysql_error($conexion_bd));
		return $conexion_bd;
	}

	function conectar_bd2()
	{
		$servidor_bd2 = "localhost";
		$usuario_bd2 = "root";
		$contrasenha_bd2 = "";
		$BD2 = "tarjetero_db";

		$conexion_bd2 = @mysql_connect($servidor_bd2,$usuario_bd2,$contrasenha_bd2);

		if(!$conexion_bd2)
		{
			die('<strong>No Pudo conectarse: </strong>'.mysql_error());
		}
		mysql_select_db($BD2,$conexion_bd2) or die(mysql_error($conexion_bd2));
		return $conexion_bd2;
	}

	function calculadorEdad($fecha_nacimiento)
	{
		$dia = date('j');
		$mes = date('n');
		$anio = date('Y');
		$fecha_n = "";
		$fecha_n = $fecha_nacimiento;
		$caracteres = strlen($fecha_n);

		$fecha_anio = "".$fecha_n[0].$fecha_n[1].$fecha_n[2].$fecha_n[3]."";
		$fecha_mes = "".$fecha_n[5].$fecha_n[6]."";
		$fecha_dia = "".$fecha_n[8].$fecha_n[9]."";
		
		$anio_nac = (int) $fecha_anio;
		$mes_nac = (int) $fecha_mes;
		$dia_nac = (int) $fecha_dia;

		if(($mes==$mes_nac) &&($dia<$dia_nac))
		{
			$anio = $anio-1;
		}
		if($mes<$mes_nac)
		{
			$anio = $anio-1;	
		}

		$edad = $anio-$anio_nac;
		return $edad;
	}

	function dias_transcurridos($fecha_i,$fecha_f)
	{
		$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
		$dias 	= abs($dias); $dias = floor($dias);		
		return $dias;
	}
?>
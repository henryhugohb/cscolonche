<?php
	include("conexion.php");
	$conexion = conectar_bd();
	$conexion2 = conectar_bd();
	$conexion3 = conectar_bd();
	$resultado_ga = array();
	$consulta = "SELECT * FROM tb_tarjetero2 where tar_estado='A'";
	$resultado = mysql_query($consulta,$conexion);
	if(!$resultado)
	{
		$resultado_ga = array(
			'codigo' => 0,
			'mensaje' => 'No se guardo el registro, no se pudo conectar con el servidor'
		);
		die(mysql_error($resultado));
	}
	else
	{
		while($row = mysql_fetch_assoc($resultado))
		{
			$consulta = "SELECT * FROM tb_admision WHERE adm_hcu='".$row['tar_hcu']."'";
			$resultado2 = mysql_query($consulta,$conexion2);
			if(!$resultado2)
			{
				$resultado_ga = array(
					'codigo' => 0,
					'mensaje' => 'No se guardo el registro, no se pudo conectar con el servidor'
				);
				die(mysql_error($resultado2));
			}
			else
			{
				$row2 = mysql_fetch_array($resultado2);
				$fecha_reg = $row['tar_fecha_hora']."";
				$caractt = strlen($fecha_reg);
				$consulta = "UPDATE tb_tarjetero2 SET "
							."tar_na=".$row2['adm_na']
							.", tar_fecha_nac='".$row2['adm_fecha_nacimiento']."'"
							.", tar_uo='002088'"
							.", tar_fecha_reg='".$fecha_reg[0].$fecha_reg[1].$fecha_reg[2].$fecha_reg[3].$fecha_reg[4].$fecha_reg[5].$fecha_reg[6].$fecha_reg[7].$fecha_reg[8].$fecha_reg[9]."'"
							." WHERE tar_hcu='".$row['tar_hcu']."'";
				$resultado3 = mysql_query($consulta,$conexion3);
				if(!$resultado3)
				{
					$resultado_ga = array(
						'codigo' => 0,
						'mensaje' => 'No se guardo el registro, no se pudo conectar con el servidor'
					);
					die(mysql_error($resultado3));
				}
				else
				{
					$resultado_ga = array(
						'codigo' => 1,
						'mensaje' => 'Actualizacion Exitosa'
					);
				}
			}
		}
	}
	mysql_close($conexion);
	mysql_close($conexion2);
	mysql_close($conexion3);
	header("Content-Type: application/json");
	echo json_encode($resultado_ga);
?>
<!DOCTYPE html>
<html>
	<head>
		<script src="assets/js/jquery-1.11.2.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<style>
			section
			{
				background-color: #dadada;
				font-family: arial;
			}
			#t-resultado
			{
				background-color: white;
				text-align: center;
			}
			.t-header
			{
				background-color: #045FB4;
				color: white;	
			}
			.btn_eliminar:hover
			{
				font-weight: bold;
				cursor: pointer;
			}
		</style>
	</head>
	<body>
		<section>
			<?php
			include("conexion.php");
			$conexion4 = conectar_bd2();
			$conexion5 = conectar_bd2();
			$conexion6 = conectar_bd2();
			echo "<strong>PROCESANDO...</strong></br>";			
			$consulta2 = "INSERT INTO tarjetero VALUES(NULL,"
						."'002088',"
						."9999,"
						."'".date("Y-m-d")."',"
						."'henry',"
						."'hugo',"
						."'tumbaco',"
						."'muñoz',"
						."'henry',"
						."'perla',"
						."'1988-04-05',"
						."28,"
						."NULL,"
						."NULL,"
						."1,NULL,NULL,"
						."'0926466830',"
						."'0980478497',"
						."NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,2,"
						."'".date("Y-m-d")." ".date("G:i:s")."',"
						."NULL);";
			$resultado4 = mysql_query($consulta2,$conexion4);
			if($resultado4)
			{
				$consulta2 = "SELECT * FROM tarjetero WHERE tj_docident='"."0926466830"."'";
				$resultado5 = mysql_query($consulta2,$conexion5);
				if($resultado5)
				{
					if(mysql_num_rows($resultado5)==1)
					{
				 		$row = mysql_fetch_array($resultado5);
				 		$consulta2 = "INSERT INTO htarjetero VALUES(NULL,"
									."".$row['tj_codigo'].","
									."9999,"
									."'".date("Y-m-d")."',"
									."'henry',"
									."'hugo',"
									."'tumbaco',"
									."'muñoz',"
									."'henry',"
									."'perla',"
									."'1988-04-05',"
									."28,"
									."NULL,"
									."NULL,"
									."1,NULL,NULL,"
									."'0926466830',"
									."'0980478497',"
									."NULL,NULL,2,"
									."'".date("Y-m-d")." ".date("G:i:s")."',"
									."NULL);";
						$resultado6 = mysql_query($consulta2,$conexion6);
						if($resultado6)
						{
							echo "<strong>TRANFERENCIA REALIZADA CON EXITO.</strong></br>";
						}
						else
						{
							echo "<strong>NO SE PUDO CREAR EL REGISTRO EN: htarjetero...</strong></br>";
							die(mysql_error($resultado6));
						}
					}
					else
					{
						echo "<strong>NO SE HA CRADO EL REGISTRO EN: tarjetero...</strong></br>";
					}
				}
				else
				{
					echo "<strong>NO SE PUDO CONECTAR CON LA TABLA: tarjetero...</strong></br>";
					die(mysql_error($resultado5));
				}
			}
			else
			{
				echo "<strong>NO SE CREO REGISTRO EL REGISTRO EN:tarjetero...</strong></br>";
				die(mysql_error($resultado4));
			}
			mysql_close($conexion4);
			mysql_close($conexion5);
			mysql_close($conexion6);
			?>
		</section>
	</body>
</html>
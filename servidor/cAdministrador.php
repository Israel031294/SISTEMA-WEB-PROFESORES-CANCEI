<?php
class cAdministrador{
	public function tablaProfesores(){
	$res;
	$respBd;
	
	$mysqli = new mysqli("localhost","root","","curriculum");
	
	if($mysqli){
		$procedimiento = "select * from profesores";
		
		if($stmt = $mysqli->prepare($procedimiento)){
			
			$stmt->execute();
			$respBd = $stmt->get_result();
			if($respBd->num_rows > 0){
				$resp = "<div class=\"container\"><table class=\"bordered centered responsive-table tablaTSCH\"  border=\"2\">";
								$resp =$resp."<tr>";

									$resp = $resp."<th>Nombre</th>";
									$resp = $resp."<th>A.Paterno</th>";
									$resp = $resp."<th>A.Materno</th>";
									$resp = $resp."<th>Correo</th>";
									$resp = $resp."<th>T&eacute;lefono</th>";
								$resp = $resp."</tr>";
					   
					   while($row = $respBd->fetch_assoc()){
						   $resp = $resp."<tr>";
						   
									
									$resp = $resp."<td>";
									$resp = $resp.$row['nombre'];
									$resp = $resp."</td>";
									
									$resp = $resp."<td>";
									$resp = $resp.$row['paterno'];
									$resp = $resp."</td>";
									
									$resp = $resp."<td>";
									$resp = $resp.$row['materno'];
									$resp = $resp."</td>";
									
									$resp = $resp."<td>";
									$resp = $resp.$row['correo'];
									$resp = $resp."</td>";
									
									$resp = $resp."<td>";
									$resp = $resp.$row['telefono'];
									$resp = $resp."</td>";

									$resp = $resp."<td>";
									$resp = $resp."<a href="."?a=1&Iu=".$this->codificaURL($row['idUsuario']).">Ver más info</a>";
									$resp = $resp."</td>";
									
									$resp = $resp."</td>";
									$resp = $resp."</tr>";
									
									
					   }
					   $resp = $resp."</table></div>";
						$resp = $resp."<a href=?a=0>Regresar</a>	";
			}
			}else{
			printf("no hubo respuesta");
		}
		
	}
	return $resp;
}

public function codificaURL($cadena){
		return rawurlencode(base64_encode($cadena));
	}
	
	public function decodificaURL($cadena){
		return rawurldecode(base64_decode($cadena));
	}

}



?>
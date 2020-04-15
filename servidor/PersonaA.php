<?PHP

class PersonaA{

	//Formulario de Experiencia No Académica

	public function registraExperienciaNA($idUsuario,$actividad,$organizacion,$mesInicio,$anioInicio,$mesFin,$anioFin,$oculto,$idExperiencia){
		$retorno="";
		if($idUsuario!="" and $actividad!="" and $organizacion!="" and $mesInicio!="" and $anioInicio!="" and $mesFin!="" and $anioFin!="")
		{
			$mysqli = new mysqli("localhost","root","","curriculum"); 
			if($mysqli){
				
				//vamos a ejecutar un procedimiento almacenado
				$procedimiento=" call expProfesionalNA('$idUsuario','$actividad','$organizacion','$anioInicio','$mesInicio','$anioFin', '$mesFin', '$oculto', '$idExperiencia');";
				$resultado=mysqli_query($mysqli,$procedimiento);
				
				if (!$resultado) {
					$retorno='No se pudo ejecutar la consulta: '.$mysqli->error;
				}else{			
					/* Usamos el resultado, asumiendo que, acto seguido, hemos terminado con él */
					$fila = mysqli_fetch_assoc($resultado);

					/* Ahora liberamos el resultado y continuamos con nuestro script */
					mysqli_free_result($resultado);
					$retorno=$fila['respuesta'];
					
					/*	if($retorno=="0"){
							$retorno="<font color='green'>Experiencia registrada</font>";
						}else{
							$retorno="<font color='red'>Experiencia ya existente</font>";
						}*/
					
					$mysqli->close();
				}
			}else{
				$retorno="No se conectó";
			}
		}else{
				$retorno="<font color='red'>Falta llenar campos</font>";
		}
		return $retorno;
		
		
	}	

	public function traerExperienciaNA($idUsuario){
		
		$retorno="";
			$mysqli = new mysqli("localhost","root","","curriculum"); 
			if($mysqli){
				
				//vamos a ejecutar un procedimiento almacenado
				$procedimiento="select * from experiencianoacademica where idUsuario='$idUsuario';";
				$resultado=mysqli_query($mysqli,$procedimiento);
				
				if (!$resultado) {
					$retorno='No se pudo ejecutar la consulta: '.$mysqli->error;
				}else{
						
								$retorno = "<table class=\"bordered centered responsive-table\"  border=\"2\">";
								$retorno =$retorno."<tr>";
									$retorno = $retorno."<th>Actividad</th>";
									$retorno = $retorno."<th>Empresa</th>";
									$retorno = $retorno."<th>A&ntildeo de inicio</th>";
									$retorno = $retorno."<th>Mes de Inicio</th>";
									$retorno = $retorno."<th>A&ntildeo final</th>";
									$retorno = $retorno."<th>Mes final</th>";
									$retorno = $retorno."<th>Actualizar</th>";
									$retorno = $retorno."<th>BORRAR</th>";

								$retorno = $retorno."</tr>";
					
						/* Usamos el resultado, asumiendo que, acto seguido, hemos terminado con él */
						while($fila=mysqli_fetch_assoc($resultado)){
							$retorno = $retorno."<tr>";

								$retorno = $retorno."<td>";
									$retorno = $retorno.$fila['actividad'];
								$retorno = $retorno."</td>";
								
								$retorno = $retorno."<td>";
									$retorno = $retorno.$fila['empresa'];
								$retorno = $retorno."</td>";
								
								$retorno = $retorno."<td>";
									$retorno = $retorno.$fila['anioInicio'];
								$retorno = $retorno."</td>";
								
								$retorno = $retorno."<td>";
									$retorno = $retorno.$fila['mesinicio'];
								$retorno = $retorno."</td>";
								
								$retorno = $retorno."<td>";
									$retorno = $retorno.$fila['anioFinal'];
								$retorno = $retorno."</td>";
								
								$retorno = $retorno."<td>";
									$retorno = $retorno.$fila['mesFinal'];
								$retorno = $retorno."</td>";
								
								$retorno = $retorno."<td>";
									  $retorno = $retorno.'<a href='.'?v=2&a='.$this->codificaURL($fila['actividad']).'&b='.$this->codificaURL($fila['empresa']).'&c='.$this->codificaURL($fila['anioInicio']).'&d='.$this->codificaURL($fila['mesinicio']).'&e='.$this->codificaURL($fila['anioFinal']).'&g='.$this->codificaURL($fila['mesFinal']).'&I='.$fila['idExperiencia'].'>Modificar</a>';
								$retorno = $retorno."</td>";
								
								$retorno = $retorno."<td>";
									  $retorno = $retorno."<a onclick=\"return confirm('¿Seguro de eliminar informacion?')\"".' href='.'?v=3&a='.$this->codificaURL($fila['actividad']).'&b='.$this->codificaURL($fila['empresa']).'&c='.$this->codificaURL($fila['anioInicio']).'&d='.$this->codificaURL($fila['mesinicio']).'&e='.$this->codificaURL($fila['anioFinal']).'&g='.$this->codificaURL($fila['mesFinal']).'>Eliminar</a>';
								$retorno = $retorno."</td>";
								
								$retorno = $retorno."</tr>";
							}
							 $retorno = $retorno."</table>";
						
									
						$mysqli->close();
				}
			}else{
				$retorno="No se conectó";
			}
		return $retorno;
	}

	public function cantidadExperienciaNA($idUsuario)
    {
		$retorno="";
			$mysqli = new mysqli("localhost","root","","curriculum"); 
			if($mysqli){
				
				//vamos a ejecutar un procedimiento almacenado
				$procedimiento="call cantidadExpProfesionalNA('$idUsuario');";
				$resultado=mysqli_query($mysqli,$procedimiento);
				
				if (!$resultado) {
					$retorno='No se pudo ejecutar la consulta: '.$mysqli->error;
				}else{
					
					/* Usamos el resultado, asumiendo que, acto seguido, hemos terminado con él */
					$fila = mysqli_fetch_assoc($resultado);
					/* Ahora liberamos el resultado y continuamos con nuestro script */
					mysqli_free_result($resultado);
					$retorno=$fila['respuesta'];
					$mysqli->close();
				}
			}else{
				$retorno="No se conectó";
			}
		return $retorno;
	}


// Gestión Académica

public function registraGestion($idUsuario,$actividad,$institucion,$mesInicio,$anioInicio,$mesFin,$anioFin,$oculto,$idGestion){
		$retorno="";
		if($idUsuario!="" and $actividad!="" and $institucion!="" and $mesInicio!="" and $anioInicio!="" and $mesFin!="" and $anioFin!="")
		{
			$mysqli = new mysqli("localhost","root","","curriculum"); 
			if($mysqli){
				
				//vamos a ejecutar un procedimiento almacenado
				$procedimiento=" call registroGestionAcademica('$idUsuario','$actividad','$institucion','$anioInicio','$mesInicio','$anioFin', '$mesFin', '$oculto', '$idGestion');";
				$resultado=mysqli_query($mysqli,$procedimiento);
				
				if (!$resultado) {
					$retorno='No se pudo ejecutar la consulta: '.$mysqli->error;
				}else{			
					/* Usamos el resultado, asumiendo que, acto seguido, hemos terminado con él */
					$fila = mysqli_fetch_assoc($resultado);

					/* Ahora liberamos el resultado y continuamos con nuestro script */
					mysqli_free_result($resultado);
					$retorno=$fila['respuesta'];
					
					/*	if($retorno=="0"){
							$retorno="<font color='green'>Experiencia registrada</font>";
						}else{
							$retorno="<font color='red'>Experiencia ya existente</font>";
						}*/
					
					$mysqli->close();
				}
			}else{
				$retorno="No se conectó";
			}
		}else{
				$retorno="<font color='red'>Falta llenar campos</font>";
		}
		return $retorno;
		
		
	}	

	public function traerGestion($idUsuario){
		
		$retorno="";
			$mysqli = new mysqli("localhost","root","","curriculum"); 
			if($mysqli){
				
				//vamos a ejecutar un procedimiento almacenado
				$procedimiento="select * from gestionacademica where idUsuario='$idUsuario';";
				$resultado=mysqli_query($mysqli,$procedimiento);
				
				if (!$resultado) {
					$retorno='No se pudo ejecutar la consulta: '.$mysqli->error;
				}else{
						
								$retorno = "<table class=\"bordered centered responsive-table\"  border=\"2\">";
								$retorno =$retorno."<tr>";
									$retorno = $retorno."<th>Actividad</th>";
									$retorno = $retorno."<th>institucion</th>";
									$retorno = $retorno."<th>A&ntildeo de inicio</th>";
									$retorno = $retorno."<th>Mes de Inicio</th>";
									$retorno = $retorno."<th>A&ntildeo final</th>";
									$retorno = $retorno."<th>Mes final</th>";
									$retorno = $retorno."<th>Actualizar</th>";
									$retorno = $retorno."<th>BORRAR</th>";
								$retorno = $retorno."</tr>";
					
						/* Usamos el resultado, asumiendo que, acto seguido, hemos terminado con él */
						while($fila=mysqli_fetch_assoc($resultado)){
							$retorno = $retorno."<tr>";

								$retorno = $retorno."<td>";
									$retorno = $retorno.$fila['actividad'];
								$retorno = $retorno."</td>";
								
								$retorno = $retorno."<td>";
									$retorno = $retorno.$fila['institucion'];
								$retorno = $retorno."</td>";
								
								$retorno = $retorno."<td>";
									$retorno = $retorno.$fila['anioInicio'];
								$retorno = $retorno."</td>";
								
								$retorno = $retorno."<td>";
									$retorno = $retorno.$fila['mesinicio'];
								$retorno = $retorno."</td>";
								
								$retorno = $retorno."<td>";
									$retorno = $retorno.$fila['anioFinal'];
								$retorno = $retorno."</td>";
								
								$retorno = $retorno."<td>";
									$retorno = $retorno.$fila['mesFinal'];
								$retorno = $retorno."</td>";
								
								$retorno = $retorno."<td>";
									  $retorno = $retorno.'<a href='.'?v=1&a='.$this->codificaURL($fila['actividad']).'&b='.$this->codificaURL($fila['institucion']).'&c='.$this->codificaURL($fila['anioInicio']).'&d='.$this->codificaURL($fila['mesinicio']).'&e='.$this->codificaURL($fila['anioFinal']).'&g='.$this->codificaURL($fila['mesFinal']).'>Modificar</a>';
								$retorno = $retorno."</td>";
								
								$retorno = $retorno."</tr>";
							}
							 $retorno = $retorno."</table>";
						
									
						$mysqli->close();
				}
			}else{
				$retorno="No se conectó";
			}
		return $retorno;
	}

	public function cantidadGestion($idUsuario)
    {
		$retorno="";
			$mysqli = new mysqli("localhost","root","","curriculum"); 
			if($mysqli){
				
				//vamos a ejecutar un procedimiento almacenado
				$procedimiento="call cantidadGestion('$idUsuario');";
				$resultado=mysqli_query($mysqli,$procedimiento);
				
				if (!$resultado) {
					$retorno='No se pudo ejecutar la consulta: '.$mysqli->error;
				}else{
					
					/* Usamos el resultado, asumiendo que, acto seguido, hemos terminado con él */
					$fila = mysqli_fetch_assoc($resultado);
					/* Ahora liberamos el resultado y continuamos con nuestro script */
					mysqli_free_result($resultado);
					$retorno=$fila['respuesta'];
					$mysqli->close();
				}
			}else{
				$retorno="No se conectó";
			}
		return $retorno;
	}





	public function traerSelectMeses($entrada){
		$arreglo=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Ocubre','Noviembre','Diciembre'];
		$html="";
		
		$html.="";
		for ($i = 0; $i < count($arreglo); $i++) {
			if($arreglo[$i]==$entrada){
				$html.="<option value='$arreglo[$i]' selected>$arreglo[$i]</option>";
			}else{
				$html.="<option value='$arreglo[$i]'>$arreglo[$i]</option>";			
			}
		}
		return $html;
	}


	public function codificaURL($cadena){
		return rawurlencode(base64_encode($cadena));
	}
	
	public function decodificaURL($cadena){
		return rawurldecode(base64_decode($cadena));
	}

}	
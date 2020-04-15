<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ("../assets/lib/dompdf/autoload.inc.php");
require_once ("../assets/lib/dompdf/lib/html5lib/Parser.php");
require_once ("../assets/lib/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php");
require_once ("../assets/lib/dompdf/lib/php-svg-lib/src/autoload.php");
require_once ("../assets/lib/dompdf/src/Autoloader.php");


// Introducimos HTML de prueba

$htmlPINTADO='';
$identificador=1; //será el receptor de url desde  administrador
$contador=1;

$htmlPINTADO.='<html><head><link href="../assets/css/estilosM.css" rel="stylesheet"><link href="../assets/css/responsive.css" rel="stylesheet"></head><body>';
$htmlPINTADO.='
<div id="cabeza">
			<p id="pCabeza"><h2 id="hCabeza">ESCUELA SUPERIOR DE C&Oacute;MPUTO</h2></p>
</div>';
		//DATOS DEL PROFESOR
				
								$mysqli = new mysqli("localhost","root","","curriculum");
								$htmlPINTADO.="<table border='1'>";		
								if($mysqli->set_charset("utf8")){
									
									$cantidad="select * from profesores";
									if($preparaConsulta=$mysqli->prepare($cantidad)){
										$preparaConsulta->execute();
										$resultadoP = $preparaConsulta->get_result();
										
										while($contador<=$resultadoP->num_rows){
												$co="select nombre,paterno,materno from profesores where idUsuario=?";
												if($preparaConsulta=$mysqli->prepare($co)){
													$preparaConsulta->bind_param('i', $contador);
													$preparaConsulta->execute();
													$resultado = $preparaConsulta->get_result();
													$htmlPINTADO.="<tr id='fd'><td>NOMBRE DEL PROFESOR</td></tr>";
														while($filas = $resultado->fetch_assoc()){
															$htmlPINTADO.='<tr>'.'<td>'.$filas["nombre"].' '.$filas["paterno"].' '.$filas["materno"].'</td>';
															$htmlPINTADO.='</tr>';
														}
												}
												$co="select DISTINCT nivel from formacionacademica where idUsuario=?";
												if($preparaConsulta=$mysqli->prepare($co)){
													$preparaConsulta->bind_param('i', $contador);
													$preparaConsulta->execute();
													$resultado = $preparaConsulta->get_result();
													$htmlPINTADO.="<tr id='fc'><td>GRADOS ACADEMICOS</td></tr>";
														while($filas = $resultado->fetch_assoc()){
															$htmlPINTADO.='<tr>'.'<td>'.$filas["nivel"].'</td>';
															$htmlPINTADO.='</tr>';
														}
												}
												$co="select DISTINCT * from contratacionactual where idUsuario=?";
												if($preparaConsulta=$mysqli->prepare($co)){
													$preparaConsulta->bind_param('i', $contador);
													$preparaConsulta->execute();
													$resultado = $preparaConsulta->get_result();
													$htmlPINTADO.="<tr id='fc'><td>CONTRATACION ACTUAL</td></tr>";
														while($filas = $resultado->fetch_assoc()){
															$htmlPINTADO.='<tr>'.'<td>'.'Categoria: '.$filas["categoria"].'  '.' Fecha de ingreso: '.$filas["diaIngreso"].' '.$filas["mesIngreso"].' '.$filas["anioIngreso"].'</td>';
															$htmlPINTADO.='</tr>';
														}
												}
												$co="select  * from instanciaspertenecientes where idUsuario=?";
												if($preparaConsulta=$mysqli->prepare($co)){
													$preparaConsulta->bind_param('i', $contador);
													$preparaConsulta->execute();
													$resultado = $preparaConsulta->get_result();
													$htmlPINTADO.="<tr id='fc'><td>INSTANCIAS PERTENECIENTES</td></tr>";
														while($filas = $resultado->fetch_assoc()){
															$htmlPINTADO.='<tr>'.'<td>'.'Nombre instancia: '.$filas["nombreInstancia"].'  '.' Fecha de ingreso: '.$filas["diaIngreso"].' '.$filas["mesIngreso"].' '.$filas["anioIngreso"].'</td>';
															$htmlPINTADO.='</tr>';
														}
												}
												$co="select  * from cursosimpartidos where idUsuario=?";
												if($preparaConsulta=$mysqli->prepare($co)){
													$preparaConsulta->bind_param('i', $contador);
													$preparaConsulta->execute();
													$resultado = $preparaConsulta->get_result();
													$htmlPINTADO.="<tr id='fc'><td>CURSOS IMPARTIDOS</td></tr>";
														while($filas = $resultado->fetch_assoc()){
															$NIVEL=$filas["idNivel"];
															$PERIODO=$filas["idPeriodo"];
															if($PERIODO=="1"){
																$PERIODO="2014-2015";
															}else{
																$PERIODO="2015-2016";
															}
															if($NIVEL=="1"){
																$NIVEL="LICENCIATURA";
															}else{
																$NIVEL="POSGRADO";
															}
															$htmlPINTADO.='<tr>'.'<td>'.'Periodo: '.$PERIODO.'  '.'Nivel: '.$NIVEL.'  '.'Nombre: '.$filas["nombreCurso"].'  '.'Tipo: '.$filas["tipo"].'  '.'Horas: '.$filas["horasTotales"];
															$htmlPINTADO.='</tr>';
														}
												}
												$contador=$contador+1;
												
										}
									}
														
								}else{
									$retorno="No se conectó";
								}				
									$htmlPINTADO.='</tbody></table>';
									$htmlPINTADO.='</body></html>';
								$mysqli->close();
use Dompdf\Dompdf;

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new Dompdf();
$pdf->load_html(utf8_decode($htmlPINTADO));
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("letter", "portrait");
//$pdf->set_paper("A4", "landscape");
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('reportePdf.pdf');



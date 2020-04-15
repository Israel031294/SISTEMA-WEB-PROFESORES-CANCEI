<?php
	include 'cCapacitacionActAdm.php';
	
	$idUsuario = 1;//variable de sesion
	$obj = new cCapacitacionActAdm();
	$res´= "";
	$idTabla;
	$tabla = "";
	$a = 0;//para la actualización
	$tipoForm = "Cap";//para saber que formulario es
	
	$tipoC = "";
	$institucion = "";
	$pais = "";
	$anio = "";
	$horas = "";
	
	$tipoC = isset($_REQUEST["tipo"]) ? $_REQUEST["tipo"] : "";
	$institucion = isset($_REQUEST["institucion"]) ? $_REQUEST["institucion"] : "";
	$pais = isset($_REQUEST["pais"]) ? $_REQUEST["pais"] : "";
	$anio = isset($_REQUEST["anio"]) ? $_REQUEST["anio"] : "";
	$horas = isset($_REQUEST["horas"]) ? $_REQUEST["horas"] : "";
	$actualiza = isset($_REQUEST["actualiza"]) ? $_REQUEST["actualiza"] : "";
	$idCapacitacion = isset($_REQUEST["idCa"]) ? $_REQUEST["idCa"] : "";
	
	$a = isset($_REQUEST["a"]) ? $obj->decodificaURL($_REQUEST["a"]) : "0";//1 si es actualización
	$t = isset($_REQUEST["t"]) ? $obj->decodificaURL($_REQUEST["t"]) : "";//tipo
	$i = isset($_REQUEST["i"]) ? $obj->decodificaURL($_REQUEST["i"]) : "";//institucion
	$p = isset($_REQUEST["p"]) ? $obj->decodificaURL($_REQUEST["p"]) : "";//pais
	$h = isset($_REQUEST["h"]) ? $obj->decodificaURL($_REQUEST["h"]) : "";//horas
	$an = isset($_REQUEST["an"]) ? $obj->decodificaURL($_REQUEST["an"]) : "";//anio
	$idCap = isset($_REQUEST["idC"]) ? $obj->decodificaURL($_REQUEST["idC"]) : "";
	$e = isset($_REQUEST["e"]) ? $obj->decodificaURL($_REQUEST["e"]) : "";
	
	if($e == 1){
		$res = "<h2>".$obj->borraCapacitacionActDis($idCap,$tipoForm)."</h2>";
	}else{
					if($actualiza == ""){
					$res = '<h2>'.$obj->agregaCapacitacionDocenteActDis($idUsuario,$tipoC,$institucion,$pais,$anio,$horas,$tipoForm)."</h2>";
					}else{
					$res = "<h2>".$obj->actualizacionCapacitacionActDis($idCapacitacion,$idUsuario,$tipoC,$institucion,$pais,$anio,$horas,$tipoForm)."</h2>";

				}

	}
	
	
	$idTabla = isset($_REQUEST["tl"]) ? $_REQUEST["tl"] : "";
	
	
	

	$tabla = $obj->tablaCapacitacionDocenteActDis($idUsuario,$tipoForm);
	

	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Capacitaci&oacute;n Docente</title>
    <link href="./fontawesome/css/all.min.css" rel="stylesheet">
    <link href="./materialize/css/materialize.min.css" rel="stylesheet">
    <link href="./jquery/plugins/slippry/slippry.css" rel="stylesheet">
    <link href="./js/validetta101/validetta.min.css" rel="stylesheet">
    <link href="./css/estilos.css" rel="stylesheet" >
    <!--<link href="./js/confirm/jquery-confirm.min.css" rel="stylesheet">--->
    <script src="./js/jquery-3.1.1.min.js"></script>
    <script src="./materialize/js/materialize.min.js"></script>
    <script src="./js/validetta101/validetta.min.js"></script>
    <!--<script src="./js/validetta101/localization/validettaLang-es-ES.js"></script>-->
    <script src="./js/confirm/jquery-confirm.js"></script>
	<script src="../assets/js/funciones.js"></script>


   
</head>
<body>
    <header>
      <section id="encabezado">
            <div class="container">
                    <h2 class="blue-grey-text center-align">Capacitaci&oacute;n Docente</h2>
                    <hr>
					
					<?=$res?>
					
             </div>
      </section>
    </header>
				<?php
					if($idTabla == 1){
				?>
						<?=$tabla?>
						
						
					<?php
					}else{
					?>

    <main>
        <section id="contenidos">
             <div class="container">
                <div class="row">
			
				
                        <form id="formObtComp" autocomplete="off" method = "POST" action = "capacitacionDocente.php">
                                <div class="col s12 l6 input-field">
                                     <i class="fa fa-paste fa prefix"></i>
                                     <label for="tipoObt">Tipo:</label>
									 <select name = "tipo" id = "tipo" value="<?=$t?>" placeholder= "Tipo" data-validetta="required,number,minLength[8],maxLength[10]" required>
										<option value = "" disabled selected>Seleccione una opcion-></option>
										<option value = "Certificación">Certificación</option>
										<option value = "Curso">Curso</option>
										<option value = "Diplomado">Diplomado</option>
										
									 </select>
                                     

                                </div>
                    
                            
                                <div class="col s12 l6 input-field">
                                        <i class="fa fa-building fa prefix"></i>
                                        <label for="institucionObt">Instituci&oacute;n:</label>
                                        <input type="text" required value="<?=$i?>" placeholder="Institución" id="institucion" name="institucion" data-validetta="required,number,minLength[8],maxLength[10]">
                                  </div>

                                  <div class="col s12 l6 input-field">
                                        <i class="fa fa-flag-usa fa prefix"></i>
                                        <label for="paisObt">Pa&iacute;s:</label>
                                        <input type="text" required value="<?=$p?>" placeholder = "País" id="pais" name="pais" data-validetta="required,number,minLength[8],maxLength[10]">
                                  </div>

                                  <div class="col s12 l6 input-field">
                                        <i class="fa fa-calendar-alt fa prefix"></i>
                                        <label for="anocObt">A&ntilde;o:</label>
                                        <input type="number" value="<?=$an?>" placeholder = "Año"id="anio" name="anio" min = "1970" max = "2019" data-validetta="required,number,minLength[8],maxLength[10]">
                                  </div>

                                  <div class="col s12 l6 input-field">
                                        <i class="fa fa-clock fa prefix"></i>
                                        <label for="horasObt">Horas:</label>
                                        <input type="number" required value="<?=$h?> "placeholder = "Horas" min = "1" max="800" id="horas" name="horas" data-validetta="required,number,minLength[8],maxLength[10]">
                                  </div>


                                
                                <div class="col s12 8 input-field  ">
                                    <input type="submit" class="btn blue darken-3" style="width:100%;" value="GUARDAR">
                                   
                                </div>
										<?php
										if($a == 1){
										?>
                                <div class="col s12 8 input-field ">

											<a href = "capacitacionDocente.php?tl=1" class="btn red" style="width:100%;">CANCELAR</a>
											<input type = "hidden" value = "1" id = "actualiza" name = "actualiza"/><!--el quen os dice si es actualizacion-->
											<input type = "hidden" value = "<?=$idCap?>" id="idCa" name="idCa"/>
										<?php
										}else{
										?>
                                        <a href="./menu.html" class="btn red" style="width:100%;">CANCELAR</a>
										<a href="?tl=1">Ver capacitaciones</a>
										<?php
										}
										?>
                                </div>
                               <input type="hidden" value = "1" id="tl" name="tl"/> <!--el que activa la tabla-->
                               
                             
                        </form>     

                </div>
            </div>
         </section>      
    </main>
						<?php
					}
						?>
    <footer class="page-footer blue  darken-3">
            <section id="pie">
           
            <div class="footer-copyright">
              <div class="container">
              © 2019 Escuela Superior de C&oacute;mputo 
              <a class="grey-text text-lighten-4 right" href="https://www.ipn.mx/">IPN</a>
              </div>
            </div>
        </section>
     </footer>
</body>
</html>
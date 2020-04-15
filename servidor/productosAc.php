
<?php
	session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
	
	if($_SESSION["activada"]=="v")
	{
		include 'productos.php';
		//Si la variable existe y su valor no es nulo su valor es igual al request de otro modo es igual a su valor de sesion
		$idUsuario=$_SESSION["identificador"];
		$objeto = new productos();
		$cantidad="";
		$tabla="";
		
		$cantidad=$objeto->cantidadProducto($idUsuario);
		$tabla=$objeto->traerProducto($idUsuario);
		
		$identificadorRegistro=isset($_REQUEST["I"]) ? $_REQUEST["I"] : "0"; //nombreInstancia
		$anio =  isset($_REQUEST["anio"])  ? $_REQUEST["anio"] : ""; //niveldel curso
		$nombre =  isset($_REQUEST["nombre"]) ? $_REQUEST["nombre"] : ""; //  nombre del curso nivel
		$descri =  isset($_REQUEST["descri"]) ? $_REQUEST["descri"] : ""; //Intitucion donde se cursó el nivel
		$oculto =  isset($_REQUEST["oculto"]) ? $_REQUEST["oculto"] : "";
		$receptor =  isset($_REQUEST["v"]) ? $_REQUEST["v"] : "";
		$respuesta="Productos acad&eacute;micos";	
		
		//receptores de parametros url
		    $n =  isset($_REQUEST["n"])  ? $objeto->decodificaURL($_REQUEST["n"]) : ""; //anio
        $l =  isset($_REQUEST["l"]) ? $objeto->decodificaURL($_REQUEST["l"]) : ""; //nombre
        $o =  isset($_REQUEST["o"]) ? $objeto->decodificaURL($_REQUEST["o"]) : ""; //descri
       
       
		
		if($receptor=="3"){
			$oculto="3"; // asignacion por URL
			$anio = $n;
			$nombre = $l; 
			$descri = $o;  
			
		}
		
		if($oculto!=""){
      $respuesta=$objeto->registraProducto($idUsuario,$anio,$nombre,$descri,$oculto,$identificadorRegistro);
      
				$cantidad=$objeto->cantidadProducto($idUsuario);
				$tabla=$objeto->traerProducto($idUsuario);
		}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos Acad&eacute;micos</title>
    <link href="../assets/lib/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="../assets/lib/materialize/css/materialize.min.css" rel="stylesheet">
    <link href="../assets/js/validetta101/dist/validetta.min.css" rel="stylesheet">
    <link href="../assets/css/estilos.css" rel="stylesheet" >
    <link href="../assets/js/confirm334/dist/jquery-confirm.min.css" rel="stylesheet">
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/lib/materialize/js/materialize.min.js"></script>
    <script src="../assets/js/validetta101/dist/validetta.min.js"></script>
    <script src="../assets/js/validetta101/localization/validettaLang-es-ES.js"></script>
    <script src="../assets/js/confirm334/dist/jquery-confirm.min.js"></script>
    <script src="../assets/js/validar.js"></script>


</head>
<body>
    <header>
      <section id="encabezado">
            <div class="container">
                    <h2 class="blue-grey-text center-align"><?=$respuesta?></h2>
                    <h5 class="blue-grey-text center-align">Incluir los datos relevantes, tales como: publicaciones titulo, autor(es), d&oacute;nde se public&oacute; o present&oacute;, fecha de publicaci&oacute;n o presentaci&oacute;n, etc. Patentes o desarrollos tecnol&oacute;gicos, tipo, n&uacute;mero de registro, alcance, etc.  </h5>
                    <hr>
             </div>
      </section>
    </header>


    <main>
        <section id="contenidos">
             <div class="container">
                <div class="row">

                <?php 
					if($cantidad=="0" or $receptor=="1"){ //registro
				?>
					
                        <form id="formObtComp" autocomplete="off" method="post" action="productosAc.php">


                        <div class="col s12 l6 input-field">
                                          <i class="fa fa-calendar fa prefix"></i>
                                        <label for="anio">A&ntilde;o</label>
                                        <input type="number"  id="anio" name="anio" data-validetta="required,number,minLength[4],maxLength[4]">
                        </div>
                        <div class="col s12 l6 input-field">
                                          <i class="fa fa-microscope fa prefix"></i>
                                        <label for="nombre">TIPO: Publicaci&oacute;n | Patente | Presetanci&oacute;n | Etc</label>
                                        <input type="text" id="nombre" name="nombre" data-validetta="required">
                        </div>


                                <div class="col s12  input-field">
                                        <i class="fa fa-paperclip fa prefix"></i>
                                        <label for="descObt">Descripci&oacute;n:</label>
                                        <input type="text" id="descri" name="descri" data-validetta="required">
                                  </div>
                                
                                  <!-- 
                                  <div class="row">
                                    <form class="col s12">
                                      <div class="row">
                                        <div class="input-field col s12 8">
                                          <textarea id="descri" class="materialize-textarea" name="descri" data-validetta="required"></textarea>
                                          <label for="descObt">Descripci&oacute;n:</label>
                                        </div>
                                      </div>
                                    </form>
                                   </div>-->
  
                                

                                
                                <div class="col s12 8 input-field  ">
                                    <input type="submit" class="btn blue darken-3" style="width:100%;" value="GUARDAR">
                                   
                                </div>
                                <div class="col s12 8 input-field ">
                                   
                                        <a href="./productosAc.php" class="btn red" style="width:100%;">CANCELAR</a>
                                </div>
                              
								               <input type="hidden" value="1" name="oculto">
                               
                         </form>    
                         <?php
                            }else{
                              if($receptor=="2") //actualizar
                              {
                          ?>
           <form id="formObtComp" autocomplete="off" method="post" action="productosAc.php">


<div class="col s12 l6 input-field">
                  <i class="fa fa-calendar fa prefix"></i>
                <label for="anio">A&ntilde;o</label>
                <input type="number" value='<?=$n?>' id="anio" name="anio" data-validetta="required,number,minLength[4],maxLength[4]">
</div>
<div class="col s12 l6 input-field">
                  <i class="fa fa-microscope fa prefix"></i>
                <label for="nombre">TIPO: Publicaci&oacute;n | Patente | Presetanci&oacute;n | Etc</label>
                <input type="text" id="nombre" name="nombre" value='<?=$l?> ' data-validetta="required">
</div>


        <div class="col s12  input-field">
                <i class="fa fa-paperclip fa prefix"></i>
                <label for="descObt">Descripci&oacute;n:</label>
                <input type="text" id="descri"  value='<?=$o?>' name="descri" data-validetta="required">
          </div>
        
          <!-- 
          <div class="row">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s12 8">
                  <textarea id="descri" class="materialize-textarea" name="descri" data-validetta="required"></textarea>
                  <label for="descObt">Descripci&oacute;n:</label>
                </div>
              </div>
            </form>
           </div>-->

        

        
        <div class="col s12 8 input-field  ">
            <input type="submit" class="btn blue darken-3" style="width:100%;" value="Actualizar">
           
        </div>
        <div class="col s12 8 input-field ">
           
                <a href="./productosAc.php" class="btn red" style="width:100%;">CANCELAR</a>
        </div>

        <input type="hidden" value="2" name="oculto">
				<input type="hidden" value=<?=$identificadorRegistro?> name="I" >
     
     </form>   

         <?php
							}else{ //tabla para operaciones anteriores y eliminar
					?>
								
								<a href='?v=1'>Agregar producto academico</a> <br>
								<?=$tabla?>
					<?php
							}
						}
					?>

                </div>
            </div>
         </section>      
    </main>

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
<?php
	}else{
		header("location:../index.php");
	}
?>
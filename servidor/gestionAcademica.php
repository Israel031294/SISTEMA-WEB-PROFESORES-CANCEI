<?php
    include 'PersonaA.php';
    //Si la variable existe y su valor no es nulo su valor es igual al request de otro modo es igual a su valor de sesion
    $idUsuario=1; //FUTURA VARIABLE DE SESION
    $objeto = new PersonaA();
    $cantidad="";
    $tabla="";
    
    $cantidad=$objeto->cantidadGestion($idUsuario);
    $tabla=$objeto->traerGestion($idUsuario);
    
    $identificadorGestion=isset($_REQUEST["I"]) ? $_REQUEST["I"] : "0"; //nombreInstancia
        $actividad =  isset($_REQUEST["actividad"]) ? $_REQUEST["actividad"] : ""; //  actividad
        $institucion =  isset($_REQUEST["institucion"]) ? $_REQUEST["institucion"] : ""; //institucion o empresa
        $mesInicio =  isset($_REQUEST["mesInicio"]) ? $_REQUEST["mesInicio"] : ""; //mes de inicio
        $anioInicio =  isset($_REQUEST["anioInicio"]) ? $_REQUEST["anioInicio"] : ""; //año de inicio
        $mesFin =  isset($_REQUEST["mesFin"]) ? $_REQUEST["mesFin"] : ""; //mes de final
        $anioFin =  isset($_REQUEST["anioFin"]) ? $_REQUEST["anioFin"] : ""; //año de final
    
    $oculto =  isset($_REQUEST["oculto"]) ? $_REQUEST["oculto"] : "";
    $receptor =  isset($_REQUEST["v"]) ? $_REQUEST["v"] : "";
    $respuesta="Gestion Acad&eacute;mica"; 
    
    //receptores de parametros url
        $n =  isset($_REQUEST["n"])  ? $objeto->decodificaURL($_REQUEST["n"]) : ""; //actividad
        $l =  isset($_REQUEST["l"]) ? $objeto->decodificaURL($_REQUEST["l"]) : ""; //institucion
        $o =  isset($_REQUEST["o"]) ? $objeto->decodificaURL($_REQUEST["o"]) : ""; //mes de inicio
        $h =  isset($_REQUEST["h"]) ? $objeto->decodificaURL($_REQUEST["h"]) : "";//año de inicio
        $z =  isset($_REQUEST["z"])  ? $objeto->decodificaURL($_REQUEST["z"]) : ""; //mes final
        $w =  isset($_REQUEST["w"]) ? $objeto->decodificaURL($_REQUEST["w"]) : ""; //año final
       
    
    if($receptor=="3"){
      $oculto="3"; // asignacion por URL
      $actividad = $n;
      $institucion = $l; 
      $mesInicio = $o;  
      $anioInicio =  $h;
      $mesFin = $z;
      $anioFin =  $w;
    }
    
    if($oculto!=""){
       $respuesta= $objeto->registraGestion($idUsuario,$actividad,$institucion,$mesInicio,$anioInicio,$mesFin,$anioFin,$oculto,$identificadorGestion);
        $cantidad=$objeto->cantidadGestion($idUsuario);
        $tabla=$objeto->traerGestion($idUsuario);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gesti&oacute;n Acad&eacute;mica</title>
    <link href="../assets/lib/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="../assets/lib/materialize/css/materialize.min.css" rel="stylesheet">
    <link href="../assets/lib/jquery/plugins/slippry/slippry.css" rel="stylesheet">
    <link href="../assets/js/validetta101/validetta.min.css" rel="stylesheet">
    <link href="../assets/css/estilos.css" rel="stylesheet" >
    <!--<link href="./js/confirm/jquery-confirm.min.css" rel="stylesheet">--->
    <script src="../assets/lib/jquery-3.4.0.min.js"></script>
    <script src="../assets/lib/materialize/js/materialize.min.js"></script>
    <script src="../assets/js/validetta101/validetta.min.js"></script>
    <!--<script src="./js/validetta101/localization/validettaLang-es-ES.js"></script>-->
    <script src="../assets/js/confirm/js/jquery-confirm.js"></script>

    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.dropdown-trigger');
        var instances = M.Dropdown.init(elems, options);
      });
      // Or with jQuery
      $('.dropdown-trigger').dropdown();
    </script>
   
</head>
<body>
    <header>
      <section id="encabezado">
            <div class="container">
                    <h2 class="blue-grey-text center-align"><?=$respuesta?> <br></h2>
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

                        <form id="formObtComp" autocomplete="off" method="post" action="gestionAcademica.php">
                                 <div class="col s12 16 input-field">
                                  
                                </div>

                                <div class="col s12 l6 input-field">
                                     <i class="fa fa-tools fa prefix"></i>
                                     <label for="actPuObt">Actividad o Puesto:</label>
                                     <input type="text" id="actividad" name="actividad" data-validetta="required,number,minLength[8],maxLength[10]">

                                </div>

                                <div class="col s12 l6 input-field">
                                      <i class="fa fa-building fa prefix"></i>
                                      <label for="OrgObt">Instituci&oacute;n:</label>
                                      <input type="text" id="institucion" name="institucion" data-validetta="required,number,minLength[8],maxLength[10]">
                                </div>
                                <div class="col s12 16 input-field">
                                  
                                </div>


                                <div class="col s12 l6 input-field", class="row">
                                      <div class="row">
                                      <select class="browser-default" id="mesInicio" name="mesInicio" required>
                                      <option value="" disabled selected> Mes de inicio </option>
                                      <?=$objeto->traerSelectMeses($l)?>
                                      </select>
                                      </div>
                                </div>

                                <div class="col s12 l6 input-field">
                                      <i class="fas fa-calendar-plus prefix"></i>
                                      <label for="anioIni">A&ntilde;o de inicio: </label>
                                      <input type="text" id="anioInicio" name="anioInicio" data-validetta="required,number,Length[4]">
                                </div> 

                                <div class="col s12 16 input-field">
                                  
                                </div>

                                <div class="col s12 l6 input-field", class="row">
                                      <div class="row">
                                      <select class="browser-default" id="mesFin" name="mesFin" required>
                                          <option value="" disabled selected> Mes de t&eacute;rmino </option>
                                          <?=$objeto->traerSelectMeses($l)?>
                                       </select>
                                      </div>
                                </div>

                                

                                <div class="col s12 l6 input-field">
                                      <i class="fas fa-calendar-times prefix"></i>
                                      <label for="anioFin">A&ntilde;o de t&eacute;rmino: </label>
                                      <input type="text" id="anioFin" name="anioFin" data-validetta="required,number,minLength[8],maxLength[10]">
                                </div> 
                                  
                                <div class="col s2 16 input-field">
                                  
                                </div>
                                

                                
                                <div class="col s12 8 input-field  ">
                                    <input type="submit" class="btn blue darken-3" style="width:100%;" value="GUARDAR">
                                   
                                </div>
                                <div class="col s12 8 input-field ">
                                   
                                        <a href="./menu.html" class="btn red" style="width:100%;">CANCELAR</a>
                                </div>
                               
                                 <input type="hidden" value="1" name="oculto">
                             
                        </form>    
                   <?php

            }else{
              if($receptor=="2") //actualizar
              {
          ?>
                <form id="formObtComp" autocomplete="off" method="post" action="gestionAcademica.php">
                               <div class="col s12 16 input-field">
                                  
                                </div>

                                <div class="col s12 l6 input-field">
                                     <i class="fa fa-tools fa prefix"></i>
                                     <label for="actPuObt">Actividad o Puesto:</label>
                                     <input type="text" id="actividad" name="actividad" data-validetta="required,number,minLength[8],maxLength[10]">

                                </div>

                                <div class="col s12 l6 input-field">
                                      <i class="fa fa-building fa prefix"></i>
                                      <label for="OrgObt">Instituci&oacute;n:</label>
                                      <input type="text" id="institucion" name="institucion" data-validetta="required,number,minLength[8],maxLength[10]">
                                </div>
                                <div class="col s12 16 input-field">
                                  
                                </div>


                                <div class="col s12 l6 input-field", class="row">
                                      <div class="row">
                                      <select class="browser-default" id="mesInicio" name="mesInicio" required>
                                      <option value="" disabled selected> Mes de inicio </option>
                                      <?=$objeto->traerSelectMeses($l)?>
                                      </select>
                                      </div>
                                </div>

                                <div class="col s12 l6 input-field">
                                      <i class="fas fa-calendar-plus prefix"></i>
                                      <label for="anioIni">A&ntilde;o de inicio: </label>
                                      <input type="text" id="anioInicio" name="anioInicio" data-validetta="required,number,Length[4]">
                                </div> 

                                <div class="col s12 16 input-field">
                                  
                                </div>

                                <div class="col s12 l6 input-field", class="row">
                                      <div class="row">
                                      <select class="browser-default" id="mesFin" name="mesFin" required>
                                          <option value="" disabled selected> Mes de t&eacute;rmino </option>
                                          <?=$objeto->traerSelectMeses($l)?>
                                       </select>
                                      </div>
                                </div>

                                

                                <div class="col s12 l6 input-field">
                                      <i class="fas fa-calendar-times prefix"></i>
                                      <label for="anioFin">A&ntilde;o de t&eacute;rmino: </label>
                                      <input type="text" id="anioFin" name="anioFin" data-validetta="required,number,minLength[8],maxLength[10]">
                                </div> 
                                  
                                <div class="col s2 16 input-field">
                                  
                                </div>

                                
                                <div class="col s12 8 input-field  ">
                                    <input type="submit" class="btn blue darken-3" style="width:100%;" value="Actualizar">
                                   
                                </div>
                                <div class="col s12 8 input-field ">
                                    <a href="./menu.html" class="btn red" style="width:100%;">CANCELAR</a>
                                </div>

                <input type="hidden" value="2" name="oculto">
                <input type="hidden" value=<?=$identificadorRegistro?> name="I" >                           
                        </form>        
                               
                         
          <?php
              }else{ //tabla para operaciones anteriores y eliminar
          ?>
                
                <a href='?v=1'>Agregar Gestion Acad&eacute;mica</a> <br>
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

<?php
include 'cAdministrador.php';
$obj = new cAdministrador();

$tablaProfesores = "";
$idUsuario = "";
$res  = "";
$a = "0";

$tablaProfesores = $obj->tablaProfesores();

$a = isset($_REQUEST["a"]) ? $_REQUEST["a"] : "0";
$idUsuario = isset($_REQUEST["Iu"]) ? $obj->decodificaURL($_REQUEST["Iu"]) : "";
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
                    <h2 class="blue-grey-text center-align">Hola Administrador!</h2>
                    <hr>
					
					<?=$res?>
					
             </div>
      </section>
    </header>
				<?php
					if($a == "0"){
				?>
				<h2>Profesores Registrados</h2>&nbsp;&nbsp;<input type="text" placeholder="Buscar..."></input>
						<?=$tablaProfesores?>
						
						
					<?php
					}else{
					?>

    <main>
        <section id="contenidos">
             <div class="container">
                <div class="row">
			
					<h2>si llega</h2>
					<br>
					<a href = "capacitacionDocente.php">Capacitaci&oacute;n Docente ok!</a>
					<br>
					<?=$idUsuario?>
					
					<a href="?a=0">Regresar</a>
					

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
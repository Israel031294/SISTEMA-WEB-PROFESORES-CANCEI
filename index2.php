<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="./assets/lib/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="./assets/lib/materialize/css/materialize.min.css" rel="stylesheet">
    <link href="./assets/js/validetta101/dist/validetta.min.css" rel="stylesheet">
    <link href="./assets/css/estilos.css" rel="stylesheet" >
    <link href="./assets/js/confirm334/dist/jquery-confirm.min.css" rel="stylesheet">
    <script src="./assets/js/jquery-3.4.1.min.js"></script>
    <script src="./assets/lib/materialize/js/materialize.min.js"></script>
    <script src="./assets/js/validetta101/dist/validetta.min.js"></script>
    <script src="./assets/js/validetta101/localization/validettaLang-es-ES.js"></script>
    <script src="./assets/js/confirm334/dist/jquery-confirm.min.js"></script>
    <script src="./assets/js/validar.js"></script>


</head>
<body>



<main>
        <section id="contenidos">
             <div class="container">
                <div class="row">
                <h1 class="blue-grey-text center-align">Acceso</h1>
				<div class="container">
				<p class="red darken-1 white-text text-white center-align s6 l6">holi</p>
			</div>
                <hr>
					
                        <form id="formObtComp" autocomplete="off" method="post" action="index.php">
                                
                            <div class="col s12 l6 input-field">
                               <i class="fa fa-at fa prefix"></i>
								<label for="correo">Correo electr&oacute;nico:</label>
								<input type="email"  id="correo" name="correo" data-validetta="required,email">
							</div>
							
							<div class="col s12 l6 input-field">
                               <i class="fa fa-key fa prefix"></i>
								<label for="clave">Contrase&ntilde;a:</label>
                                <input type="password" id="clave" name="clave" data-validetta="required">
                                <p>
                                    <label>
                                    <input type="checkbox" id="show">
                                    <span>Show Password</span>
                                    </label>
                                </p> 
                             </div>
							
							<div class="col s12 8 input-field  ">
								<input type="submit" class="btn blue darken-3" style="width:100%;" value="Iniciar sesi&oacute;n">
							</div>
							
                            <div class="col s6 m6 8 center-align">
                                    <a class="flow-text"  style="font-weight:bold"  href="servidor/crearCuenta.php"> Crear cuenta</a>
                                    
                             </div>

                            <div class="col s6 m6 8 center-align">
                                 <a class="flow-text"  style="font-weight:bold"  href="./recupera.php"> Recuperar Contrase&ntilde;a</a>
                             </div>
                                            
                               
                         </form>
					
                </div>
            </div>
         </section>      
    </main>

    
</body>
</html>
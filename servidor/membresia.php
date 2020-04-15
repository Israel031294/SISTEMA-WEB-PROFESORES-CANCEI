<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Membres&iacute;a</title>
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


<<body>
    <header>
      <section id="encabezado">
            <div class="container">
                    <h3 class="blue-grey-text center-align">Membres&iacute;a o participaci&oacute;n en Colegios, C&aacute;maras, asociaciones cient&iacute;ficas o alg&uacute;n otro tipo de organismo profesional</h3>
                   
                    <hr>
             </div>
      </section>
    </header>


    <main>
        <section id="contenidos">
             <div class="container">
                <div class="row">
                        <form id="formObtComp" autocomplete="off">
                               
                            
                                <div class="col s12 l6 input-field">
                                        <i class="fa fa-building fa prefix"></i>
                                        <label for="OrgObt">Organismo:</label>
                                        <input type="text" id="Org" name="Org" data-validetta="required,number,minLength[8],maxLength[10]">
                                  </div>

                                  <div class="col s12 l6 input-field">
                                        <i class="fa fa-calendar-alt fa prefix"></i>
                                        <label for="periodoObt">Periodo(a&ntilde;os):</label>
                                        <input type="text" id="periodo" name="periodo" data-validetta="required,number,minLength[8],maxLength[10]">
                                  </div>

                                  <div class="col s12 l6 input-field">
                                        <i class="fa fa-arrow-alt-circle-up fa prefix"></i>
                                        <label for="partObt">Nivel de participaci&oacute;n:</label>
                                        <input type="text" id="part" name="part" data-validetta="required,number,minLength[8],maxLength[10]">
                                  </div>


                                

                                
                                <div class="col s12 8 input-field  ">
                                    <input type="submit" class="btn blue darken-3" style="width:100%;" value="GUARDAR">
                                   
                                </div>
                                <div class="col s12 8 input-field ">
                                   
                                        <a href="./menu.html" class="btn red" style="width:100%;">CANCELAR</a>
                                </div>
                               
                                 
                             
                        </form>        
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
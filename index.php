 <!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8">
      <title>NuSOAP</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <!-- Compiled and minified jQuery -->
      <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
      <!-- Animate.css -->
      <link rel="stylesheet" href="lib/animate.min.css">
    <header>
        </style>
        <div class="row">
           <div class="navbar-fixed animated fadeInDown">
            <nav>
              <div class="nav-wrapper indigo">
                <span class="texto-navbar-responsive brand-logo center">Inicio - Servicio Web</span>
              </div>
            </nav>
           </div>
        </div>
    </header>


    <body class="grey lighten-3">

      <br><br>

      <div class="row">

        <!-- Form -->
        <form class="col s12" action="Consumidor.php" method="POST">
          <div class="row">

                <!-- Datos -->
                  <div class="col s12 m10 offset-m1">
                    <div class="card-panel animated fadeInDown">
                      <div class="row">

                        <!-- Nombre -->
                        <div class="input-field col m4">
                          <i class="material-icons prefix">account_circle</i>
                          <input id="nom" name="nom" type="text" required class="validate">
                          <label for="nom">Nombre</label>
                        </div>
                        <!-- Apellido P -->
                        <div class="input-field col m4">
                          <input id="ap" name="ap" type="text" required class="validate">
                          <label for="ap">Apellido Paterno</label>
                        </div>
                        <!-- Apellido M -->
                        <div class="input-field col m4">
                          <input id="am" name="am" type="text" required class="validate">
                          <label for="am">Apellido Materno</label>
                        </div>

                        <!-- Fecha de nacimiento -->
                        <div class="input-field col m4">
                          <i class="material-icons prefix">date_range</i>
                          <input id="icon_fnac" name="fena" required placeholder="Fecha de nacimiento"
                                  class="validate datepicker">
                        </div>

                        <!--Genero-->
                        <div class="input-field col s12 m4">
                          <select name="gene" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="H">MASCULINO</option>
                            <option value="M">FEMENINO</option>
                          </select>
                          <label>Género</label>
                        </div>

                        <!--Estado-->
                        <div class="input-field col s12 m4">
                          <select name="esta" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="AS">AGUASCALIENTES</option>
                            <option value="BC">BAJA CALIFORNIA NTE.</option>
                            <option value="BS">BAJA CALIFORNIA SUR</option>
                            <option value="CC">CAMPECHE</option>
                            <option value="CL">COAHUILA </option>
                            <option value="CM">COLIMA </option>
                            <option value="CS">CHIAPAS</option>
                            <option value="CH">CHIHUAHUA</option>
                            <option value="DF">DISTRITO FEDERAL</option>
                            <option value="DG">DURANGO</option>
                            <option value="GT">GUANAJUATO</option>
                            <option value="GR">GUERRERO</option>
                            <option value="HG">HIDALGO</option>
                            <option value="JC">JALISCO</option>
                            <option value="MC">MEXICO</option>
                             <option value="MN">MICHOACAN</option>
                            <option value="MS">MORELOS</option>
                            <option value="NT">NAYARIT</option>
                            <option value="NL">NUEVO LEON</option>
                            <option value="OC">OAXACA</option>
                            <option value="PL">PUEBLA</option>
                            <option value="QT">QUERETARO</option>
                            <option value="QR">QUINTANA ROO</option>
                            <option value="SP">SAN LUIS POTOSI</option>
                            <option value="SL">SINALOA</option>
                            <option value="SR">SONORA</option>
                            <option value="TC">TABASCO</option>
                            <option value="TS">TAMAULIPAS</option>
                            <option value="TL">TLAXCALA</option>
                            <option value="VZ">VERACRUZ</option>
                            <option value="YN">YUCATAN</option>
                            <option value="ZS">ZACATECAS</option>
                            <option value="SM">SERV. EXTERIOR MEXICANO </option>
                            <option value="NE">NACIDO EN EL EXTRANJERO </option> 
                          </select>
                          <label>Estado</label>
                        </div>

                      </div>
                    </div>
                  </div>

            <!-- Enviar -->
              <div class="col s12 m2 offset-m5 center animated fadeInUp">
                <button class="btn waves-effect waves-light blue" type="submit">Enviar
                  <i class="material-icons right">send</i>
                </button>
              </div>
            <!-- /Enviar -->

          </div>
        </form>
        <!-- /Form -->
      
      </div>


      <!-- Inicialización componentes -->
      <script type="text/javascript">
        $(document).ready(function(){


          // Ajustar el alto
          var altoTotal = $(window).height();
          $('body').height(altoTotal);

          // Elementos MD
          $('select').formSelect(); // Select

          $('.datepicker').datepicker({ // datepiker
            format: 'yymmdd', // Formato para SQL
            defaultDate: new Date(1990,1,1), // Fecha po defecto
            maxDate: new Date(2010,1,1), // Maximo año
            yearRange: [1960,2010], // Años a mostrar
            i18n: {
              cancel: 'Cancelar',
              done: 'Aceptar',
              months: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto',
                       'Septiembre','Octubre','Noviembre','Diciembre'],
              monthsShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
              weekdays: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
              weekdaysShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
              weekdaysAbbrev: ['D','L','M','M','J','V','S']
            },
            container: document.body // mostrar en body
          });


          // Parche tooltip required para el select
          $("select[required]").css({display: "inline", height: 0, padding: 0, width: 0});

        }); // acciones inicio
      </script>

      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     
    </body>
  </html>
        
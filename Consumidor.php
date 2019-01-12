<?php
require_once "lib/nusoap.php";

$cliente = new nusoap_client("http://localhost/NuSOAP/soapChido.php");

$paramCURP = array(
	'nom' => $_POST["nom"],
	'ap' => $_POST["ap"],
	'am' => $_POST["am"],
	'fena' => $_POST["fena"],
	'gene' => $_POST["gene"],
	'esta' => $_POST["esta"]
	);

$paramRFC = array(
	'nom' => $_POST["nom"],
	'ap' => $_POST["ap"],
	'am' => $_POST["am"],
	'fena' => $_POST["fena"]
	);

// Obteniendo información
$resCURP = $cliente->call("getCURP", $paramCURP);
$resRFC = $cliente->call("getRFC", $paramRFC);

$md5c = $cliente->call("getMDc", array('dato' => $resCURP));
$md5r = $cliente->call("getMDc", array('dato' => $resRFC));

?>

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
              <div class="nav-wrapper orange">
                <span class="texto-navbar-responsive brand-logo center">
                	Resultados de <?php 	echo $_POST["nom"] . " " .$_POST["ap"] . " " . $_POST["am"] ?>
                </span>
              </div>
            </nav>
           </div>
        </div>
    </header>


    <body class="grey lighten-3">

<br>
<br>
<br>

  <div class="row">

	    <div class="col s12 offset-m1 m5">
	      <div class="card green animated fadeInDown">
	        <div class="card-content white-text">
	          <span class="card-title center"><h4>CURP</h4></span>
	          <p>
	          	<h5 class="center">
	          		<?php echo $resCURP; ?>
	          	</h5>
	          </p>
		    </div>
		      <div class="card-action center">
		          <?php echo $md5c; ?>
		      </div>
		   </div>
	    </div>

	    <div class="col s12 m5">
	      <div class="card blue animated fadeInDown">
	        <div class="card-content white-text">
	          <span class="card-title center"><h4>RFC</h4></span>
	          <p>
	          	<h5 class="center">
	          		<?php echo $resRFC; ?>
	          	</h5>
	          </p>
		    </div>
		      <div class="card-action center">
		          <?php echo $md5r; ?>
		      </div>
		   </div>
	    </div>


	    <div class="col s12 offset-m4 m4">
	      <div class="card animated fadeInUp">
	        <div class="card-content white-text">
	          <span class="card-title center">
	          	<a href="index.php"><h5>Calcular uno nuevo</h5></a>
	          </span>
	          
		   </div>
	    </div>

  </div>

      <script type="text/javascript">

      	// Inicialización componentes
        $(document).ready(function(){

          $('.collapsible').collapsible();

        }); 
      </script>

      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     
    </body>
  </html>

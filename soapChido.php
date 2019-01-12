<?php
include_once "lib/nusoap.php";

// Creando el objeto del SOAP
$server = new soap_server();
$server->configureWSDL("webserv", "um:webserv");





// registrando getCURP
$server->register("getCURP",				// Función a llamar
			array(								// Tipo de datos que recibirá
				'nom' => 'xsd:string',
				'ap' => 'xsd:string',
				'am' => 'xsd:string',
				'fena' => 'xsd:string',
				'gene' => 'xsd:string',
				'esta' => 'xsd:string'
			),	
			array('return' => "xsd:string")		// Dato a Retornar
		);

// registrando getRFC
$server->register("getRFC",				// Función a llamar
			array(								// Tipo de datos que recibirá
				'nom' => 'xsd:string',
				'ap' => 'xsd:string',
				'am' => 'xsd:string',
				'fena' => 'xsd:string'
			),	
			array('return' => "xsd:string")		// Dato a Retornar
		);

// registrando getMD5
$server->register("getMDc",				// Función a llamar
			array(								// Tipo de datos que recibirá
				'dato' => 'xsd:string'
			),	
			array('return' => "xsd:string")		// Dato a Retornar
		);


	function getCURP($nom, $ap, $am, $fena, $gene, $esta){

		$vocales = array('A','E','I','O','U','a','e','i','o','u');
		$consonantes = array('b','c','d','f','g','h','j','k','l','m','n','ñ','p','q','r','s','t','u','v','w','x','y','z','B','C','D','F','G','H','J','K','L','M','N','Ñ','P','Q','R','S','T','U','V','W','X','Y','Z');

		$a = $ap{0};	// Primer caracter apellido paterno
		$b = array_shift(array_intersect(str_split($ap), $vocales)); // Primera vocal apellido paterno
		$c = $am{0};	// Primer caracter apellido materno
		$d = $nom{0};	// Primer caracter nombre
		$e = $fena;		// Fecha de nacimiento
		$f = $gene;		// sexo
		$g = $esta;		// estado
			$apx = substr($ap,1); // Omite el primer caracter del apellido paterno
		$h = array_shift(array_intersect(str_split($apx), $consonantes)); // Busca consonante interna apellido Paterno
			$amx = substr($am,1); // Omite el primer caracter del apellido materno
		$i = array_shift(array_intersect(str_split($amx), $consonantes)); // Busca consonante interna apellido Paterno
			$nomx = substr($nom,1); // Omite el primer caracter del nombre
		$j = array_shift(array_intersect(str_split($nomx), $consonantes)); // Busca consonante interna nombre

		$k = "**";

		$curp = strtoupper($a.$b.$c.$d.$e.$f.$g.$h.$i.$j.$k);

		return $curp;
	}



	function getRFC($nom, $ap, $am, $fena){

		$a = $ap{0};	// Primer caracter apellido paterno
		$b = $ap{1};	// Segundo caracter apellido paterno
		$c = $am{0};	// Primer caracter apellido materno
		$d = $nom{0};	// Primer caracter nombre
		$e = $fena;		// Fecha de nacimiento
		$f = "***";

		$rfc = strtoupper($a.$b.$c.$d.$e.$f);

		return $rfc;
	}



	function getMDc($dato){

		$md5 = md5($dato);

		return $md5;
	}



	// Validando los datos que vienen desde POST
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	// Ejecutar lo que se envia
	@$server->service(file_get_contents("php://input"));

?>
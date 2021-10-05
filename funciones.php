<?php
//Declaramos variables globales
	session_start();
	if( empty($_SESSION['error_login']) ) { $_SESSION['error_login'] = false; }
	if( empty($_SESSION['usuario']) ) { $_SESSION['usuario'] = ''; }
	if( empty($_SESSION['rol']) ) { $_SESSION['rol'] = ''; }

	function base_url($url){
		return 'http://localhost:8080/final_domotica/'.$url;
	}
?>
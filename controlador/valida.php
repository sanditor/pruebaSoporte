<?php
session_start();
include("../modelo/validarlogin.php");
class validacion{

    function validando(){

        $cod=$_REQUEST[codigo];
        $cla=$_REQUEST[clave];

		$vali=new ValidarEntrada();
		$vali->validar($cod, $cla);
		
    }

}
$val=new validacion();
$val->validando();
?>
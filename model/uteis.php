<?php 

session_start();

function estaLogado() {
	
	if (
	           
        isset($_SESSION['cod_prof']) && trim(isset($SESSION['cod_prof'])) &&
        isset($_SESSION['nome']) && trim(isset($valido['nome'])) &&
        isset($_SESSION['email']) && trim(isset($valido['email'])) &&
        isset($_SESSION['usuario']) && trim(isset($valido['usuario'])) &&
        isset($_SESSION['senha']) && trim(isset($valido['senha']))
    
    )
        return true;
    else
        return false;
}

?>
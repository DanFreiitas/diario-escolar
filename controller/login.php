<?php

include '../model/login.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $valido = validarLogin($_POST);
    
    if (is_array($valido)) {

        // login
        session_start();
        $_SESSION['cod_prof'] = $valido['cod_prof'];
        $_SESSION['nome'] = $valido['nome'];
        $_SESSION['email'] = $valido['email'];
        $_SESSION['usuario'] = $valido['usuario'];
        $_SESSION['senha'] = $valido['senha'];
        
        header('Location: ../view/dashboard.php');
        exit;
           
    } else {
        header('Location: ../index.php?pagina=login&erro=' . $valido);
        exit;
    }
    
} else {
    header('Location: ../index.php');
    exit;
}
?>
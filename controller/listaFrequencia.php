<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../model/listarTurma.php';
    
    $resultado = listaFrequencia($_POST);
    
    if($resultado) {
        echo 'Frequencia registrada ';

    } else {
        echo 'FUDEU!';

    }

    /*$valido = validarCadastro($_POST);

    if ($valido) {
        
    } else {
        
    }*/
} else {
    header('Location: ../index.php');
    exit;
}
?>
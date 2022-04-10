<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../model/processar.php';

    $resultado = cadFrequencia($_POST);

    if ($resultado) {
        header('Location: ../view/dashboard.php?pagina=sucess');
       

    } else {
        echo 'Falhou!';
    }

    /* $valido = validarCadastro($_POST);

      if ($valido) {

      } else {

      } */
} else {
    header('Location: ../index.php');
    exit;
}
?>
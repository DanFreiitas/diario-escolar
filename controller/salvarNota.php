<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../model/aluno.php';
    
    $dados = salvarNota($_POST);
    
    header('Location: ../view/dashboard.php?pagina=sucess');

   
}  else {
    header('Location: ../index.php');
    exit;
}

?>
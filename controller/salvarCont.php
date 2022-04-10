<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../model/alunoCont.php';
    
    $dados = salvarCont($_POST);
   
}

?>
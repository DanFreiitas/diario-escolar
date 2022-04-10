<?php

if (isset($_GET['pagina']) && $pagina = trim($_GET['pagina'])) {
    $filename = '../view/' .$pagina. '.php';
    if(file_exists($filename)) {
        include '../view/' .$pagina. '.php';
    }else {
        include '404.php';
    }
}else {
    include 'home.php';
}










?>
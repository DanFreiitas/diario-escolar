<?php

function salvarCont($conteudo) {
    include '../model/config.php';


    $sql = 'INSERT INTO conteudo (cod_horario, desc_cont, data_cont, cod_disc, bim)'
            . 'VALUES ('
            . "'" . $_POST['horarioCont'] . "',"
            . "'" . $_POST['conteudo'] . "',"
            . "'" . $_POST['dataCont'] . "',"
            . "'" . $_POST['disciplinaCont'] . "',"
            . "'" . $_POST['bimestreCont'] . "'"
            . ')';

    //print_r($sql);
    //exit;
    mysqli_query($conexao, $sql);
}

?>
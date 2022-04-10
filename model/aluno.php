<?php

function salvarNota($avaliacao) {
    include '../model/config.php';

    //print_r($avaliacao);
    //exit;
    
    foreach ($avaliacao["nota1"] as $cod_aluno => $nota) {

        $sql = 'INSERT INTO avaliacao (tp_aval, dt_aval, bim, aval_1, aval_2, cod_aluno, cod_horario)'
                . 'VALUES ('
                . "'" . $_POST['avalNota'] . "',"
                . "'" . $_POST['dataNota'] . "',"
                . "'" . $_POST['bimestreNota'] . "',"
                . "'" . $nota . "',"
                . "'" . $avaliacao["nota2"][$cod_aluno] . "',"
                . "'" . $cod_aluno . "',"
                . "'" . $_POST['horarioNota'] . "'"
                . ')';
        
        mysqli_query($conexao, $sql);
    }
}

?>
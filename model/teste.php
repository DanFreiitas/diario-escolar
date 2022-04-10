<?php

function selecionarTurma($turma) {
    include './conexao.php';
    $sql =  'SELECT nome_turma FROM turma';
    $turma = mysqli_query($conexao, $sql);
    
}
?>
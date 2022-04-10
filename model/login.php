<?php

function validarLogin($login) {
    $email = isset($login['email']) && trim($login['email']) ? trim($login['email']) : null;
    $senha = isset($login['senha']) && trim($login['senha']) ? trim($login['senha']) : null;

    if ($email && $senha) { 
        include '../model/config.php';
        $sql = "SELECT * FROM professor WHERE "
                . "email = '" . addslashes($login['email']) . "' AND "
                . "senha = '" . sha1($login['senha']) . "'";

        $resultado = mysqli_query($conexao, $sql);
        

        if (mysqli_num_rows($resultado) == 1)
            return mysqli_fetch_assoc($resultado);
        else
            return 'invalido';
    } else
        return 'obrigatorio';
}
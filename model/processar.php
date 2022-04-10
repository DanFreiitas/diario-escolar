<?php

if (!isset($_POST['turma']) || (!trim($_POST['turma']))) {
    header('Location: index.php?erro=turma');
    exit;
}

function cadFrequencia($result) {
  
    include 'config.php';
    
    foreach ($result['presenca'] as $idx => $value) {
        
        $sql = "INSERT INTO frequencia (`data`, `bim`, `cod_aluno`, `cod_horario`, `status_frequencia`) VALUES (";
        $sql .="'".$result['data']."','" .$result['bimestre']."','" .$idx."','" .$result['horario']."','" .$value."')";

     if(!mysqli_query($conexao, $sql))
         return false;
       
    }
    return true;
    
}
                         
    


/*
function validarCadastro($dados) {
    //if(!isset($dados['turma']) || (!$turma = trim($dados['turma'])))

    if (!isset($dados['nome']) || (!$nome = trim($dados['nome']))) {
        header('Location: index.php?erro=nome');
        exit;
    }

    if (isset($dados['email']) && trim($dados['email'])) {
        $email = trim($dados['email']);
        // CONSTANTE EM LETRA MAIÚSCULA E NÃO TEM DÓLAR NA FRENTE
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
            header('Location: index.php?erro=emailinvalido');
            exit;
        }
    } else {
        header('Location: index.php?erro=email');
        exit;
    }

    if (!isset($dados['senha']) || (!$senha = trim($dados['senha']))) {
        header('Location: index.php?erro=senha');
        exit;
    } else {
        if (strlen($senha) < 6) {
            header('Location: index.php?erro=senhainvalida');
            exit;
        }
    }

    if (isset($dados['cpf']) && ($cpf = trim($dados['cpf']))) {
        if (strlen($cpf) != 11) {
            header('Location: index.php?erro=cpfinvalido');
            exit;
        }
    } else {
        header('Location: index.php?erro=cpf');
        exit;
    }

    if (!isset($dados['nascimento']) || (!$nascimento = trim($dados['nascimento']))) {
        header('Location: index.php?erro=nascimento');
        exit;
    }

    if (!isset($dados['estadocivil']) || (!$estadocivil = trim($dados['estadocivil']))) {
        header('Location: index.php?erro=estadocivil');
        exit;
    }

    if (!isset($dados['endereco']) || (!$endereco = trim($dados['endereco']))) {
        header('Location: index.php?erro=endereco');
        exit;
    }
}
*/
?>

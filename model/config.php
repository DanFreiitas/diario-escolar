<?php
$connect = 'localhost'; 	// conexão local 
$user = 'root'; 			// usuário do banco de dados
$senha = ''; 		// senha do banco de dados
$db = 'diario_escolar';		 // db_banks

$conexao = mysqli_connect($connect, $user, $senha, $db);

mysqli_set_charset($conexao, 'utf8');

if (!$conexao) {
    header('Location: index.php?pagina=error500');
    exit;
}
//-----------------------------------------------------------------
$title = 'Diário online'; // Titulo do sited
$scool = 'Escola Técnica Estadual Oscar Tenório - ETEOT'; // Nome nav superior 



<?php
include 'config.php';


$sql_1 = 'SELECT * FROM aluno';
$totalAlunos = mysqli_num_rows(mysqli_query($conexao, $sql_1));

$sql_2 = 'SELECT * FROM turma';
$totalTurmas = mysqli_num_rows(mysqli_query($conexao, $sql_2));

$sql_3 = 'SELECT * FROM disciplina';
$totalDisciplinas = mysqli_num_rows(mysqli_query($conexao, $sql_3));

$sql_4 = "SELECT * FROM aluno WHERE situ_aca = 'A'";
$alunoAtivo = mysqli_num_rows(mysqli_query($conexao, $sql_4));

$sql_5 = "SELECT * FROM aluno WHERE situ_aca = 'D'";
$alunoInativo = mysqli_num_rows(mysqli_query($conexao, $sql_5));

$sql_6 = "SELECT * FROM turma WHERE ativa = 'S'";
$turmaAtiva = mysqli_num_rows(mysqli_query($conexao, $sql_6));

$sql_7 = "SELECT * FROM turma WHERE ativa = 'N'";
$turmaInativa = mysqli_num_rows(mysqli_query($conexao, $sql_7));

?>
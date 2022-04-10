<!DOCTYPE html>
<html>
    <head>
        <title>Template</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body> 
        <?php
        include '../model/config.php';
        ?>
        <div id="main" class="container-fluid">
            <h3 class="page-header"> Filtrar alunos</h3>
            <!-- INICIO FORM -->
            <form method="post" action="../controller/salvarNota.php">
                <div class="row">
                    <!-- INICIO SELECT TURMA  -->
                    <div class="form-group col-md-2">
                        <label for="turmaNota">Turma:</label>
                        <select id="turmaNota" class="form-control" name="turmaNota">
                            <option></option>
                            <?php
                            $nome_turma = "SELECT turma.nome_turma FROM horario, turma WHERE horario.id_turma = turma.id_turma AND horario.cod_prof = " . $_SESSION['cod_prof'] . " GROUP BY nome_turma;";
                            $resultado_turma = mysqli_query($conexao, $nome_turma);
                            while ($linhas_turma = mysqli_fetch_assoc($resultado_turma)):
                                ?>
                                <?php if (isset($_GET['turmaNota']) && trim($_GET['turmaNota']) == $linhas_turma['nome_turma']): ?>
                                    <option value="<?php echo $linhas_turma['nome_turma']; ?>" selected><?php echo $linhas_turma['nome_turma']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $linhas_turma['nome_turma']; ?>"><?php echo $linhas_turma['nome_turma']; ?></option>
                                <?php endif; ?>                               }
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <!-- FIM SELECT TURMA  -->
                    <hr/>
                    <div id="actions" class="row">
                        <div class="col-md-12">
                            <button type="submit" id="botaoNota" class="btn btn-primary">Salvar</button>
                            <a href="index.html" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>
            </form>
        </div>
        <!-- FIM FORM -->
        <!-- INICIO FOOTER -->
        <footer class="text-center">Todos os direitos reservados</footer>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <!-- FIM FOOTER -->
    </body>
</html>
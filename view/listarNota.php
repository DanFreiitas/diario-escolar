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

                <!-- INICIO DIV'S SELECT -->
                <div class="row">

                    <!-- INICIO SELECT TURMA  -->
                    <div class="form-group col-md-2">
                        <label for="turmaLNota">Turma:</label>
                        <select id="turmaLNota" class="form-control p-4" name="turmLNota">
                            <option></option>
                            <?php
                            $nome_turma = "SELECT turma.nome_turma, turma.id_turma FROM horario, turma WHERE horario.id_turma = turma.id_turma AND horario.cod_prof = " . $_SESSION['cod_prof'] . " GROUP BY nome_turma;";
                            $resultado_turma = mysqli_query($conexao, $nome_turma);
                            while ($linhas_turma = mysqli_fetch_assoc($resultado_turma)):
                                ?>
                                <?php if (isset($_GET['turmaLNota']) && trim($_GET['turmaLNota']) == $linhas_turma['id_turma']): ?>
                                    <option value="<?php echo $linhas_turma['id_turma']; ?>" selected><?php echo $linhas_turma['nome_turma']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $linhas_turma['id_turma']; ?>"><?php echo $linhas_turma['nome_turma']; ?></option>
                                <?php endif; ?>                               
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <!-- FIM SELECT TURMA  -->

                    <!-- INICIO INPUT DATA -->
                    <?php if (isset($_GET['turmaLNota']) && trim($_GET['turmaLNota'])): ?>
                        <div class="form-group col-md-2">
                            <label for="dataLNota">Data:</label>
                            <input type="date" id="dataLNota" class="form-control" name="dataLNota" value="<?php echo isset($_GET['dataLNota']) && trim($_GET['dataLNota']) ? $_GET['dataLNota'] : '' ?>">
                        </div>
                    <?php endif; ?>
                    <!-- FIM INPUT DATA -->

                    <!-- INICIO SELECT DA DISCIPLINA -->
                    <?php if (isset($_GET['dataLNota']) && trim($_GET['dataLNota'])): ?>
                        <div class="form-group col-md-2">
                            <label for="disciplinaLNota">Discipina:</label>
                            <select id="disciplinaLNota" class="form-control p-4" name="disciplinaLNota">
                                <option></option>
                                <?php
                                $nome_disciplina = "SELECT distinct d.nome_disc, d.cod_disc  
                                                    FROM horario h 
                                                    JOIN disciplina d 
                                                    ON h.cod_disc = d.cod_disc 
                                                    join turma t on t.id_turma = h.id_turma
                                                    WHERE cod_prof =" . $_SESSION['cod_prof'] . " AND t.id_turma =" . $_GET['turmaLNota'];

                                $resultado_disciplina = mysqli_query($conexao, $nome_disciplina);
                                while ($linhas_disciplina = mysqli_fetch_assoc($resultado_disciplina)):
                                    ?>
                                    <?php if (isset($_GET['disciplinaLNota']) && trim($_GET['disciplinaLNota']) == $linhas_disciplina['cod_disc']): ?>
                                        <option value="<?php echo $linhas_disciplina['cod_disc']; ?>" selected><?php echo $linhas_disciplina['nome_disc']; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $linhas_disciplina['cod_disc']; ?>"><?php echo $linhas_disciplina['nome_disc']; ?></option>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </select>
                        <?php endif; ?>
                    </div>
                    <!-- FIM SELECT DISCIPLINA -->

                </div>
                <!-- FIM DIV'S SELECT -->

                <!-- INICIO LISTA NOTA -->
                <?php if (isset($_GET['disciplinaLNota']) && trim($_GET['disciplinaLNota'])): ?>
                    <?php
                    $sql = "SELECT DISTINCT av.tp_aval, av.dt_aval, av.aval_1, av.aval_2, a.nome, a.cod_aluno, t.nome_turma, d.nome_disc ";
                    $sql .= "FROM avaliacao av, aluno a, turma t, disciplina d, horario h ";
                    $sql .= "WHERE av.cod_aluno = a.cod_aluno ";
                    $sql .= "AND h.cod_disc = d.cod_disc ";
                    $sql .= "AND h.id_turma = t.id_turma ";
                    $sql .= "AND h.cod_horario = av.cod_horario ";
                    $sql .= "AND av.dt_aval = '" . $_GET['dataLNota'] . "' ";
                    $sql .= "AND t.id_turma =" . $_GET['turmaLNota'] . " ";
                    $sql .= "AND h.cod_prof =" . $_SESSION['cod_prof'] . " ;";

                    $lista_nota = mysqli_query($conexao, $sql);
                    //print_r($sql);
                    //exit;
                    ?>
                    <?php if (mysqli_num_rows($lista_nota) > 0): ?>
                        <!-- PARTE VISÍVEL SOMENTE PARA IMPRESSAO -->
                        <div id="impressao">
                            <div class="row">
                                <img src="img/logo.png" class="mx-auto">
                            </div>
                            <p class="h4"><?php echo $scool; ?></p>
                            <p class="h4">Professor: <?php echo $_SESSION['nome']; ?></p>
                            <p class="h4">Disciplina: <?php echo $_POST['nome_disc']; ?></p>
                            <p class="h4">Turma: <?php echo $_POST['nome_turma']; ?></p>
                            <p class="h4">Turma: <?php echo $_POST['bimestre'] . 'º' ?></p>
                            <p ></p>
                        </div>
                        <!-- FIM DA PARTE VISÍVEL SOMENTE A IMPRESSAO -->
                        <div id="list" class="row">
                            <div class="table-responsive col-md-12 table-hover">
                                <table class="table table-striped table-bordered" cellspacing="0" cellpedding="0">
        <!--                                    <thead>
                                        <//?php while ($cliente = mysqli_fetch_assoc($lista_nota)): ?>
                                            <tr>
                                                <th><//?php echo $cliente['nome_turma']; ?></th>
                                                <th><//?php echo $cliente['nome_disc']; ?></th>
                                                <th><//?php echo $cliente['dt_aval']; ?></th>
                                            </tr>
                                        </thead>-->
                                    <thead class="text-white">
                                        <tr>
                                            <th>Matricula</th>
                                            <th>Nome do aluno</th>
                                            <th>Nota 1</th>
                                            <th>Nota 2</th>
                                        </tr>
                                    </thead>
                                    <?php while ($cliente = mysqli_fetch_assoc($lista_nota)): ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $cliente['cod_aluno']; ?></td>
                                                <td><?php echo $cliente['nome']; ?></td>
                                                <td><?php echo $cliente['aval_1']; ?></td>
                                                <td><?php echo $cliente['aval_2']; ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                        <?php // endwhile; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- FIM LISTA NOTA -->

                <hr/>

                <div id="actions" class="row">
                    <div class="col-md-12">
                        <button type="submit" id="botaoNota" class="btn btn-primary">Salvar</button>
                        <a href="#" class="btn btn-danger" onclick="window.print()">Imprimir</a>
                    </div>
                </div>
            </form>
            <!-- FIM FORM -->

            <!-- INICIO FOOTER -->
            <footer class="text-center">Todos os direitos reservados</footer>
            <script src="../js/jquery-3.2.1.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <!-- FIM FOOTER -->
    </body>
</html>
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
            <h3 class="page-header">Filtrar alunos</h3>
            <!-- INICIO FORM -->
            <form method="post" action="../controller/salvarCont.php">

                <!-- INICIO DIV'S SELECT -->
                <div class="row">

                    <!-- INICIO SELECT TURMA  -->
                    <div class="form-group col-md-2">
                        <label for="turmaLCont">Turma:</label>
                        <select id="turmaLCont" class="form-control p-4" name="turmaLCont">
                            <option></option>
                            <?php
                            $nome_turma = "SELECT turma.nome_turma, turma.id_turma FROM horario, turma WHERE horario.id_turma = turma.id_turma AND horario.cod_prof = " . $_SESSION['cod_prof'] . " GROUP BY nome_turma;";
                            $resultado_turma = mysqli_query($conexao, $nome_turma);
                            while ($linhas_turma = mysqli_fetch_assoc($resultado_turma)):
                                ?>
                                <?php if (isset($_GET['turmaLCont']) && trim($_GET['turmaLCont']) == $linhas_turma['id_turma']): ?>
                                    <option value="<?php echo $linhas_turma['id_turma']; ?>" selected><?php echo $linhas_turma['nome_turma']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $linhas_turma['id_turma']; ?>"><?php echo $linhas_turma['nome_turma']; ?></option>
                                <?php endif; ?>                               }
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <!-- FIM SELECT TURMA  -->

                    <!-- INICIO INPUT DATA -->
                    <?php if (isset($_GET['turmaLCont']) && trim($_GET['turmaLCont'])): ?>
                        <div class="form-group col-md-2">
                            <label for="dataLCont">Data:</label>
                            <input type="date" id="dataLCont" class="form-control p-4" name="dataLCont" value="<?php echo isset($_GET['dataLCont']) && trim($_GET['dataLCont']) ? $_GET['dataLCont'] : '' ?>">
                        </div>
                    <?php endif; ?>
                    <!-- FIM INPUT DATA -->

                    <!-- INICIO SELECT DA DISCIPLINA -->
                    <?php if (isset($_GET['dataLCont']) && trim($_GET['dataLCont'])): ?>
                        <div class="form-group col-md-3">
                            <label for="disciplinaLCont">Discipina:</label>
                            <select id="disciplinaLCont" class="form-control p-4" name="disciplinaLCont">
                                <option></option>
                                <?php
                                $nome_disciplina = "SELECT distinct d.nome_disc, d.cod_disc  
                                                    FROM horario h 
                                                    JOIN disciplina d 
                                                    ON h.cod_disc = d.cod_disc 
                                                    join turma t on t.id_turma = h.id_turma
                                                    WHERE cod_prof =" . $_SESSION['cod_prof'] . " AND t.id_turma =" . $_GET['turmaLCont'];

                                $resultado_disciplina = mysqli_query($conexao, $nome_disciplina);
                                while ($linhas_disciplina = mysqli_fetch_assoc($resultado_disciplina)):
                                    ?>
                                    <?php if (isset($_GET['disciplinaLCont']) && trim($_GET['disciplinaLCont']) == $linhas_disciplina['cod_disc']): ?>
                                        <option value="<?php echo $linhas_disciplina['cod_disc']; ?>" selected><?php echo $linhas_disciplina['nome_disc']; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $linhas_disciplina['cod_disc']; ?>"><?php echo $linhas_disciplina['nome_disc']; ?></option>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </select>
                        <?php endif; ?>
                    </div>
                    <!-- FIM SELECT DISCIPLINA -->

                    <!-- SELECT DA HORÁRIO -->
                    <?php if (isset($_GET['disciplinaLCont']) && trim($_GET['disciplinaLCont'])): ?>
                        <div class="form-group col-md-2">
                            <label for="horarioLCont">Horário:</label>
                            <select id="horarioLCont" class="form-control p-4" name="horarioLCont">
                                <option></option>
                                <?php
                                $nome_horario = "SELECT distinct h.cod_horario, h.hora_ini, h.dia_semana, h.hora_fim 
                                                    FROM horario h 
                                                    JOIN disciplina d 
                                                    ON h.cod_disc = d.cod_disc 
                                                    join turma t on t.id_turma = h.id_turma
                                                    WHERE cod_prof =" . $_SESSION['cod_prof'] . " AND t.id_turma =" . $_GET['turmaLCont'] . ' AND h.cod_disc=' . $_GET['disciplinaLCont'];

                                $resultado_horario = mysqli_query($conexao, $nome_horario);
                                while ($horarios = mysqli_fetch_assoc($resultado_horario)):
                                    ?>
                                    <?php if (isset($_GET['horarioLCont']) && trim($_GET['horarioLCont']) == $horarios['cod_horario']): ?>
                                        <option value="<?php echo $horarios['cod_horario']; ?>" selected><?php echo $horarios['dia_semana'] . ' ' . $horarios['hora_ini'] . ' à ' . $horarios['hora_fim']; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $horarios['cod_horario']; ?>"><?php echo $horarios['dia_semana'] . ' ' . $horarios['hora_ini'] . ' à ' . $horarios['hora_fim']; ?></option>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <!-- FIM SELECT HORÁRIO -->

                    <!-- INICIO SELECT BIMESTRE 1 -->
                    <?php if (isset($_GET['horarioLCont']) && trim($_GET['horarioLCont'])): ?>
                        <div class="form-group col-md-2">
                            <label for="bimestreLCont">Bimestre:</label>
                            <select id="bimestreLCont" class="form-control p-4" name="bimestreLCont">
                                <option></option>
                                <?php if (isset($_GET['bimestreLCont']) && trim($_GET['bimestreLCont']) == 1): ?>
                                    <option value="1" selected>1°bimestre</option>
                                <?php else: ?>
                                    <option value="1">1°bimestre</option>
                                <?php endif; ?>
                                <?php if (isset($_GET['bimestreLCont']) && trim($_GET['bimestreLCont']) == 2): ?>
                                    <option value="2" selected>2°bimestre</option>
                                <?php else: ?>
                                    <option value="2">2°bimestre</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    <?php endif ?>
                    <!-- FIM SELECT BIMESTRE 1 -->

                </div>
                <!-- FIM DIV'S SELECT -->
                <?php if (isset($_GET['bimestreLCont']) && trim($_GET['bimestreLCont'])): ?>
                    <div class="row">
                        <?php
                        $sql = "SELECT DISTINCT c.desc_cont, c.data_cont , d.nome_disc ";
                        $sql .= "FROM conteudo c, horario h, professor p, turma t, disciplina d ";
                        $sql .= "WHERE c.cod_horario = h.cod_horario ";
                        $sql .= "AND h.cod_prof = p.cod_prof ";
                        $sql .= "AND h.id_turma = t.id_turma ";
                        $sql .= "AND h.cod_disc = d.cod_disc ";
                        $sql .= "AND t.id_turma =" . $_GET['turmaLCont'] . " ";
                        $sql .= "AND d.cod_disc =" . $_GET['disciplinaLCont'] . " ";
                        $sql .= "AND h.cod_prof =" . $_SESSION['cod_prof'] . " ;";

                        $lista_cont = mysqli_query($conexao, $sql);

                        //print_r($sql);
                        //exit;
                        ?>

                        <!-- INICIO TABLE 1 -->
                        <?php if (mysqli_num_rows($lista_cont) > 0): ?>
                            <div id="list" class="row">
                                <div class="table-responsive col-md-12 table-hover">
                                    <table class="table table-striped table-sm" cellspacing="0" cellpedding="0">
                                        <thead>
                                            <tr>
                                                <th>Conteúdo</th>
                                                <th>Data</th>
                                                <th>Disciplina</th>
                                            </tr>
                                        </thead>
                                        <?php while ($cliente = mysqli_fetch_assoc($lista_cont)): ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $cliente['desc_cont']; ?></td>
                                                    <td><?php echo $cliente['data_cont']; ?></td>
                                                    <td><?php echo $cliente['nome_disc']; ?></td>
                                                </tr>
                                            </tbody>
                                        <?php endwhile; ?>
                                    </table>
                                </div>
                            </div>
                        <?php endif; ?> 
                    <?php endif; ?> 
                </div>
                <!-- FIM TABLE 1-->

                <hr/>

                <div id="actions" class="row">
                    <div class="col-md-12">
                        <button type="submit" id="botaoNota" class="btn btn-primary ml-4">Salvar</button>
                        <a href="index.html" class="btn btn-default">Cancelar</a>
                    </div>
                </div>
            </form>
            <!-- FIM FORM -->

            <!-- INICIO FOOTER -->
            <script src="../js/jquery-3.2.1.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <!-- FIM FOOTER -->
    </body>
</html>
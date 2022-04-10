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
            <h3 class="page-header">Adicionar conteúdo</h3>
            <!-- INICIO FORM -->
            <form method="post" action="../controller/salvarCont.php">

                <!-- INICIO DIV'S SELECT -->
                <div class="row">

                    <!-- INICIO SELECT TURMA  -->
                    <div class="form-group col-md-2">
                        <label for="turmaCont">Turma:</label>
                        <select id="turmaCont" class="form-control p-4" name="turmaCont">
                            <option></option>
                            <?php
                            $nome_turma = "SELECT turma.nome_turma, turma.id_turma FROM horario, turma WHERE horario.id_turma = turma.id_turma AND horario.cod_prof = " . $_SESSION['cod_prof'] . " GROUP BY nome_turma;";
                            $resultado_turma = mysqli_query($conexao, $nome_turma);
                            while ($linhas_turma = mysqli_fetch_assoc($resultado_turma)):
                                ?>
                                <?php if (isset($_GET['turmaCont']) && trim($_GET['turmaCont']) == $linhas_turma['id_turma']): ?>
                                    <option value="<?php echo $linhas_turma['id_turma']; ?>" selected><?php echo $linhas_turma['nome_turma']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $linhas_turma['id_turma']; ?>"><?php echo $linhas_turma['nome_turma']; ?></option>
                                <?php endif; ?>                               }
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <!-- FIM SELECT TURMA  -->

                    <!-- INICIO INPUT DATA -->
                    <?php if (isset($_GET['turmaCont']) && trim($_GET['turmaCont'])): ?>
                        <div class="form-group col-md-2">
                            <label for="dataCont">Data:</label>
                            <input type="date" id="dataCont" class="form-control" name="dataCont" value="<?php echo isset($_GET['dataCont']) && trim($_GET['dataCont']) ? $_GET['dataCont'] : '' ?>">
                        </div>
                    <?php endif; ?>
                    <!-- FIM INPUT DATA -->

                    <!-- INICIO SELECT DA DISCIPLINA -->
                    <?php if (isset($_GET['dataCont']) && trim($_GET['dataCont'])): ?>
                        <div class="form-group col-md-2">
                            <label for="disciplinaCont">Discipina:</label>
                            <select id="disciplinaCont" class="form-control p-4" name="disciplinaCont">
                                <option></option>
                                <?php
                                $nome_disciplina = "SELECT distinct d.nome_disc, d.cod_disc  
                                                    FROM horario h 
                                                    JOIN disciplina d 
                                                    ON h.cod_disc = d.cod_disc 
                                                    join turma t on t.id_turma = h.id_turma
                                                    WHERE cod_prof =" . $_SESSION['cod_prof'] . " AND t.id_turma =" . $_GET['turmaCont'];

                                $resultado_disciplina = mysqli_query($conexao, $nome_disciplina);
                                while ($linhas_disciplina = mysqli_fetch_assoc($resultado_disciplina)):
                                    ?>
                                    <?php if (isset($_GET['disciplinaCont']) && trim($_GET['disciplinaCont']) == $linhas_disciplina['cod_disc']): ?>
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
                    <?php if (isset($_GET['disciplinaCont']) && trim($_GET['disciplinaCont'])): ?>
                        <div class="form-group col-md-2">
                            <label for="horarioCont">Horário:</label>
                            <select id="horarioCont" class="form-control p-4" name="horarioCont">
                                <option></option>
                                <?php
                                $nome_horario = "SELECT distinct h.cod_horario, h.hora_ini, h.dia_semana, h.hora_fim 
                                                    FROM horario h 
                                                    JOIN disciplina d 
                                                    ON h.cod_disc = d.cod_disc 
                                                    join turma t on t.id_turma = h.id_turma
                                                    WHERE cod_prof =" . $_SESSION['cod_prof'] . " AND t.id_turma =" . $_GET['turmaCont'] . ' AND h.cod_disc=' . $_GET['disciplinaCont'];

                                $resultado_horario = mysqli_query($conexao, $nome_horario);
                                while ($horarios = mysqli_fetch_assoc($resultado_horario)):
                                    ?>
                                    <?php if (isset($_GET['horarioCont']) && trim($_GET['horarioCont']) == $horarios['cod_horario']): ?>
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
                    <?php if (isset($_GET['horarioCont']) && trim($_GET['horarioCont'])): ?>
                        <div class="form-group col-md-2">
                            <label for="bimestreCont">Bimestre:</label>
                            <select id="bimestreCont" class="form-control p-4" name="bimestreCont">
                                <option></option>
                                <?php if (isset($_GET['bimestreCont']) && trim($_GET['bimestreCont']) == 1): ?>
                                    <option value="1" selected>1°bimestre</option>
                                <?php else: ?>
                                    <option value="1">1°bimestre</option>
                                <?php endif; ?>
                                <?php if (isset($_GET['bimestreCont']) && trim($_GET['bimestreCont']) == 2): ?>
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
                <?php if (isset($_GET['bimestreCont']) && trim($_GET['bimestreCont'])): ?>
                    <div class="row">
                        <?php
                        $sql = "SELECT DISTINCT c.desc_cont, c.data_cont , d.nome_disc ";
                        $sql .= "FROM conteudo c, horario h, professor p, turma t, disciplina d ";
                        $sql .= "WHERE c.cod_horario = h.cod_horario ";
                        $sql .= "AND h.cod_prof = p.cod_prof ";
                        $sql .= "AND h.id_turma = t.id_turma ";
                        $sql .= "AND h.cod_disc = d.cod_disc ";
                        $sql .= "AND t.id_turma =" . $_GET['turmaCont'] . " ";
                        $sql .= "AND d.cod_disc =" . $_GET['disciplinaCont'] . " ";
                        $sql .= "AND h.cod_prof =" . $_SESSION['cod_prof'] . " ;";

                        $lista_cont = mysqli_query($conexao, $sql);

                        //print_r($sql);
                        //exit;
                        ?>

                        <!-- INICIO TABLE 1 -->
                        <div class="input-group ml-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Conteúdo</span>
                            </div>
                            <textarea class="form-control col-md-5" aria-label="With textarea"></textarea>
                        </div>
                            <button class="btn btn-primary ml-4 mt-3 mb-5">Adicionar</button>
                    </div>
                <?php endif ?>
                <div class="row">
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <thead class="text-white">
                            <tr>
                                <th class="col-md-1">Data</th>
                                <th class="col-md-9">Conteúdo</th>
                                <th class="col-md-2"></th>
                            </tr>
                        </thead>
                        <tbody class="table-sm">
                            <tr>
                                <th scope="row">24/02/2019</th>
                                <td>Modelagem de dados</td>
                                <td scope="col">
                                    <div class="btn-group">
                                        <button class="btn btn-success btn-xs">Visualizar</button>
                                        <button class="btn btn-warning btn-xs">Editar</button>
                                        <button class="btn btn-danger btn-xs">Excluir</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">13/05/2019</th>
                                <td>Redes dois</td>
                                <td scope="col">
                                    <div class="btn-group">
                                        <button class="btn btn-success btn-xs">Visualizar</button>
                                        <button class="btn btn-warning btn-xs">Editar</button>
                                        <button class="btn btn-danger btn-xs">Excluir</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">03/04/2019</th>
                                <td>Sistemas operacionais</td>
                                <td scope="col">
                                    <div class="btn-group">
                                        <button class="btn btn-success btn-xs">Visualizar</button>
                                        <button class="btn btn-warning btn-xs">Editar</button>
                                        <button class="btn btn-danger btn-xs">Excluir</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php if (mysqli_num_rows($lista_cont) > 0): ?>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12 table-hover">
                            <table class="table table-striped" cellspacing="0" cellpedding="0">
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
        </div>
        <!-- FIM TABLE 1-->

        <hr/>

        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" id="botaoNota" class="btn btn-primary">Salvar</button>
                <a href="index.html" class="btn btn-default">Cancelar</a>
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
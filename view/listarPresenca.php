<body> 
    <?php
    include '../model/config.php';
    ?>
    <div id="main" class="container-fluid">
        <h3 class="page-header"> Listar Frequencia</h3>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
            <div class="row">
                <!-- SELECT TURMA  -->
                <div class="form-group col-md-2">
                    <label for="turma">Turma:</label>
                    <select id="listarTurma" class="form-control" name="turma">
                        <option></option>
                        <?php
                        $nome_turma = "SELECT turma.id_turma, turma.nome_turma FROM horario, turma WHERE horario.id_turma = turma.id_turma AND horario.cod_prof = " . $_SESSION['cod_prof'] . " GROUP BY nome_turma;";
                        $resultado_turma = mysqli_query($conexao, $nome_turma);
                        while ($linhas_turma = mysqli_fetch_assoc($resultado_turma)):
                            ?>
                            <?php if (isset($_GET['turma']) && trim($_GET['turma']) == $linhas_turma['id_turma']): ?>
                                <option value="<?php echo $linhas_turma['id_turma']; ?>" selected><?php echo $linhas_turma['nome_turma']; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $linhas_turma['id_turma']; ?>"><?php echo $linhas_turma['nome_turma']; ?></option>
                            <?php endif; ?>                               }
                        <?php endwhile; ?>
                    </select>
                </div>
                <!-- FIM SELECT TURMA  -->
                <!-- SELECT DA DISCIPLINA -->
                <?php if (isset($_GET['turma']) && trim($_GET['turma'])): ?>
                    <div class="form-group col-md-2">
                        <label for="listarDisciplina">Discipina:</label>
                        <select id="listarDisciplina" class="form-control">
                            <option></option>
                            <?php
                            $nome_disciplina = "SELECT distinct d.nome_disc, d.cod_disc 
                                                    FROM horario h 
                                                    JOIN disciplina d 
                                                    ON h.cod_disc = d.cod_disc 
                                                    join turma t on t.id_turma = h.id_turma
                                                    WHERE cod_prof =" . $_SESSION['cod_prof'] . " AND t.id_turma =" . $_GET['turma'];

                            $resultado_disciplina = mysqli_query($conexao, $nome_disciplina);
                            while ($linhas_disciplina = mysqli_fetch_assoc($resultado_disciplina)):
                                ?>
                                <?php if (isset($_GET['disciplina']) && trim($_GET['disciplina']) == $linhas_disciplina['cod_disc']): ?>
                                    <option value="<?php echo $linhas_disciplina['cod_disc']; ?>" selected><?php echo $linhas_disciplina['nome_disc']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $linhas_disciplina['cod_disc']; ?>"><?php echo $linhas_disciplina['nome_disc']; ?></option>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </select>
                    </div>
                <?php endif; ?>
                <!-- FIM SELECT DISCIPLINA -->
                <!-- SELECT BIMESTRE  -->
                <?php if (isset($_GET['disciplina'])): ?>
                    <?php
                    $sql = "SELECT distinct CASE month(f.data) ";
                    $sql .="when 1 then 'JANEIRO'";
                    $sql .=" when 2 then 'FEVEREIRO'";
                    $sql .=" when 3 then 'MARÇO'";
                    $sql .=" when 4 then 'ABRIL'";
                    $sql .=" when 5 then 'MAIO'";
                    $sql .=" when 6 then 'JUNHO'";
                    $sql .=" when 7 then 'JULHO'";
                    $sql .=" when 8 then 'AGOSTO'";
                    $sql .=" when 9 then 'SETEMBRO'";
                    $sql .=" when 10 then 'OUTUBRO'";
                    $sql .=" when 11 then 'NOVEMBRO'";
                    $sql .=" when 12 then 'DEZEMBRO'";
                    $sql .=" END as nome_mes";
                    $sql .=" FROM horario h, matriculado m, professor p, disciplina d, turma t, aluno a, frequencia f";
                    $sql .=" WHERE m.cod_horario = h.cod_horario";
                    $sql .=" AND m.cod_aluno = a.cod_aluno";
                    $sql .=" and f.cod_aluno = a.cod_aluno";
                    $sql .=" and f.cod_horario = h.cod_horario";
                    $sql .=" AND h.cod_disc = d.cod_disc";
                    $sql .=" AND h.cod_prof = p.cod_prof";
                    $sql .=" AND h.id_turma = t.id_turma";
                    $sql .=" AND h.cod_prof =" . $_SESSION['cod_prof'] . "";
                    $sql .=" AND t.nome_turma =" . $_GET['turma'] . "";
                    $sql .=" AND d.cod_disc = 2";
                    $sql .=" order by f.`data`, a.cod_aluno";
                    ?>
                    <div class="form-group col-md-2">
                        <label for="listarBimestre">Bimestre</label>
                        <select id="listarBimestre" class="form-control" name="bimestre">
                            <option></option>
                            <option value="1" <?php echo isset($_POST['bimestre']) && $_POST['bimestre'] == '1' ? 'selected' : '' ?>>Primeiro</option>
                            <option value="2" <?php echo isset($_POST['bimestre']) && $_POST['bimestre'] == '2' ? 'selected' : '' ?>>Segundo</option>
                            <option value="3" <?php echo isset($_POST['bimestre']) && $_POST['bimestre'] == '3' ? 'selected' : '' ?>>Terceiro</option>
                        </select>
                    </div>
                <?php endif; ?>
            </div>
            <!-- FIM SELECT BIMESTRE  -->
            <!-- INICIO RESULTADO ALUNOS DA TURMA -->
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
                <?php if (isset($_GET['turma']) && trim($_GET['turma'])): ?>
                    <?php if (isset($_GET['disciplina']) && trim($_GET['disciplina'])): ?>

                        <?php
                        $sql = "SELECT distinct a.cod_aluno,a.nome, h.cod_horario,group_concat(f.status_frequencia) AS frequencias, d.nome_disc, t.nome_turma "; // campo mostrado na pagina 
                        $sql .= "FROM horario h, matriculado m, professor p, disciplina d, turma t, aluno a, frequencia f "; // tabelas de onde vem as informações
                        $sql .= "WHERE h.cod_horario = m.cod_horario ";
                        $sql .= "AND a.cod_aluno = m.cod_aluno ";
                        $sql .= "AND h.cod_disc = d.cod_disc ";
                        $sql .= "AND h.cod_prof = p.cod_prof ";
                        $sql .= "AND h.id_turma = t.id_turma ";
                        $sql .= "AND f.cod_aluno = a.cod_aluno ";
                        $sql .= "AND f.cod_horario = h.cod_horario ";
                        $sql .= "AND h.cod_prof =" . $_SESSION['cod_prof'] . " ";
                        $sql .= "AND t.id_turma =" . $_GET['turma'] . " ";
                        $sql .= "AND d.cod_disc ='" . $_GET['disciplina'] . "' group by a.cod_aluno;";


                        $lista_aluno = mysqli_query($conexao, $sql);
                        ?>
                        <?php
                        $sql2 = "select distinct data from frequencia f, horario h, turma t, disciplina d, professor p ";
                        $sql2 .="where month(DATA) ";
                        $sql2 .= "AND h.cod_disc = d.cod_disc ";
                        $sql2 .= "AND h.cod_prof = p.cod_prof ";
                        $sql2 .= "AND h.id_turma = t.id_turma ";
                        $sql2 .= "AND h.cod_horario = f.cod_horario ";
                        $sql2 .= "AND h.cod_prof =" . $_SESSION['cod_prof'] . " ";
                        $sql2 .= "AND t.id_turma =" . $_GET['turma'] . " ";
                        $sql2 .= "AND d.cod_disc ='" . $_GET['disciplina'] . "' order by DATA;";
                        $rs2 = mysqli_query($conexao, $sql2)or die(mysqli_error());
                        ?>

                        <?php if (mysqli_num_rows($lista_aluno) > 0): ?>
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
                                <div class="table-responsive  table-striped col-md-12 table-hover">
                                    <table class="table table-bordered" cellspacing="0" cellpedding="0">
                                        <thead class="table-md text-light">
                                            <tr>
                                                <th>Matricula</th>
                                                <th class="col-md">Nome do aluno</th> 
                                                <?php if (mysqli_num_rows($rs2) != 0): ?> 
                                                    <?php while ($info2 = mysqli_fetch_array($rs2)): ?>
                                                        <th class="actions">
                                                            <?php
                                                            setlocale(LC_TIME, "pt_BR");
                                                            echo strftime("%d/%b", strtotime($info2['data']));
                                                            ?>
                                                        </th>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody class="table-sm">
                                            <?php while ($cliente = mysqli_fetch_assoc($lista_aluno)): ?>
                                                <tr>
                                                    <td><?php echo $cliente['cod_aluno']; ?></td>
                                                    <td><?php echo $cliente['nome']; ?></td>
                                                    <?php
                                                    $sql = "select status_frequencia from frequencia where cod_aluno=" . $cliente['cod_aluno'];
                                                    $sql = "SELECT status_frequencia ";
                                                    $sql .="FROM frequencia f, horario h, disciplina d, professor p, turma t ";
                                                    $sql .="WHERE h.cod_disc = d.cod_disc ";
                                                    $sql .="AND f.cod_horario = h.cod_horario ";
                                                    $sql .="AND h.cod_prof = p.cod_prof ";
                                                    $sql .="and h.id_turma = t.id_turma ";
                                                    $sql .="AND t.id_turma =" . $_GET['turma'] . " ";
                                                    $sql .="AND d.cod_disc =" . $_GET['disciplina'] . " ";
                                                    $sql .="and cod_aluno =" . $cliente['cod_aluno'] . " ";
                                                    $frequencias = mysqli_query($conexao, $sql);
                                                    while ($frequencia = mysqli_fetch_assoc($frequencias)) {
                                                        echo '<td class="text-center">';
                                                        switch ($frequencia['status_frequencia']) {
                                                            case 1:
                                                                echo '*';
                                                                break;
                                                            case 0:
                                                                echo 'F';
                                                                break;
                                                        }
                                                        echo '</td>';
                                                    }
                                                    ?>
                                                <?php endwhile; ?>
                                            </tr>
                                        </tbody>
                                    <?php else: ?>
                                        <div class="alert alert-danger">Nenhum registro encontrado</div>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>


            <!-- FIM RESULTADO ALUNOS DA TURMA -->


            <hr />
            <div id="actions" class="row">
                <div class="col-md-12 ml-2">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                    <?php if (mysqli_num_rows($lista_aluno) > 0): ?>
                        <button type="submit" class="btn btn-danger" onclick="window.print()"><a href="dashboard.php?pagina=home">Imprimir</a></button>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
    <footer class="text-center">Todos os direitos reservados</footer>
</body>
</html>

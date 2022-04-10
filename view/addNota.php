<body> 
    <?php
    include '../model/config.php';
    ?>
    <div id="main" class="container-fluid">
        <h3 class="page-header"> Adicionar nota</h3>
        <!-- INICIO FORM -->
        <form method="post" action="../controller/salvarNota.php">
            <div class="row">
                <!-- INICIO SELECT TURMA  -->
                <div class="form-group col-md-2">
                    <label for="turmaNota">Turma:</label>
                    <select id="turmaNota" class="form-control" name="turmaNota">
                        <option></option>
                        <?php
                        $nome_turma = "SELECT turma.nome_turma, turma.id_turma FROM horario, turma WHERE horario.id_turma = turma.id_turma AND horario.cod_prof = " . $_SESSION['cod_prof'] . " GROUP BY nome_turma;";
                        $resultado_turma = mysqli_query($conexao, $nome_turma);
                        while ($linhas_turma = mysqli_fetch_assoc($resultado_turma)):
                            ?>
                            <?php if (isset($_GET['turmaNota']) && trim($_GET['turmaNota']) == $linhas_turma['id_turma']): ?>
                                <option value="<?php echo $linhas_turma['id_turma']; ?>" selected><?php echo $linhas_turma['nome_turma']; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $linhas_turma['id_turma']; ?>"><?php echo $linhas_turma['nome_turma']; ?></option>
                            <?php endif; ?>                               }
                        <?php endwhile; ?>
                    </select>
                </div>
                <!-- FIM SELECT TURMA  -->
                <!-- INICIO SELECT DA DISCIPLINA -->
                <?php if (isset($_GET['turmaNota']) && trim($_GET['turmaNota'])): ?>
                    <div class="form-group col-md--2">
                        <label for="disciplinaNota">Discipina:</label>
                        <select id="disciplinaNota" class="form-control" name="disciplinaNota">
                            <option></option>
                            <?php
                            $nome_disciplina = "SELECT distinct d.nome_disc, d.cod_disc  
                                                    FROM horario h 
                                                    JOIN disciplina d 
                                                    ON h.cod_disc = d.cod_disc 
                                                    join turma t on t.id_turma = h.id_turma
                                                    WHERE cod_prof =" . $_SESSION['cod_prof'] . " AND t.id_turma =" . $_GET['turmaNota'];

                            $resultado_disciplina = mysqli_query($conexao, $nome_disciplina);
                            while ($linhas_disciplina = mysqli_fetch_assoc($resultado_disciplina)):
                                ?>
                                <?php if (isset($_GET['disciplinaNota']) && trim($_GET['disciplinaNota']) == $linhas_disciplina['cod_disc']): ?>
                                    <option value="<?php echo $linhas_disciplina['cod_disc']; ?>" selected><?php echo $linhas_disciplina['nome_disc']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $linhas_disciplina['cod_disc']; ?>"><?php echo $linhas_disciplina['nome_disc']; ?></option>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </select>
                    </div>
                <?php endif; ?>
                <!-- FIM SELECT DISCIPLINA -->
                <!-- SELECT DA HORÁRIO -->
                <?php if (isset($_GET['disciplinaNota']) && trim($_GET['disciplinaNota'])): ?>
                    <div class="form-group col-md-2">
                        <label for="horarioNota">Horário:</label>
                        <select id="horarioNota" class="form-control" name="horarioNota">
                            <option></option>
                            <?php
                            $nome_horario = "SELECT distinct h.cod_horario, h.hora_ini, h.dia_semana, h.hora_fim 
                                                    FROM horario h 
                                                    JOIN disciplina d 
                                                    ON h.cod_disc = d.cod_disc 
                                                    join turma t on t.id_turma = h.id_turma
                                                    WHERE cod_prof =" . $_SESSION['cod_prof'] . " AND t.id_turma =" . $_GET['turmaNota'] . ' AND h.cod_disc=' . $_GET['disciplinaNota'];

                            $resultado_horario = mysqli_query($conexao, $nome_horario);
                            while ($horarios = mysqli_fetch_assoc($resultado_horario)):
                                ?>
                                <?php if (isset($_GET['horarioNota']) && trim($_GET['horarioNota']) == $horarios['cod_horario']): ?>
                                    <option value="<?php echo $horarios['cod_horario']; ?>" selected><?php echo $horarios['dia_semana'] . ' ' . $horarios['hora_ini'] . ' à ' . $horarios['hora_fim']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $horarios['cod_horario']; ?>"><?php echo $horarios['dia_semana'] . ' ' . $horarios['hora_ini'] . ' à ' . $horarios['hora_fim']; ?></option>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </select>
                    </div>
                <?php endif; ?>
                <!-- FIM SELECT HORÁRIO -->
                <!-- INICIO INPUT TP_AVAL -->
                <?php if (isset($_GET['horarioNota']) && trim($_GET['horarioNota'])): ?>
                    <div class="form-group col-md-2">
                        <label for="avalNota">Tipo de avaliação:</label>
                        <input type="text" id="avalNota" class="form-control" name="avalNota">
                    </div>
                <?php endif; ?>
                <!-- FIM INPUT TP_AVAL -->
                <!-- INICIO INPUT DATA -->
                <?php if (isset($_GET['turmaNota']) && trim($_GET['turmaNota'])): ?>
                    <?php if (isset($_GET['disciplinaNota']) && trim($_GET['disciplinaNota'])): ?>
                        <?php if (isset($_GET['horarioNota']) && trim($_GET['horarioNota'])): ?>
                            <div class="form-group col-md-2">
                                <label for="dataNota">Data:</label>
                                <input type="date" id="dataNota" class="form-control" name="dataNota">
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- FIM INPUT DATA -->
                <!-- INICIO RADIO BIMESTRE -->
                <?php if (isset($_GET['horarioNota']) && trim($_GET['horarioNota'])): ?>
                    <div class="form-group form-check col-md-2 posicao">
                        <input class="form-check-input" type="radio" name="bimestre1" id="bimestre1" value="0">
                        <label class="form-check-label" for="bimestre1">1°Bimestre</label><br>
                        <input class="form-check-input" type="radio" name="bimestre2" id="bimestre2" value="1">
                        <label class="form-check-label" for="bimestre2">2°Bimestre</label>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- FIM RADIO BIMESTRE -->
    <!-- INICIO LISTA ALUNOS DA TURMA -->
    <?php if (isset($_GET['turmaNota']) && trim($_GET['turmaNota'])): ?>
        <?php if (isset($_GET['disciplinaNota']) && trim($_GET['disciplinaNota'])): ?>
            <?php if (isset($_GET['horarioNota']) && trim($_GET['horarioNota'])): ?>

                <?php
                $sql = "SELECT distinct a.cod_aluno, a.nome ";
                $sql .= "FROM horario h, matriculado m, professor p, disciplina d, turma t, aluno a ";
                $sql .= "WHERE h.cod_horario = m.cod_horario ";
                $sql .= "AND a.cod_aluno = m.cod_aluno ";
                $sql .= "AND h.cod_disc = d.cod_disc ";
                $sql .= "AND h.cod_prof = p.cod_prof ";
                $sql .= "AND h.id_turma = t.id_turma ";
                $sql .= "AND h.cod_prof =" . $_SESSION['cod_prof'] . " ";
                $sql .= "AND t.id_turma =" . $_GET['turmaNota'] . " ";
                $sql .= "AND d.cod_disc = " . $_GET['disciplinaNota'] . " group by a.cod_aluno;";

                $lista_aluno = mysqli_query($conexao, $sql);
                //print_r($sql);
                //exit;
                ?>

                <?php if (mysqli_num_rows($lista_aluno) > 0): ?>
                    <div id="list" class="row">
                        <div class="table-responsive-md col-md-12 table-hover">
                            <table class="table table-bordered table-sm" cellspacing="0" cellpedding="0">
                                <thead class="text-light">
                                    <tr>
                                        <th>Matricula</th>
                                        <th>Nome do aluno</th>
                                        <th>Nota</th>
                                    </tr>
                                </thead>
                                <?php while ($cliente = mysqli_fetch_assoc($lista_aluno)): ?>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle"><?php echo $cliente['cod_aluno']; ?></td>
                                            <td class="align-middle col-md-2"><?php echo $cliente['nome']; ?></td>
                                            <td class="nota align-middle">
                                                <input type="text" class="form-control" id="nota1" name="nota1[<?php echo $cliente['cod_aluno']; ?>]">
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
    <!-- FIM LISTA ALUNOS DA TURMA -->
    <hr />
</div>
<div id="actions" class="row">
    <div class="col-md">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="submit" class="btn btn-danger"><a href="dashboard.php?pagina=home">Cancelar</a></button>
    </div>
</div>
</form>
</body>

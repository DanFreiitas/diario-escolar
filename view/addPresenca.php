    <body> 
        <?php
        include '../model/config.php';
        ?>
        <div id="main" class="container-fluid">
            <h3 class="page-header">Registrar frequencia</h3>
            <form method="post" action="../controller/verificarTurma.php">
                <div class="row">

                    <!-- SELECT TURMA  -->
                    <div class="form-group col-md-2">
                        <label for="turma">Turma:</label>
                        <select id="turma" class="form-control" name="turma">
                            <option></option>
                            <?php
                            $nome_turma = "SELECT turma.nome_turma FROM horario, turma WHERE horario.id_turma = turma.id_turma AND horario.cod_prof = " . $_SESSION['cod_prof'] . " GROUP BY nome_turma;";
                            $resultado_turma = mysqli_query($conexao, $nome_turma);
                            while ($linhas_turma = mysqli_fetch_assoc($resultado_turma)):
                                ?>
                                <?php if (isset($_GET['turma']) && trim($_GET['turma']) == $linhas_turma['nome_turma']): ?>
                                    <option value="<?php echo $linhas_turma['nome_turma']; ?>" selected><?php echo $linhas_turma['nome_turma']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $linhas_turma['nome_turma']; ?>"><?php echo $linhas_turma['nome_turma']; ?></option>
                                <?php endif; ?>                               }
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <!-- FIM SELECT TURMA  -->
                    <!-- SELECT DA DISCIPLINA -->
                    <?php if (isset($_GET['turma']) && trim($_GET['turma'])): ?>
                        <div class="form-group col-md-2">
                            <label for="disciplina">Discipina:</label>
                            <select id="disciplina" class="form-control">
                                <option></option>
                                <?php
                                $nome_disciplina = "SELECT distinct d.nome_disc, d.cod_disc 
                                                    FROM horario h 
                                                    JOIN disciplina d 
                                                    ON h.cod_disc = d.cod_disc 
                                                    join turma t on t.id_turma = h.id_turma
                                                    WHERE cod_prof =" . $_SESSION['cod_prof'] . " AND t.nome_turma =" . $_GET['turma'];

                                $resultado_disciplina = mysqli_query($conexao, $nome_disciplina);
                                while ($linhas_disciplina = mysqli_fetch_assoc($resultado_disciplina)):
                                    ?>
                                    <?php if (isset($_GET['disciplina']) && trim($_GET['disciplina']) == $linhas_disciplina['cod_disc'] ): ?>
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
                    <?php if (isset($_GET['disciplina'])): ?>
                        <div class="form-group col-md-2">
                            <label for="horario">Horario:</label>
                            <select id="horario" class="form-control" name="horario">
                                <option></option>
                                <?php
                                $nome_horario = "SELECT distinct h.cod_horario, h.hora_ini, h.dia_semana, h.hora_fim 
                                                    FROM horario h 
                                                    JOIN disciplina d 
                                                    ON h.cod_disc = d.cod_disc 
                                                    join turma t on t.id_turma = h.id_turma
                                                    WHERE cod_prof =" . $_SESSION['cod_prof'] . " AND t.nome_turma =" . $_GET['turma'] . ' AND h.cod_disc=' . $_GET['disciplina'];


                                $resultado_horario = mysqli_query($conexao, $nome_horario);
                                while ($linhas_horario = mysqli_fetch_assoc($resultado_horario)):
                                    ?>
                                    <?php if (isset($_GET['disciplina']) && trim($_GET['disciplina'])): ?>
                                        <option value="<?php echo $linhas_horario['cod_horario']; ?>" selected><?php echo $linhas_horario['dia_semana'] . ' ' . $linhas_horario['hora_ini'] . ' à ' . $linhas_horario['hora_fim']; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $linhas_horario['cod_horario']; ?>"><?php echo $linhas_horario['dia_semana'] . ' ' . $linhas_horario['hora_ini'] . ' à ' . $linhas_horario['hora_fim']; ?></option>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </select>

                        </div>
                    <?php endif; ?>
                    <!-- FIM SELECT HORÁRIO -->

                    <!-- SELECT BIMESTRE  -->
                    <?php if (isset($_GET['disciplina'])): ?>
                        <div class="form-group col-md-2">
                            <label for="bimestre">Bimestre</label>
                            <select id="bimestre" class="form-control" name="bimestre">
                                <option></option>
                                <option value="1">Primeiro</option>
                                <option value="2">Segundo</option>
                                <option value="3">Terceiro</option>
                            </select>
                        </div>
                    <?php endif; ?>
                    <!-- FIM SELECT BIMESTRE  -->

                    <!-- SELECT DATA  -->
                    <?php if (isset($_GET['disciplina'])): ?>
                        <div class="form-group col-md-2">
                            <label for="data">Data</label>
                            <input type="date" id="bimestre" class="form-control" name="data">
                        </div>
                    <?php endif; ?>
                    <!-- FIM SELECT DATA  -->
                </div>

                <!-- INICIO RESULTADO ALUNOS DA TURMA -->
                <?php if (isset($_GET['turma']) && trim($_GET['turma'])): ?>
                    <?php if (isset($_GET['disciplina']) && trim($_GET['disciplina'])): ?>

                        <?php
                        $sql = "SELECT distinct a.cod_aluno, a.nome, h.cod_horario "; // campo mostrado na pagina 
                        $sql .= "FROM horario h, matriculado m, professor p, disciplina d, turma t, aluno a "; // tabelas de onde vem as informações
                        $sql .= "WHERE h.cod_horario = m.cod_horario ";
                        $sql .= "AND a.cod_aluno = m.cod_aluno ";
                        $sql .= "AND h.cod_disc = d.cod_disc ";
                        $sql .= "AND h.cod_prof = p.cod_prof ";
                        $sql .= "AND h.id_turma = t.id_turma ";
                        $sql .= "AND h.cod_prof =" . $_SESSION['cod_prof'] . " ";
                        $sql .= "AND t.nome_turma =" . $_GET['turma'] . " ";
                        $sql .= "AND d.cod_disc ='" . $_GET['disciplina'] . "' group by a.cod_aluno;";


                        $lista_aluno = mysqli_query($conexao, $sql);
                        ?>

                        <?php if (mysqli_num_rows($lista_aluno) > 0): ?>
                            <div id="list" class="row">
                                <div class="table-responsive table-striped col-md table-hover">
                                    <table class="table table-bordered" cellspacing="0" cellpedding="0">
                                        <thead>
                                            <tr class="table-dm text-white topo">
                                                <th>Matricula</th>
                                                <th class="col-md-11">Nome do aluno</th>
                                                <th class="actions">Frequencia</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($cliente = mysqli_fetch_assoc($lista_aluno)): ?>
                                            <tr class="table-sm">
                                                <td class="align-middle"><?php echo $cliente['cod_aluno']; ?></td>
                                                    <td class="align-middle"><?php echo $cliente['nome']; ?></td>
                                                    <td class="actions form-check form-check-inline col-md">
                                                        <div class="align-middle switch-field ml-auto mr-auto">
                                                            <input type="radio" id="frequencia<?php echo $cliente['cod_aluno']; ?>" name="presenca[<?php echo $cliente['cod_aluno']; ?>]" value="1" />
                                                            <label for="frequencia<?php echo $cliente['cod_aluno']; ?>" title="Presença">P</label>
                                                            <input type="radio" id="falta<?php echo $cliente['cod_aluno']; ?>" name="presenca[<?php echo $cliente['cod_aluno']; ?>]" value="0" />
                                                            <label for="falta<?php echo $cliente['cod_aluno']; ?>" class="falta" title="Falta">F</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <hr />
                <div id="actions" class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary  pl-2">Salvar</button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger"><a href="dashboard.php?pagina=home" data-toggle="modal" data-target="#delete-modal">Cancelar</a></button>
                    </div>
                </div>
            </form>
        </div>
    </body>
        <footer class="text-center">Todos os direitos reservados</footer>
</html>

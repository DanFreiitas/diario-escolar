<?php
include '../model/cards.php';
?>

<!--div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
            </div>
            <div class="modal-body"> 
                Deseja realmente excluir este item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Sim</button>
                <button type="button" class="btn btn_default" data-dismiss="modal">Não</button>
            </div>
        </div>
    </div>
</div-->
<div id="main" class="container-fluid">
    <div id="top" class="row bg-white border rounded p-2">
        <!-- INICIO DOS CARDS -->
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Total de alunos:</div>
                <div class="card-body">
                    <p class="card-text text-white">
                        Registrados na escola: <?php echo $totalAlunos; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">Total de turmas:</div>
                <div class="card-body">
                    <p class="card-text text-white">
                        Turmas registradas: <?php echo $totalTurmas; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Total de disciplinas:</div>
                <div class="card-body">
                    <p class="card-text text-white">
                        Disciplinas registradas: <?php echo $totalDisciplinas; ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- FINAL DOS CARDS -->
        
        <!-- INICIO DE ESTATISTICA DE ALUNOS ATIVOS E INATIVOS -->
        <div class="col-md-4">
             <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages: ["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Ativos', <?php echo $alunoAtivo; ?>],
                    ['Inativos', <?php echo $alunoInativo; ?>],
                ]);

                var options = {
                    title: 'Estatistica de alunos',
                    pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('estatisticaAluno'));
                chart.draw(data, options);
            }
        </script>
        <div id="estatisticaAluno" style="max-width: 18rem;"></div>
        </div>
        <!-- FIM DE ESTATISTICA DE ALUNOS ATIVOS E INATIVOS -->

        <!-- INICIO DE ESTATISTICA DE TURMAS ATIVAS E INATIVAS -->
        <div class="col-md-4">
        <script type="text/javascript">
            google.charts.load("current", {packages: ["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Ativos', <?php echo $turmaAtiva; ?>],
                    ['Inativos', <?php echo $turmaInativa; ?>],
                ]);

                var options = {
                    title: 'Estatistica de turmas',
                    pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('estatisticaTurma'));
                chart.draw(data, options);
            }
        </script>
        <div id="estatisticaTurma" style="max-width: 18rem; background-color: #f8f9fa;"></div>
        </div>
        <!-- FIM DE ESTATISTICA DE TURMAS ATIVAS E INATIVAS -->
        
    </div>
    <div class="row">
       

    </div>
</div>

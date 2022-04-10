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
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" >
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Web Dev Academy</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Inicio</a></li> 
                        <li><a href="#">Opções</a></li>
                        <li><a href="#">Perfil</a></li>
                        <li><a href="#">Ajuda</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="main" class="container-fluid">
            <h3 class="page-header"> Adicionar Item</h3>
            <form method="post" action="../controller/verificarTurma.php">
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="turma">Turma:</label>
                        <?php
                        if (isset($_GET['erro']) && trim($_GET['erro'])) {
                            switch (trim($_GET['erro'])) {
                                case 'turma':
                                    echo 'Por favor, selecione a turma que deseja listar.';
                                    break;
                            }
                        }
                        ?>
                        <select id="turma" class="form-control" name="turma">
                            <option></option>
                            <option>251</option>
                            <option>432</option>
                            <option>351</option>
                            <option>201</option>
                        </select>
                    </div>
                </div>
                <div id="list" class="row">
                    <div class="table-responsive col-md-12">
                        <table class="table table-striped" cellspacing="0" cellpedding="0">
                            <thead>
                                <tr>
                                    <th>Matricula</th>
                                    <th>Nome do aluno</th>
                                    <th>Status</th>
                                    <th>Ano letivo</th>  
                                    <th class="actions"> Ações </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1001</td>
                                    <td>Lorem ipsum dolor site amot...</td>
                                    <td>Jes</td>
                                    <td>01/01/2015</td>
                                    <td class="actions">
                                        <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                        <a class="btn btn-primary btn-sm" href="_include/edite.html">Presença </a>
                                        <a class="btn btn-warning btn-sm" href="_include/edite.html">Notas </a>
                                        <!--a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a-->
                                    </td>
                                </tr>
                                <tr>
                                    <td>1001</td>
                                    <td>Lorem ipsum dolor site amot...</td>
                                    <td>Jes</td>
                                    <td>01/01/2015</td>
                                    <td class="actions">
                                        <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                        <a class="btn btn-primary btn-sm" href="_include/edite.html">Presença </a>
                                        <a class="btn btn-warning btn-sm" href="_include/edite.html">Notas </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1001</td>
                                    <td>Lorem ipsum dolor site amot...</td>
                                    <td>Jes</td>
                                    <td>01/01/2015</td>
                                    <td class="actions">
                                        <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                        <a class="btn btn-primary btn-sm" href="_include/edite.html">Presença </a>
                                        <a class="btn btn-warning btn-sm" href="_include/edite.html">Notas </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1001</td>
                                    <td>Lorem ipsum dolor site amot...</td>
                                    <td>Jes</td>
                                    <td>01/01/2015</td>
                                    <td class="actions">
                                        <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                        <a class="btn btn-primary btn-sm" href="_include/edite.html">Presença </a>
                                        <a class="btn btn-warning btn-sm" href="_include/edite.html">Notas </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1001</td>
                                    <td>Lorem ipsum dolor site amot...</td>
                                    <td>Jes</td>
                                    <td>01/01/2015</td>
                                    <td class="actions">
                                        <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                        <a class="btn btn-primary btn-sm" href="_include/edite.html">Presença </a>
                                        <a class="btn btn-warning btn-sm" href="_include/edite.html">Notas </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1001</td>
                                    <td>Lorem ipsum dolor site amot...</td>
                                    <td>Jes</td>
                                    <td>01/01/2015</td>
                                    <td class="actions">
                                        <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                        <a class="btn btn-primary btn-sm" href="_include/edite.html">Presença </a>
                                        <a class="btn btn-warning btn-sm" href="_include/edite.html">Notas </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1001</td>
                                    <td>Lorem ipsum dolor site amot...</td>
                                    <td>Jes</td>
                                    <td>01/01/2015</td>
                                    <td class="actions">
                                        <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                        <a class="btn btn-primary btn-sm" href="_include/edite.html">Presença </a>
                                        <a class="btn btn-warning btn-sm" href="_include/edite.html">Notas </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1001</td>
                                    <td>Lorem ipsum dolor site amot...</td>
                                    <td>Jes</td>
                                    <td>01/01/2015</td>
                                    <td class="actions">
                                        <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                        <a class="btn btn-primary btn-sm" href="_include/edite.html">Presença </a>
                                        <a class="btn btn-warning btn-sm" href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1001</td>
                                    <td>Lorem ipsum dolor site amot...</td>
                                    <td>Jes</td>
                                    <td>01/01/2015</td>
                                    <td class="actions">
                                        <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                        <a class="btn btn-primary btn-sm" href="_include/edite.html">Presença </a>
                                        <a class="btn btn-warning btn-sm" href="_include/edite.html">Notas </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1001</td>
                                    <td>Lorem ipsum dolor site amot...</td>
                                    <td>Jes</td>
                                    <td>01/01/2015</td>
                                    <td class="actions">
                                        <a class="btn btn-success btn-sm" href="_include/view_01.html">Visualizar</a>
                                        <a class="btn btn-primary btn-sm" href="_include/edite.html">Presença </a>
                                        <a class="btn btn-warning btn-sm" href="_include/edite.html">Notas </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr />
                <div id="actions" class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                        <a href="index.html" class="btn btn-default">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>


        <footer class="text-center">Todos os direitos reservados</footer>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>

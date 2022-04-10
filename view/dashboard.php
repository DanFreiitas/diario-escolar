<?php include '../model/uteis.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php include '../model/config.php'; ?>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="../css/bootstrap4.1.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/estilo.css">  
        <link rel="stylesheet" href="../css/impressao.css" media="print">  
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script defer src="../js/solid.js"></script>
        <script defer src="../js/fontawesome.js"></script>
        <script src="../js/select.js" type="text/javascript"></script>
    </head>

    <body>
        <!--modal-->
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalLabel"></h4>
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
        </div> <!-- FIM MODAL -->
        <div class="wrapper">
            <nav id="sidebar" class="active">
                <div class="sidebar-header">
                    <h5><img src="img/user.png" class="img-fluid"> <?php echo $_SESSION['nome']; ?></h5> <!--NOME DO USUÁRIO -->
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="dashboard.php?pagina=home" aria-expanded="false" class="dropdown-toggle">Home</a>
                        <a href="#profSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Professores</a>
                        <ul class="collapse list-unstyled" id="profSubmenu">
                            <li>
                                <a href="dashboard.php?pagina=addPresenca">Registrar Frequência</a>
                            </li>
                            <li>
                                <a href="dashboard.php?pagina=listarPresenca">Listar Frequência</a>
                            </li>
                            <li>
                                <a href="dashboard.php?pagina=addNota">Registrar Notas</a>
                            </li>
                            <li>
                                <a href="dashboard.php?pagina=listarNota">Listar Notas</a>
                            </li>
                            <li>
                                <a href="dashboard.php?pagina=addConteudo">Registrar Conteúdo</a>
                            </li>
                            <li>
                                <a href="dashboard.php?pagina=listarConteudo">Listar Conteúdo</a>
                            </li>
                        </ul>
                    </li>
                    <!--li>
                        <a href="#turmaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tumas</a>
                        <ul class="collapse list-unstyled" id="turmaSubmenu">
                            <li>
                                <a href="#">Registrar Turmas</a>
                            </li>
                            <li>
                                <a href="#">Listar Turmas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#alunoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Alunos</a>
                        <ul class="collapse list-unstyled" id="alunoSubmenu">
                            <li>
                                <a href="#">Registrar Alunos</a>
                            </li>
                            <li>
                                <a href="#">Listar Alunos</a>
                            </li>
                            <li>
                                <a href="#">Lançar Frequencia</a>
                            </li>
                            <li>
                                <a href="#">Lançar Notas</a>
                            </li>
                        </ul>
                    </li>
                </ul-->

                    <ul class="list-unstyled CTAs">
                        <li>
                            <a href="#" class="contato">Contato</a>
                        </li>
                        <li>
                            <a href="../controller/logout.php" class="sair">Sair</a>
                        </li>
                    </ul>
            </nav>

            <div id="content" class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-md" id="superior">
                            <div class="container-fluid">

                                <button type="button" id="sidebarCollapse" class="navbar-btn active rounded">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-align-justify"></i>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="nav navbar-nav ml-auto ">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="dashboard.php?pagina=home"><?php echo $scool;?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Conteúdo abrirá aqui -->
                <div class="row">
                    <div class="col-md-12">
                        <?php include '../controller/router.php'; ?>
                    </div>
                </div>
                <!-- Encerramento de conteúdo-->
            </div>
        </div>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/popper.mim.js"></script>
        <script src="../js/menu.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>


    </body>

</html>
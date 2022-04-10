<!DOCTYPE html>
<html>
    <head>
        <?php
        include './model/config.php';
        ?>
        <meta charset="UTF-8">
        <title><?php echo "$title"; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap4.1.min.css" rel="stylesheet" media="screen">
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">


    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    include './view/include/_nav.inc';
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="container">
                        <div class="row">
                            <img src="view/img/logo.png" class="mx-auto">
                            </div>
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <?php
                            $erro = '';
                            if (isset($_GET['erro'])) {
                                switch ($_GET['erro']) {
                                    case 'obrigatorio':
                                        $erro = '<li>O e-mail e a senha devem ser preenchidos.</li>';
                                        break;
                                    case 'invalido':
                                        $erro = '<li>O e-mail e/ou senha informados estão incorretos.</li>';
                                        break;
                                }
                            }
                            ?>
                            
                            <form method="POST" action="controller/login.php" class="border col-md-4 rounded bg-light" name="acesso">

                                <div class="form-group">
                                    <div class="col-md-auto mt-3">
                                        <label for="email">Login:</label>
                                        <div class="alert-danger text-danger pl-2 rounded login-erro mb-2"><?php echo $erro; ?></div>
                                        <input type="text" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Usuário"><ion-icon name="checkmark"></ion-icon>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-auto">
                                        <label for="senha">Senha:</label>
                                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Sua senha">
                                        <button type="submit" class="btn btn-primary" id="btn-login" name="button">Entrar</button>
                                        <button type="submit" class="btn btn-while" id="btn-sair" name="button"><a href="index.php  ">Cancelar</a></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-auto text-center text-danger">
                                    </div>
                                </div>
                            </form>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    include './view/include/_footer.inc';
                    ?>
                </div>
            </div>
        </div>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap-3.3.7.js"></script>
        <script src="js/bootstrap.min.js"></script> 
    </body>
</html>

<?php
    include '../_config/_connect.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">

        </div>
        <?php
        $login = '';
        $senha = '';
        if (isset($_POST['button'])) {
            $login = trim($_POST['login']);
            $senha = trim($_POST['senha']);
        }
        ?>
        <form method="POST" action="" class="mt-5 border col-md-4 rounded-bottom" name="acesso">

            <div class="form-group">
                <div class="col-md-auto mt-3">
                    <label for="login">Login:</label>
                    <input type="text" class="form-control" id="login" name="login" aria-describedby="login" placeholder="Usuário">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-auto">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Sua senha">
                    <button type="submit" class="btn btn-primary mt-3" name="button">Entrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-auto text-center text-danger">
                    <?php
                    if ($login == '') {
                        echo 'Por favor insira seu login.';
                    } else if ($senha == '') {
                        echo 'Por favor insira sua senha.';
                    }  else {
                        $sql = "SELECT * FROM login WHERE login = '$login' AND senha = '$senha' ";
                        $result = mysqli_query($con, $sql);
                        if(mysqli_num_rows($result) > 0 ){
                            echo 'existe registro';                            
                        }  else {
                            echo 'Usuário ou senha inválido.';
                        }
                    }
                    ?>
                </div>
            </div>
        </form>
        <div class="col-md-4">

        </div>
    </div>
</div>
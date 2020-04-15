<?php require 'pages/header.php'; ?>




        <div class="d-flex">
            <nav class="sidebar">
                <ul class="nav navbar-nav navbar-right">
                
                   <li><a href="index.php"><i class="fas fa-newspaper"></i> Meus Anuncios</a></li>
                    <li><a href="sair.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>-->
      
           
            </ul>
            </nav>

            <div class="content p-1">
                <div class="list-group-item">
                    <div class="d-flex">
                        <div class="mr-auto p-2">
                            <h2 class="display-4 titulo">Cadastrar Utilizador</h2>
                        </div>
                        <a href="index.php">
                            <div class="p-2">
                                <button class="btn btn-outline-info btn-sm">
                                    Voltar
                                </button>
                            </div>
                        </a>
                    </div><hr>
                   <form method="POST" enctype="multipart/form-data" style="margin-top:20px;">
    <?php
    require 'classes/usuarios.class.php';
    $u = new Usuarios();
    if(isset($_POST['nome']) && !empty($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];
        $telefone = addslashes($_POST['telefone']);

        if(!empty($nome) && !empty($email) && !empty($senha)) {
            if($u->cadastrar($nome, $email, $senha, $telefone)) {
                ?>
                <div class="alert alert-success">
                    <strong>Parabéns!</strong> Cadastrado com sucesso. <a href="login.php" class="alert-link">Faça o login agora</a>
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-warning">
                    Este usuário já existe! <a href="login.php" class="alert-link">Faça o login agora</a>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-warning">
                Preencha todos os campos!
            </div>
            <?php
        }
    }
    ?>
      
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" />
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" class="form-control" />
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" />
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" class="form-control" />
        </div>
        <input type="submit" value="Cadastrar" class="btn btn-default" />
    </form>

</div>

<?php require 'pages/footer.php'; ?>
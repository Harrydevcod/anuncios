<?php require 'pages/header.php'; ?>
<?php
if(empty($_SESSION['cLogin'])) {
    ?>
    <script type="text/javascript">window.location.href="login.php";</script>
    <?php
    exit;
}
?>



        <div class="d-flex">
            <nav class="sidebar">
                <ul class="nav navbar-nav navbar-right">
                
                    < <li><a href="meus-anuncios.php"><i class="fas fa-newspaper"></i> Meus Anúncios</a></li>
                    <li><a href="sair.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
      
           
            </ul>
            </nav>

            <div class="content p-1">
                <div class="list-group-item">
                    <div class="d-flex">
                        <div class="mr-auto p-2">
                            <h2 class="display-4 titulo">Adicionar Anuncio</h2>
                        </div>
                        <a href="meus-anuncios.php">
                            <div class="p-2">
                                <button class="btn btn-outline-info btn-sm">
                                    Listar
                                </button>
                            </div>
                        </a>
                    </div><hr>
                   <form method="POST" enctype="multipart/form-data" style="margin-top:20px;">
                    <?php
                    require 'classes/anuncios.class.php';
$a = new Anuncios();
if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
    $titulo = addslashes($_POST['titulo']);
    $categoria = addslashes($_POST['categoria']);
    $valor = addslashes($_POST['valor']);
    $descricao = addslashes($_POST['descricao']);
    $estado = addslashes($_POST['estado']);

    $a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);

    ?>
    <div class="alert alert-success">
        Produto adicionado com sucesso!
    </div>
    <?php
}
?>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label> Categoria</label>
                                <select name="categoria" id="categoria" class="form-control" required="">
                                    <?php
                                      require 'classes/categorias.class.php';
                                      $c = new Categorias();
                                      $cats = $c->getLista();
                                      foreach($cats as $cat):
                                      ?>
                                      <option value="<?php echo $cat['id']; ?>"><?php echo($cat['nome']); ?></option>
                                     <?php
                                      endforeach;
                                        ?>
                              </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label> Titulo</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" required="" />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="valor">Valor:</label>
                                <input type="number" name="valor" id="valor" class="form-control" required="" />
                            </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="form-group col-md-3">
                            <label for="estado">Estado de Conservação:</label>
                            <select name="estado" id="estado" class="form-control" required="">
                                 <option value="0">Novo</option>
                                 <option value="1">Semi-novo</option>
                                <option value="2">Usado</option>
                             </select>
                         </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="descricao">Descrição:</label>
                                     <textarea class="form-control" required="" name="descricao"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                     
                     </div>
                            
                           
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </form>
                </div>
            </div>

     </div>                  

<?php require 'pages/footer.php'; ?>

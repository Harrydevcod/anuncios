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
                
                     <li><a href="meus-anuncios.php"><i class="fas fa-newspaper"></i> Meus Anúncios</a></li>
                    <li><a href="sair.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
      
           
            </ul>
            </nav>

            <div class="content p-1">
                <div class="list-group-item">
                    <div class="d-flex">
                        <div class="mr-auto p-2">
                            <h2 class="display-4 titulo">Editar Anuncio</h2>
                        </div>
                        <a href="meus-anuncios.php">
                            <div class="p-2">
                                <button class="btn btn-outline-info btn-sm">
                                    Voltar
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
	if(isset($_FILES['fotos'])) {
		$fotos = $_FILES['fotos'];
	} else {
		$fotos = array();
	}

	$a->editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $_GET['id']);

	?>
	<div class="alert alert-success">
		Produto editado com sucesso!
	</div>
	<?php
}

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$info = $a->getAnuncio($_GET['id']);
} else {
	?>
	<script type="text/javascript">window.location.href="meus-anuncios.php";</script>
	<?php
	exit;
}
?>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label> Categoria</label>
                                     <select name="categoria" id="categoria" class="form-control">
				                        <?php
				                        require 'classes/categorias.class.php';
				                        $c = new Categorias();
				                        $cats = $c->getLista();
				                        foreach($cats as $cat):
				                                ?>
				                            <option value="<?php echo $cat['id']; ?>" <?php echo ($info['id_categoria']==$cat['id'])?'selected="selected"':''; ?>><?php echo ($cat['nome']); ?></option>
				                        <?php
				                        endforeach;
				                        ?>
			                         </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label> Titulo</label>
                               <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $info['titulo']; ?>" />
                            </div>
                             
                            <div class="form-group col-md-3">
                                <label for="valor">Valor:</label>
                                <input type="number" name="valor" id="valor" class="form-control" required="" value="<?php echo $info['valor']; ?>" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="estado">Estado de Conservação:</label>
                                  <select name="estado" id="estado" class="form-control">
                                     <option value="0" <?php echo ($info['estado']=='0')?'selected="selected"':''; ?>>Novo</option>
                                      <option value="1" <?php echo ($info['estado']=='1')?'selected="selected"':''; ?>>Semi Novo</option>
                                        <option value="2" <?php echo ($info['estado']=='2')?'selected="selected"':''; ?>>Usado</option>
                                 </select>
                         </div>
                     </div>
                       
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="descricao">Descrição:</label>
                                     <textarea class="form-control" name="descricao"><?php echo $info['descricao']; ?></textarea>
                            </div>
                        </div>
                           <div class="form-row">
                        <div class="container">
                            <label for="add_foto">Imagem do Anuncio:</label>
                            <input type="file" name="fotos[]" multiple required="" /><br/><br/>
                             <div class="card">
                                <div class="card-header">Fotos</div>
                                <div class="card-body">
                                    <?php foreach($info['fotos'] as $foto): ?>
                                 <div class="foto_item">
                                     <img src="assets/images/anuncios/<?php echo $foto['url']; ?>" class="img-thumbnail" border="0" /><br/>
                                     <a href="excluir-foto.php?id=<?php echo $foto['id']; ?>"><i class="fas fa-trash"></i></a>
                                </div>
                                    <?php endforeach; ?>
                                </div>                              
                            </div>
                        </div>
                    </div>
                        <br/>
                       
                              <input type="submit" value="Editar" class="btn btn-info" />
                        </form>   
                       
        

     </div>                  
</div>
<?php require 'pages/footer.php'; ?>
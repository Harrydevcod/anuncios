<?php require 'pages/header.php'; ?>
<?php
require 'classes/anuncios.class.php';
require 'classes/usuarios.class.php';
$a = new Anuncios();
$u = new Usuarios();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);
} else {
    ?>
    <script type="text/javascript">window.location.href="index.php";</script>
    <?php
    exit;
}

$info = $a->getAnuncio($id);
?>
        <div class="d-flex">
            <nav class="sidebar">
                <ul class="nav navbar-nav navbar-right">
                
                    <li><a href="index.php"><i class="fas fa-newspaper"></i> Anuncios</a></li>
                    <li><a href="login.php"><i class=""></i> Login</a></li>
      
           
            </ul>
            </nav>

            <div class="content p-1">
                <div class="list-group-item">
                    <div class="d-flex">
                        <div class="mr-auto p-2">
                            <h2 class="display-4 titulo"><?php echo $info['titulo']; ?></h2>
                        </div>
                    </div>
                   <hr>

 
                  
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5">
            
            <div class="carousel slide" data-ride="carousel" id="meuCarousel">
                <div class="carousel-inner" role="listbox">
                    <?php foreach($info['fotos'] as $chave => $foto): ?>
                    <div class="item <?php echo ($chave=='0')?'active':''; ?>">
                        <img src="assets/images/anuncios/<?php echo $foto['url']; ?>" />
                    </div>
                    <?php endforeach; ?>
                </div>
                <a class="left carousel-control" href="#meuCarousel" role="button" data-slide="prev"><span><</span></a>
                <a class="right carousel-control" href="#meuCarousel" role="button" data-slide="next"><span>></span></a>
            </div>

        </div>
        <div class="col-sm-7">
            <h1></h1>
            <h4><?php echo $info['categoria']; ?></h4>
            <p><?php echo $info['descricao']; ?></p>
            <br/>
            <h3>CVE <?php echo number_format($info['valor'], 2); ?></h3>
            <h4>Telefone: <?php echo $info['telefone']; ?></h4>
        </div>
    </div>
</div>         
</div>  
</div>      

   <?php require 'pages/footer.php'; ?>

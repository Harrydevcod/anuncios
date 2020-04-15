<?php require  'pages/header.php'?>

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
                            <h2 class="display-4 titulo">Meus Anuncios</h2>
                        </div>
                    </div>
                    <div class="row mb-3">
                    	  <a href="add-anuncio.php">
                            <div class="p-2">
                                <button class="btn btn-info btn-sm">
                                    Adicionar Anuncios
                                </button>
                            </div>
                        </a>
                      </div><hr>
                             <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Título</th>
                                    <th class="d-none d-sm-table-cell">Valor</th>
                                    <th class="d-none d-lg-table-cell">Descriçãp</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>

                            <?php
        require 'classes/anuncios.class.php';
        $a = new Anuncios();
        $anuncios = $a->getMeusAnuncios();

        foreach($anuncios as $anuncio):
        ?>
        <tr>
            <td>
                <?php if(!empty($anuncio['url'])): ?>
                <img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="50" border="0" />
                <?php else: ?>
                <img src="assets/images/default.jpg" height="50" border="0" />
                <?php endif; ?>
            </td>
            <td><?php echo $anuncio['titulo']; ?></td>
            <td>CVE <?php echo number_format($anuncio['valor'], 2); ?></td>
            <td><?php echo $anuncio['descricao']; ?></td>
            <td>

                <a href="editar-anuncio.php?id=<?php echo $anuncio['id']; ?>"><i class="fas fa-pencil-alt"></i></a>

                <a href="excluir-anuncio.php?id=<?php echo $anuncio['id']; ?>"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>
</div>
</div>
</div>
                       

  <?php require 'pages/footer.php'; ?>

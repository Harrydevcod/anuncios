<?php require  'pages/header.php'?>
<?php require    'classes/usuarios.class.php';?>



        <div class="d-flex">
            <nav class="sidebar">
                <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                    <li><a href="meus-anuncios.php"><i class="fas fa-newspaper"></i> Meus Anúncios</a></li>
                    <li><a href="sair.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                <?php else: ?>
                    <li><a href="cadastrar.php"><i class="fa fa-plus"></i> Cadastrar</a></li>
                    <!--<li><a href="login.php"><i class="" aria-hidden="true"></i> Login</a></li>-->
                <?php endif; ?>
            </ul>
            </nav>

            <div class="content p-1">
                <div class="list-group-item">
                    <div class="d-flex">
                        <div class="mr-auto p-2">
                     

                    </div>
                    <hr>
                    
<?php
require 'classes/anuncios.class.php';
require 'classes/categorias.class.php';
$a = new Anuncios();
$u = new Usuarios();
$c = new Categorias();

$filtros = array(
    'categoria' => '',
    'preco' => '',
    'estado' => ''
);
if(isset($_GET['filtros'])) {
    $filtros = $_GET['filtros'];
}

$total_anuncios = $a->getTotalAnuncios($filtros);
$total_usuarios = $u->getTotalUsuarios();

$p = 1;
if(isset($_GET['p']) && !empty($_GET['p'])) {
    $p = addslashes($_GET['p']);
}

$por_pagina = 2;
$total_paginas = ceil($total_anuncios / $por_pagina);

$anuncios = $a->getUltimosAnuncios($p, $por_pagina, $filtros);
$categorias = $c->getLista();
?>

<div class="container-fluid">
    <div class="jumbotron">
        <h2>Nós temos hoje <?php echo $total_anuncios; ?> anúncios.</h2>
        <p>E mais de <?php echo $total_usuarios; ?> usuários cadastrados.</p>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <h4>Pesquisa Avançada</h4>
            <form method="GET">
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select id="categoria" name="filtros[categoria]" class="form-control">
                        <option></option>
                        <?php foreach($categorias as $cat): ?>
                        <option value="<?php echo $cat['id']; ?>" <?php echo ($cat['id']==$filtros['categoria'])?'selected="selected"':''; ?>><?php echo $cat['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <select id="preco" name="filtros[preco]" class="form-control">
                        <option></option>
                        <option value="0-50" <?php echo ($filtros['preco']=='0-10000')?'selected="selected"':''; ?>>CVE 0 - 10000</option>
                        <option value="51-100" <?php echo ($filtros['preco']=='10001 - 50000')?'selected="selected"':''; ?>>CVE 10001 - 50000</option>
                        <option value="101-200" <?php echo ($filtros['preco']=='50001 - 100000')?'selected="selected"':''; ?>>CVE 50001 - 100000</option>
                        <option value="201-500" <?php echo ($filtros['preco']=='100001 - 1000000')?'selected="selected"':''; ?>>CVE 100001 - 1000000</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="estado">Estado de Conservação:</label>
                    <select id="estado" name="filtros[estado]" class="form-control">
                        <option></option>
                        <option value="0" <?php echo ($filtros['estado']=='0')?'selected="selected"':''; ?>>Novo</option>
                        <option value="1" <?php echo ($filtros['estado']=='1')?'selected="selected"':''; ?>>Semi-Novo</option>
                        <option value="2" <?php echo ($filtros['estado']=='2')?'selected="selected"':''; ?>>Usado</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Procurar" />
                </div>
            </form>

        </div>
        <div class="col-sm-9">
            <h4>Últimos Anúncios</h4>
            <table class="table table-striped">
                <tbody>
                    <?php foreach($anuncios as $anuncio): ?>
                    <tr>
                        <td>
                            <?php if(!empty($anuncio['url'])): ?>
                            <img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="50" border="0" />
                            <?php else: ?>
                            <img src="assets/images/default.jpg" height="50" border="0" />
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="produto.php?id=<?php echo $anuncio['id']; ?>"><?php echo $anuncio['titulo']; ?></a><br/>
                            <?php echo $anuncio['categoria']; ?>
                        </td>
                        <td>CVE <?php echo number_format($anuncio['valor'], 2); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <ul class="pagination">
                <?php for($q=1;$q<=$total_paginas;$q++): ?>
                <li class="<?php echo ($p==$q)?'active':''; ?>"><a href="index.php?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>


</div>
</div>
</div>
</div>

<?php require 'pages/footer.php'; ?>



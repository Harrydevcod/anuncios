<?php require_once 'config.php';
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>AnunciosS</title>
        <link rel="icon" href="assets/images/ico_escola.ico">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <script defer src="assets/js/fontawesome-all.min.js"></script>
        <link rel="stylesheet" href="assets/css/fontawesome.min.css">
        <link rel="stylesheet" href="assets/css/dashboard.css">
        <link rel="stylesheet" href="assets/css/style.css" />
  
    </head>
    <body>
        <nav class="navbar navbar-expand navbar-dark bg-primary">
            <a class="sidebar-toggle text-light mr-3">
                <span class="navbar-toggler-icon"></span>
            </a>
            <a class="navbar-brand" href="index.php">Anuncios</a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                     <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                        <a class="nav-link  menu-header" href="" id="navbarDropdownMenuLink" data-toggle="">
                           <li><span><?php echo $_SESSION['nome'] ;?></span></li>

                               </a>
                              <?php else: ?>

                        <li>   <a class="nav-link  menu-header" href="login.php" id="navbarDropdownMenuLink" data-toggle=""><span class="d-none d-sm-inline">Login</span></li></a>
                      
            
                <?php endif; ?>
                </ul>                
            </div>
        </nav>

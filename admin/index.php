
<?php
session_start();
//Index admin
?>
<!DOCTYPE html>
<?php
require './lib/php/admin_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);
?>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<header>
    <div class="container">
        <?php
        if (file_exists("./lib/php/admin_menu.php")) {
            require './lib/php/admin_menu.php';
        }
        ?>
    </div>
</header>
<section id="main">
    <div class="container-fluid lightYellow ">
        <?php
        if (!isset($_SESSION['page'])) {
            $_SESSION['page'] = "accueil_admin.php";
        }
        if (isset($_GET['page'])) {
            $_SESSION['page'] = $_GET['page'];
        }$path = "./pages/" . $_SESSION['page'];
        if (file_exists($path)) {
            include($path);
        } else {
            include("admin/pages/page404.php");
        }
        ?>
    </div>
</section>
<footer>
    <nav>
        <?php
        $path = "./lib/php/public_footer.php";
        if (file_exists("./lib/php/public_footer.php")) {
            require './lib/php/public_footer.php';
        }
        ?>
    </nav>
</footer>
</body>
</html>









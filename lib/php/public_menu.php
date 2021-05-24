<div class class="container">
    <div class="card text-center">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <a class="btn btn-outline-primary text-light"
                   href="./index_.php?page=accueil.php"><strong>Accueil</strong></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <a class="btn btn-outline-primary text-light" href="./index_.php?page=magasin.php"
                           class="btn btn-primary"><strong>Nos produits</strong></a>


                        <a class="btn btn-outline-primary text-light" href="./index_.php?page=galerie.php"
                           class="btn btn-primary"><strong>Galerie</strong></a>


                        <li class="nav-item dropdown">
                            <a class="btn btn-outline-primary text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <strong>Infos</strong>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./index_.php?page=jquery.php">jquery</a></li>
                                <li><a class="dropdown-item" href="./index_.php?page=contact.php">A Propos de nous</a></li>
                                <li><a class="dropdown-item" href="./index_.php?page=actuality.php">Infos covid</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Nos differents magasins</a></li>
                            </ul>
                        </li>

                        <?php
                        if(!isset($_SESSION['client'])){
                            ?>
                        <li class="nav-item">
                            <a class="btn btn-outline-primary text-light" href="./index_.php?page=login.php"
                               aria-current="page"><strong>Connexion</strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-primary text-light" href="./index_.php?page=inscription.php"
                               class="btn btn-primary"><strong>Inscription</strong></a>

                        </li>
                        <?php
                        }
                        ?>
                        <?php
                        if(isset($_SESSION['client'])){
                            ?>

                            <a class="btn btn-outline-primary text-light" href="./index_.php?page=panier.php"
                               class="btn btn-primary"><strong>Panier</strong></a>

                            <div class="dropdown">
                                <button class="btn-outline-success   btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Connecté
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                    <li><a class="dropdown-item bg-light" href=" ">  <img class="mb-4" src="./admin/images/profil.jpg" alt="" width="25" height="25">
                                            <?php print " ".$_SESSION['id_clt'];?></a></li>
                                    <li><a class="dropdown-item" href="./admin/index_.php?page=disconnect.php"><img class="mb-4" src="./admin/images/deco.jpg" alt="" width="25" height="25">Déconnexion</a></li>
                                </ul>
                            </div>



                            <?php

                        }
                        ?>

                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success"  type="submit">Search</button>
                    </form>


                </div>
            </div>

        </nav>
    </div>
</div>
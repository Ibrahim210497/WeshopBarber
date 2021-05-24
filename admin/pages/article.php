<?php
include('./lib/php/verifier_connexion.php');
if (isset($_SESSION['admin'])) {
    //print "<br/> Bienvenue dans la gestion du magasin";
}
?>
<section class="py-5 bg-primary text-light">
    <div class="container">
        <div class="row text-center">
            <h2>Bienvenue dans l'espace Administrateur</h2>
        </div>
    </div>
</section>
<section class="services py-5 bg-dark text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <a href="" class="text-body">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <i class="fa fa-tachometer fa-4x "></i></br>
                            <a href="index_.php?page=lister_clients.php"<strong><h5>Lister/Supprimer Clients</h5></strong>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <i class="fa fa-tachometer fa-4x "></i></br>
                        <a href="index_.php?page=edit_produits.php"<strong><h5>Ajouter/Modifier un produit</h5></strong>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <i class="fa fa-tachometer fa-4x "></i></br>
                        <a href="index_.php?page=gestion_produits.php"<strong><h5>Modifier /Supprimer produits</h5></strong>
                        </a>
                    </div>
                </div>
            </div>



            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <i class="fa fa-tachometer fa-4x "></i></br>
                        <a href="index_.php?page=lister_produits.php"<strong><h5>Lister produits</h5></strong>
                        </a>

                    </div>
                </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <i class="fa fa-tachometer fa-4x "></i></br>
                        <a href="index_.php?page=edit_clients.php"<strong><h5>Modifier données client</h5></strong>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <i class="fa fa-tachometer fa-4x "></i></br>
                        <a href="./index_.php?page=print_produit.php"<strong><h5>Imprimer liste des produits</h5></strong>
                        </a>

                    </div>
                </div>
                </a>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <i class="fa fa-tachometer fa-4x "></i></br>
                        <a href="./index_.php?page=lister_commandes.php"<strong><h5>Lister/Supprimer commandes</h5></strong>
                        </a>

                    </div>
                </div>
                </a>
            </div>


</section>
<section class="py-5 bg-primary text-light">
    <div class="container">
        <div class="row text-center">

        </div>
    </div>
</section>


<?php
include('./lib/php/verifier_connexion.php');

$com= new ComfactBD($cnx);
$liste = $com->getAllCommandes();
$nbr = count($liste);

?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Id commande</th>
        <th scope="col">Id Produit</th>
        <th scope="col">Prix</th>
        <th scope="col">quantité</th>
        <th scope="col">Date de livraison</th>
        <th scope="col">Id client</th>

    </tr>
    </thead>
    <tbody>


    <div class="card text-center">
        <div class="card-header">
            Liste des Commandes
        </div>
        <div class="card-body">
            <?php
            for ($i = 0; $i < $nbr; $i++) {
                ?>
                <tr>
                    <th scope="row">
                        <?php print $liste[$i]->id_comfact; ?>
                    </th>
                    <td>
            <span name="no" id="<?php print $liste[$i]->id_comfact; ?>">
            <?php print $liste[$i]->id_produit; ?>
            </span>
                    </td>
                    <td>
            <span name="prix" id="<?php print $liste[$i]->id_comfact; ?>">
            <?php print $liste[$i]->prix; ?>
            </span>
                    </td>
                    <td>
            <span name="quantite" id="<?php print $liste[$i]->id_comfact; ?>">
            <?php print $liste[$i]->quantite; ?>
            </span>
                    </td>
                    <td>
            <span name="stock" id="<?php print $liste[$i]->id_comfact; ?>">
            <?php print $liste[$i]->date_livraison; ?>
            </span>
                    </td>
                    <td>
            <span name="no" id="<?php print $liste[$i]->id_comfact; ?>">
            <?php print $liste[$i]->id_clt; ?>
            </span>
                    </td>
                </tr>
                <?php
            }
            ?>
        </div>
        <div class="card-footer text-muted">
        </div>
    </div>


    </tbody>
</table>

<div class="card ">
    <div class="card-header text-center bg-success">
        <h2>Supprimer une commande</h2>
    </div>
    <div class="card-body">
        <form class="row g-3" method="get" action="<?php print $_SERVER['PHP_SELF'];?>" id="formEditSupp">

            <div class="col-md-2">
                <label for="id_comfact" class="form-label">Id commande a supprimer</label>
                <input type="text" class="form-control" id="id_comfact" name="id_comfact">
            </div>

            <div class="col-12">

                <input type="hidden" name="page" value="lister_commandes.php" id="action" >
                <button type="submit" class="btn btn-success text-center" id="supprimer" name="supprimer"> supprimer</button>
            </div>
        </form>

    </div>
</div>

<?php
include ('./lib/php/verifier_connexion.php');
$prod = new ProduitBD($cnx);
$liste= $prod->getAllProduit();
$nbr=count($liste);


if (isset($_GET['supprimer'])) {
    //var_dump($_GET);
    extract($_GET, EXTR_OVERWRITE);


    ?>
    <pre><?php //var_dump($_GET); ?></pre><?php
    if (!empty($id_produit) ){
        $retour = $prod->DeleteProduit($id_produit);
        print "produit supprimé avec succes!";
        // print "retour : ".$retour;

    }

}
?>



<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">Prix</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for($i=0;$i<$nbr;$i++){
        ?>
        <tr>
            <th scope="row">
                <?php print $liste[$i]->id_produit;?>
            </th>
            <td>
            <span contenteditable="true" name="nom_produit" id="<?php print $liste[$i]->id_produit;?>">
            <?php print $liste[$i]->nom_produit;?>
            </span>
            </td>
            <td>
            <span contenteditable="true" name="description" id="<?php print $liste[$i]->id_produit;?>">
            <?php print $liste[$i]->description;?>
            </span>
            </td>
            <td>
            <span contenteditable="true" name="prix" id="<?php print $liste[$i]->id_produit;?>">
            <?php print $liste[$i]->prix;?>
            </span>
            </td>
            <td>
            <span contenteditable="true" name="stock" id="<?php print $liste[$i]->id_produit;?>">
            <?php print $liste[$i]->stock;?>

            </span>
            </td>
        </tr>

        <?php
    }
    ?>
    </tbody>
</table>

<div class="card ">
    <div class="card-header text-center bg-success">
        <h2>Supprimer un produit</h2>
    </div>
    <div class="card-body">
        <form class="row g-3" method="get" action="<?php print $_SERVER['PHP_SELF'];?>" id="formEditSupp">

            <div class="col-md-2">
                <label for="id_produit" class="form-label">Id produit a supprimer</label>
                <input type="text" class="form-control" id="id_produit" name="id_produit">
            </div>

            <div class="col-12">

                <input type="hidden" name="page" value="gestion_produits.php" id="action" >
                <button type="submit" class="btn btn-success text-center" id="supprimer" name="supprimer"> supprimer</button>
            </div>
        </form>

    </div>
</div>




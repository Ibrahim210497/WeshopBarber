<?php
include('./lib/php/verifier_connexion.php');
$prod = new ProduitBD($cnx);
$liste = $prod->getAllProduit();
$nbr = count($liste);
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">Prix</th>
        <th scope="col">stock</th>
        <th scope="col">image</th>
    </tr>
    </thead>
    <tbody>


    <div class="card text-center">
        <div class="card-header">
            LISTE DES PRODUITS
        </div>
        <div class="card-body">
            <?php
            for ($i = 0; $i < $nbr; $i++) {
                ?>
                <tr>
                    <th scope="row">
                        <?php print $liste[$i]->id_produit; ?>
                    </th>
                    <td>
            <span name="nom_produit" id="<?php print $liste[$i]->id_produit; ?>">
            <?php print $liste[$i]->nom_produit; ?>
            </span>
                    </td>
                    <td>
            <span name="description" id="<?php print $liste[$i]->id_produit; ?>">
            <?php print $liste[$i]->description; ?>
            </span>
                    </td>
                    <td>
            <span name="prix" id="<?php print $liste[$i]->id_produit; ?>">
            <?php print $liste[$i]->prix; ?>
            </span>
                    </td>
                    <td>
            <span name="stock" id="<?php print $liste[$i]->id_produit; ?>">
            <?php print $liste[$i]->stock; ?>
            </span>
                    </td>
                    <td>
           <span contenteditable="true" name="photo" id="<?php print $liste[$i]->id_produit; ?>">
    <img src="./images/<?php print $liste[$i]->image; ?> " width="55" height="40"
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

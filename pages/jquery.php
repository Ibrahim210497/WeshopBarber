<h2>Ajax</h2>
<?php
$prod = new ProduitBD($cnx);
$liste = $prod->getAllProduit();
$nbr=count($liste);
?>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <label for="id">Identifiant : </label>
    <select name="choix produit" id="choix_produit">
        <option value =" ">Choisissez</option>
        <?php
        for($i=0; $i<$nbr; $i++)
        {
            ?>
            <option value=" <?php print $liste[$i]->id_produit;?>">
                <?php print $liste[$i]->nom_produit;?>
            </option>
            <?php
        }
        ?>
    </select>
    <input type="submit" name="submit_id" value="Chercher " id="submit_id">
</form>
<div class="card-group" id="infoProduit">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <div id="id_produit"></div>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <div id="image_produit"></div>
        </div>
    </div>
</div>

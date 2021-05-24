<?php
include('./lib/php/verifier_connexion.php');

?>
<?php
$erreur = '';
if (isset($_GET['enregistrer'])) {
    extract($_GET, EXTR_OVERWRITE);

    if (empty($nom) || empty($description) || empty($prix) || empty($stock) || empty($reference)) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
    } else {
        $pr = new ProduitBD($cnx);
        $retour = $pr->addProduits($_GET);
        if($retour==1){
            print "<br/>Insertion effectuée";
        }
        else if($retour==2){
            print "<br/> Déjà encodé";
        }
        //var_dump($_GET);
    }
}
?>
<div class="block-30 block-30-sm item" style="background-image: url('./Admin/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-10">

            </div>
        </div>
    </div>
</div>


<div class="card ">
    <div class="card-header text-center">
       <h5>Ajout Produit</h5>
    </div>
    <div class="card-body">
        <?php print $erreur; ?>
        <form   method="get" action="<?php print $_SERVER['PHP_SELF']; ?>" >
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="nom">Nom produit</label>
                    <input type="text" class="form-control is-valid" id="nom" placeholder="" name="nom" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="description">Description</label>
                    <input type="text" class="form-control is-valid" id="description" placeholder=""
                           name="description" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="prix">Prix</label>
                    <input type="prix" class="form-control is-invalid" id="prix"name="prix"
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="stock">Stock</label>
                    <input type="stock" class="form-control is-valid" id="stock"  name="stock"
                           required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="password">reference</label>
                    <input type="reference" class="form-control is-valid" id="reference"
                           name="password"  required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
<div class="text-center">
    <input  type="submit" value="enregistrer" class="btn btn-primary" name="enregistrer" id="enregistrer">
</div>

        </form></div>

</div>
<?php include ('lib/php/verifier_connexion.php'); ?>

<?php
$produit = new ProduitBD($cnx);
if(isset($_GET['editer_ajouter'])){
    //var_dump($_GET);
    extract($_GET,EXTR_OVERWRITE);
    if($_GET['action'] == "editer"){
        ?><pre><?php     //var_dump($_GET);     ?></pre><?php
        if(!empty($reference) && !empty($nom_produit) && !empty($description) && !empty($prix) && !empty($stock) && !empty($id_cat) && !empty($image)){
            //3 instructions artificielles (devraient arriver d'un formulaire plus complet) :
           // $image = 'pdhom.jpg';
            //$id_cat = 2;
            $produit->mise_a_jourProduit($id_produit,$id_cat,$nom_produit,$description,$image,$prix,$stock,$reference);
           print 'produit mis à jour!!!';
        }
    } else if($_GET['action'] == "inserer") {
        ?><pre><?php     //var_dump($_GET);     ?></pre><?php
        if(!empty($reference) && !empty($nom_produit) && !empty($description) && !empty($prix) && !empty($stock) && !empty($id_cat) && !empty($image)){
            //print "ici";
            $retour=$produit->ajout_produit($id_cat,$nom_produit,$description,$image,$prix,$stock,$reference);
            print "produit ajouté avec succes!";
           print "retour : ".$retour;
        }
    }

}




?>


<div class="card ">
    <div class="card-header text-center bg-success">
        <h2>Editer / ajouter un produit</h2>
    </div>
    <div class="card-body">


        <form class="row g-3" method="get" action="<?php print $_SERVER['PHP_SELF'];?>" id="formEditAjout">

            <div class="col-md-2">
                <label for="reference" class="form-label">Référence</label>
                <input type="text" class="form-control" id="reference" name="reference">
            </div>
            <div class="col-md-5">
                <label for="denomination" class="form-label">Dénomination</label>
                <input type="text" class="form-control" id="denomination" name="nom_produit">
            </div>
            <div class="col-md-5">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="col-md-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="text" class="form-control" id="prix" name="prix">
            </div>
            <div class="col-md-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock"  name="stock">
            </div>
            <div class="col-md-3">
                <label for="id_cat" class="form-label">catégorie</label>
                <input type="number" class="form-control" id="id_cat"  name="id_cat">
            </div>
            <div class="col-md-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control" id="image"  name="image">
            </div>
            <div class="col-12">
                <input type="hidden" name="id_produit" id="id_produit">
                <input type="hidden" name="action" id="action" >
                <input type="hidden" name="page" value="edit_produits.php" id="action" >
                <button type="submit" class="btn btn-success text-center" id="editer_ajouter" name="editer_ajouter">Nouveau ou mettre à jour</button>
            </div>
        </form>

    </div>



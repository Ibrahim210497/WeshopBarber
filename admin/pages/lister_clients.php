<?php
include('./lib/php/verifier_connexion.php');
$cl = new ClientBD($cnx);
$liste = $cl->getAllClients();
$nbr = count($liste);

if (isset($_GET['supprimer'])) {
    //var_dump($_GET);
    extract($_GET, EXTR_OVERWRITE);


    ?>
    <pre><?php //var_dump($_GET); ?></pre><?php
    if (!empty($id_clt) ){
        $retour = $cl->DeleteClient($id_clt);
        print "client supprimé avec succes!";
        // print "retour : ".$retour;

    }

}
?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Telephone</th>
        <th scope="col">Email</th>
    </tr>
    </thead>
    <tbody>


    <div class="card text-center">
        <div class="card-header">
            LISTE DES CLIENTS
        </div>
        <div class="card-body">
            <?php
            for ($i = 0; $i < $nbr; $i++) {
                ?>
                <tr>
                    <th scope="row">
                        <?php print $liste[$i]->id_clt; ?>
                    </th>
                    <td>
            <span name="nom_produit" id="<?php print $liste[$i]->id_clt; ?>">
            <?php print $liste[$i]->nom; ?>
            </span>
                    </td>
                    <td>
            <span name="description" id="<?php print $liste[$i]->id_clt; ?>">
            <?php print $liste[$i]->prenom; ?>
            </span>
                    </td>
                    <td>
            <span name="prix" id="<?php print $liste[$i]->id_clt; ?>">
            <?php print $liste[$i]->telephone; ?>
            </span>
                    </td>
                    <td>
            <span name="stock" id="<?php print $liste[$i]->id_clt; ?>">
            <?php print $liste[$i]->email; ?>
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
        <h2>Supprimer un client</h2>
    </div>
    <div class="card-body">
        <form class="row g-3" method="get" action="<?php print $_SERVER['PHP_SELF'];?>" id="formEditSupp">

            <div class="col-md-2">
                <label for="id_clt" class="form-label">Id client a supprimer</label>
                <input type="text" class="form-control" id="id_clt" name="id_clt">
            </div>

            <div class="col-12">

                <input type="hidden" name="page" value="lister_clients.php" id="action" >
                <button type="submit" class="btn btn-success text-center" id="supprimer" name="supprimer"> supprimer</button>
            </div>
        </form>

    </div>
</div>

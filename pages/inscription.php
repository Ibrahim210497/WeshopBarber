<?php
$client = new ClientBD($cnx);
if (isset($_GET['inscription'])) {
    //var_dump($_GET);
    extract($_GET, EXTR_OVERWRITE);


    ?>
    <pre><?php //var_dump($_GET); ?></pre><?php
    if (!empty($nom) && !empty($prenom) && !empty($rue) && !empty($cp) && !empty($localite) && !empty($telephone) && !empty($email) && !empty($pass_clt) && !empty($matricule)) {

        $retour = $client->ajout_client($nom, $prenom, $rue, $cp, $localite, $telephone, $email, $pass_clt, $matricule);
        print "client ajouté avec succes!";
        // print "retour : ".$retour;

    }

}


?>


<div class="card ">
    <div class="card-header  bg-success">
        <h2>Incription</h2>
    </div>
    <div class="card-body">
        

        <div class="row">
            <div class="col-sm-4">
                <div class="card bg-dark ">

                </div>
            </div>
            <div class="col-sm-6">
                <div class="card bg-dark text-white">

                    <form class="row g-3" method="get" action="<?php print $_SERVER['PHP_SELF']; ?>" id="formInscription">
                        <!--
                        <div class="col-md-12">
                            Exemple à effacer <input type="text" id="recup" >
                        </div>
                        -->
                        <div class="col-md-2">
                            <label for="matricule" class="form-label">Matricule</label>
                            <input type="text" class="form-control" id="matricule" name="matricule">
                        </div>
                        <div class="col-md-4 ">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                        <div class="col-md-4">
                            <label for="prenom" class="form-label">Prenom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom">
                        </div>
                        <div class="col-md-5">
                            <label for="rue" class="form-label">Rue</label>
                            <input type="text" class="form-control" id="rue" name="rue">
                        </div>
                        <div class="col-md-5">
                            <label for="cp" class="form-label">Code postal</label>
                            <input type="number" class="form-control" id="cp" name="cp">
                        </div>
                        <div class="col-md-5">
                            <label for="localite" class="form-label">Localité</label>
                            <input type="text" class="form-control" id="localite" name="localite">
                        </div>
                        <div class="col-md-5">
                            <label for="telephone" class="form-label">Telephone</label>
                            <input type="text" class="form-control" id="telephone" name="telephone">
                        </div>
                        <div class="col-md-5">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="col-md-5">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pass_clt" name="pass_clt">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-success text-left" id="inscription" name="inscription">
                                S'inscrire
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

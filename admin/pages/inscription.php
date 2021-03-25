<?php
$erreur = '';
if (isset($_GET['id_clt'])) {
    extract($_GET, EXTR_OVERWRITE);

    if (empty($nom) || empty($prenom) || empty($rue) || empty($cp) || empty($localite) || empty($telephone) || empty($email) || empty($pass_clt)) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
    } else {
        $cl = new ClientBD($cnx);
        $retour = $cl->addClient($_GET);
        if ($retour == 1) {
            print "<br/>inscription réussie avec succès";
        } else if ($retour == 2) {
            print "<br/> possède déja un compte";
        }
        var_dump($_GET);
        $nbr = count($cl);
    }
}
?>
<div class="container ">

    <div class="card text-center ">
        <div class="block-30 block-30-sm item" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h2 class="heading">Bienvenue sur la page inscription</h2>
                    </div>
                </div>
            </div>
        </div>
        <?php print $erreur; ?>
        <form method="get" action="<?php print $_SERVER['PHP_SELF']; ?>">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control is-valid" id="nom_c" placeholder="nom" name="nom_c" value=""
                           required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control is-valid" id="prenom"
                           name="prenom" value="" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="adresse">Rue</label>
                    <input type="adresse" class="form-control is-invalid" id="rue" name="rue"
                           required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="cp">code postal</label>
                    <input type="cp" class="form-control is-valid" id="cp" name="email"
                           required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="loc">localite</label>
                    <input type="password" class="form-control is-valid" id="loc"
                           name="password" required>
                </div>
                <div class="form-row">

                    <div class="col-md-3 mb-3">
                        <label for="tel">Telephone</label>
                        <input type="tel" class="form-control is-invalid" id="tel" name="tel" placeholder="+32/xx.xx.xx"
                               required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control is-invalid" id="email" placeholder="aaaa@gmail.com"
                               name="email" required>

                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="pass">Password</label>
                        <input type="pass" class="form-control is-invalid" id="pass" name="cp" placeholder="pass"
                               required>

                    </div>


                </div>

            </div>
            <input type="submit" value="VALIDEZ" class="btn btn-primary" name="Inscription" id="Inscription">
        </form>

    </div>
</div>




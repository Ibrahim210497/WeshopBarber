<div class="card-body bg-dark ">
    <div class="card-body bg-dark">
        <div class="container bg-light">
            <?php

            if (isset($_POST['submit'])) {
                extract($_POST, EXTR_OVERWRITE);
                $cl = new ClientBD($cnx);
                $client = $cl->getClient($email, $pass_clt);
                if ($client!=0) {
                    $_SESSION['id_clt'] = $email;
                    $_SESSION['client'] = 'id';
                    print "Soyez le Bienvenue chez nous " .$_SESSION['id_clt'];
                    ?>
                    <meta http-equiv="refresh" ; content="0;URL=./index_.php?page=accueil.php">
                    <?php
                } else {
                    $message = "Identifiants incorrects";
                }
            }
            ?>


            <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <div class="mb-3 text-center">
                        <img class="mb-4" src="./admin/images/profil.jpg" alt="" width="100" height="100">
                        <h2>Connexion Client</h2>
                        <label for="email" class="visually-hidden">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required
                               autofocus>

                        <div class="mb-3 text-center">
                            <label for="pass_clt" class="visually-hidden">Password</label>
                            <input type="pass_clt" id="pass_clt" name="pass_clt" class="form-control" placeholder="Password"
                                   required autofocus>
                        </div>

                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <div class="text-center">
                        <button class="w-80 btn name btn-lg btn-primary rounded-pill " name="submit" type="submit">
                            Se connecter
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

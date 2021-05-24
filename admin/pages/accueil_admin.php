
<div class="card-body ">
    <div class="card-body bg-dark">
        <div class="container bg-light">
            <?php
            if (isset($_POST['submit'])) {
                extract($_POST, EXTR_OVERWRITE);
                $ad = new AdminBD($cnx);
                $admin = $ad->getAdmin($login, $password);
                if ($admin) {
                    $_SESSION['admin'] = 1;
                    print'vous etes bien connecté';
                    ?>
                    <meta http-equiv="refresh"; content="0;URL=./index_.php?page=article.php">
                  <?php
                } else {
                    $message = "Identifiants incorrects";
                }
            }
            ?>
            <p class=""><?php
                if (isset($message)) {
                    print $message;
                }
                ?></p>


            <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                <div class="mb-3 text-center">
                <img class="mb-4" src="./images/profil.jpg" alt="" width="100" height="100">
                    <h2>Connexion Admin</h2>
                    <label for="login" class="visually-hidden">login</label>
                    <input type="login" id="login" name="login" class="form-control" placeholder="login" required autofocus>
                </div>
                <div class="mb-3 text-center">
                    <label for="Password" class="visually-hidden">Password</label>
                    <input type="password" id="Password" name="password" class="form-control" placeholder="Password" required autofocus>
                </div>

                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <div class="text-center">
                            <button class="w-80 btn name btn-lg btn-primary rounded-pill "  name="submit"  type="submit">Submit</button>
                        </div>
                </fieldset>
            </form>
        </div>
    </div>

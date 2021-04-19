<?php
if(!isset($_SESSION['admin'])){
    print "Acces réservé";
    session_destroy();
    ?>
    <meta http-equiv="refresh"; content="2;URL=../index_.php">
    <?php

}
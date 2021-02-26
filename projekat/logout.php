<?php
    session_start();
    if (isset($_SESSION['id'])) {
        //brišemo sesiju ako postoji
        $_SESSION = array(); //session_unset();
        session_destroy();
    }

    header('Location: login.php');
<?php

    include_once("verificarLogin.php");
    include_once("menu.php");

?>

<h1>Seja bem vindo <?php print_r($_SESSION["user"] . "!"); ?></h1>

<?php

    session_start();

    if (!isset($_SESSION["user"])) {
        header("Location: http://localhost/cadastro_alunos/index.php");
        exit;
    }

?>
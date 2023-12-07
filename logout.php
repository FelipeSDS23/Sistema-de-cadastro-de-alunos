<?php

    session_start();
    session_destroy(); 
    header("Location: http://localhost/cadastro_alunos/index.php");

?>
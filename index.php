<?php

    require_once("menu.php");    
    require_once("login_form.php");
    require_once("ConnectDb.php");

    session_start();

    if (isset($_POST["submit"]) && !empty($_POST["user"]) && !empty($_POST["pass"])) {
        login($_POST["user"], $_POST["pass"]);
    } 
    
    function login($user, $pass) {
        $db = new ConnectDb("localhost", "root", "", "cadastro_alunos");
        $db->connect();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT idlogin, user, pass FROM login WHERE BINARY user = ? AND pass = ?");
        $stmt->bind_param("ss", $user, $pass);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $data = $result->fetch_all();

        if ($data) {
            /* LOGAR */
            header("Location: http://localhost/cadastro_alunos/home.php");
            $_SESSION["user"] = $_POST["user"];
            $_SESSION["userid"] = $data[0][0];
        } else {
            header("Location: http://localhost/cadastro_alunos/index.php?error=true");
            /* NÃO LOGAR */
        }
        
    }

?>


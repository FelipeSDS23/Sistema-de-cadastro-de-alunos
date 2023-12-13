<?php

    require_once("verificarLogin.php");
    require_once("menu.php");
    require_once("ConnectDb.php");

    if (isset($_POST["submit"]) && !empty($_POST["name"]) && !empty($_POST["phone"]) && !empty($_POST["email"])) {
        register($_POST["name"], $_POST["phone"], $_POST["email"]);
    } 

    function register($name, $phone, $email) {
        $db = new ConnectDb("localhost", "root", "", "cadastro_alunos");
        $db->connect();
        $conn = $db->connect();

        $stmt = $conn->prepare("INSERT INTO alunos VALUES(NULL, ?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $phone, $email, $_SESSION["userid"]);
        
        if ($stmt->execute()) {
            echo "Cadastrado com sucesso";
        } else {
            echo "Não cadastrado";
        }
    }

?>


<form action="" method="POST" class="formCadastro">
    <h2>Cadastrar Aluno</h2>
    <div>
        <label for="name">Nome Completo</label><br>
        <input type="text" name="name" id="name" maxlength="100" require>
    </div>
    <div>
        <label for="phone">Telefone</label><br>
        <input type="text" name="phone" id="phone" maxlength="20" require>
    </div>
    <div>
        <label for="email">E-mail</label><br>
        <input type="email" name="email" id="email" maxlength="100" require>
    </div>
    <div>
        <input type="submit" value="Cadastrar" name="submit" class="submitBtn">
    </div>
</form>


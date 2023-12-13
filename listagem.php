<?php

    require_once("verificarLogin.php");
    require_once("menu.php");
    require_once("ConnectDb.php");

    function recoverStudants() {
        $db = new ConnectDb("localhost", "root", "", "cadastro_alunos");
        $db->connect();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT name, phone, email, id_login FROM alunos WHERE id_login = ?");
        $stmt->bind_param("i", $_SESSION["userid"]);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $data = $result->fetch_all();
            return $data;
        } else {
            $data = false;
            return $data;
        }
    }

?>

<div class="listContainer">
    <h2>Alunos cadastrados</h2>

    <?php
        $alunos = recoverStudants();

        if ($alunos) {
            foreach($alunos as $aluno) {
                echo '<a href="">
                        <div class="studentContainer">
                            <span class="info">' . $aluno[0] . '</span>
                            <span class="info">' . $aluno[2] . '</span>
                            <span class="info">' . $aluno[1] . '</span>
                        </div>
                    </a>';
            }
        } else {
            echo "<p class='noStudantMessage'>Nenhum aluno cadastrado por este usuário, <a href='http://localhost/cadastro_alunos/cadastrar.php'>Clique aqui para cadastrar um novo aluno.</a></p>";
        }
    ?>

</div>

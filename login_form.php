    <form action="" method="POST" class="formLogin">
        <h1>Gerenciamento de alunos</h1>
        <p>Login</p>
        <div>
            <label for="user">Usuário</label><br>
            <input type="text" name="user" id="user" maxlength="100" require>
        </div>
        <div>
            <label for="pass">Senha</label><br>
            <input type="password" name="pass" id="pass" maxlength="100" required>
        </div>
        <div>
            <input type="submit" value="Entrar" name="submit" class="submitBtn">
        </div>


        <?php if(isset($_GET["error"])) : ?>   
            <div>
                <p class="errorMsg">Usuário ou senha invalido(a), por favor tente novamente</p>
            </div>
        <?php endif; ?>

    </form>
    
</body>
</html>
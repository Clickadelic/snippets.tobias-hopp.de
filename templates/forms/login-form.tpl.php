<form action="./index.php?action=loginUser" method="post">
    <input type="text" name="username" placeholder="Benutzername" id="username">
    <input type="password" name="password" placeholder="Passwort" id="password">
    <button>Login</button>
    <?php if(isset($_GET['error'])) {
        echo '<div class="pico-background-pink-600">Benutzername oder Passwort falsch</div>';
    }
    ?>
</form>
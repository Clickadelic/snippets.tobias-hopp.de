<form action="./index.php?action=save-snippet" method="post">
    <div><input type="text" name="snippet-name" placeholder="Snippet-Name" id="snippet-name"></div>
    <div><input type="text" name="description" placeholder="Description" id="description"></div>
    <div><input type="text" name="code" placeholder="Code" id="code"></div>

    <button>Login</button>
    <?php if(isset($_GET['error'])) {
        echo '<div class="pico-background-pink-600">Benutzername oder Passwort falsch</div>';
    }
    ?>
</form>
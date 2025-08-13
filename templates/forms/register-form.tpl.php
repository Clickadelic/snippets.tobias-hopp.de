<form action="index.php?action=register-user" method="POST">
    <input type="text" name="username" placeholder="Benutzername">
    <input type="email" name="email" placeholder="E-Mail">
    <input type="password" name="password" placeholder="Passwort">
    <input type="password" name="passwordRepeat" placeholder="Passwort wiederholen">
    <input type="hidden" name="agbOk" value="false" class="mb-0" />
    <div class="mb-1">
        <label>
            <input type="checkbox" name="agbOk"><a href="index.php?action=agb">AGB</a> und <a href="index.php?action=datenschutz">Datenschutz</a> gelesen und akzeptiert.
        </label>
    </div>
    <button type="submit">Registrieren</button>
</form>
 
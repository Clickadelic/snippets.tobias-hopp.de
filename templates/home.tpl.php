<?php 

if(!isset($_SESSION['user'])) { ?>
    <!-- Logged out -->
    <h2>Willkommen zurück bei den Snippets</h2>
    <p>Eine kleine Snippetdatenbank für Webentwickler.</p>
    <?php include __DIR__ .'/forms/login-form.tpl.php'; ?>
<?php } else { ?>
    <!-- Logged in -->
    <h2>Willkommen zurück, <?= $_SESSION['user']->getUsername(); ?>!</h2>
    <p>Wir freuen uns, dass du wieder da bist.</p>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=newSnippet" class="btn">Neues Snippet erstellen</a>
    
<?php } ?>
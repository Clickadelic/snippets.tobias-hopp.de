

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Snippet</title>
    <link rel="shortcut icon" href="./assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.colors.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/main.js"></script>
</head>
<body>
    <div class="container rounded" id="app">
        <header class="flex justify-between">
            <h1><a href="<?= $_SERVER['PHP_SELF']; ?>">Snippets</a></h1>
            <nav>
                <ul>
                    <?php
                    
                    if(isset($_SESSION['user'])) {
                        echo '<li><a href="./index.php?action=logout" title="Logout">Logout (' . $_SESSION['user']->getUsername() . ')</a></li>';
                    } else {
                        echo '<li><a href="./index.php?action=register-user" title="Register">Register</a></li>';
                        echo '<li><a href="./index.php?action=login" title="Login">Login</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </header>
        <?php
        if(isset($_GET['message'])){
            switch($_GET['message']) {
                case 'snippet-created':
                    echo '<div class="alert alert-success"><p class="alert-message mb-0">Snippet erfolgreich erstellt!</p></div>';
                break;
                case 'snippet-updated':
                    echo '<div class="alert alert-success"><p class="alert-message mb-0">Snippet erfolgreich aktualisiert!</p></div>';
                break;
                case 'snippet-deleted':
                    echo '<div class="alert alert-success"><p class="alert-message mb-0">Snippet erfolgreich gelöscht!</p></div>';
                break;
                case 'login-error':
                    echo '<div class="alert alert-warning"><p class="alert-message mb-0">Login fehlgeschlagen!</p></div>';
                break;
            }
        }
        ?>
        <main>
            <?php if(isset($tpl)) { include $tpl; } ?>
        </main>
        <footer class="my-1 text-center">
            <p class="text-sm">Powered by PicoCSS.</p>
        </footer>
    </div>
</body>
</html>
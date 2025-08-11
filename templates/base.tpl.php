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
                        echo '<li><a href="./index.php?action=register" title="Register">Register</a></li>';
                        echo '<li><a href="./index.php?action=login" title="Login">Login</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </header>
        <main>
            <?php if(isset($tpl)) { include $tpl; } ?>
        </main>
        <footer class="my-1 text-center">
            <p class="text-sm">Powered by PicoCSS.</p>
        </footer>
    </div>
</body>
</html>
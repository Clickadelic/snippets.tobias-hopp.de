<?php

require_once(dirname(__FILE__) ."/autoload.php");

session_start();

require_once("./helper/db.php");

$get = filter_input_array(INPUT_GET);

$action = $get["action"] ?? "home";

switch ($action) {

    // === Home ===
    case 'home':
        $sc = new SnippetController($dbh);
        if(isset($_SESSION['user'])){
            $snippets = $sc->findByUser($_SESSION['user']->getId());
        } else {
            $snippets = [];
        }

        $tpl = 'home.tpl.php';
        break;

    // === New Snippet ===
    case 'create-snippet':
        $tpl = './templates/forms/snippet-form.tpl.php';
        break;

    // === Save Snippet ===
    case 'save-snippet':
        $post = filter_input_array(INPUT_POST); // Formulardaten abgreifen
        $snippet = new Snippet(); // Neues Snippet Objekt erzeugen
        $snippet->arrayToObject($post); // Formulardaten in das Objekt schreiben
        $sc = new SnippetController($dbh); // SnippetController erzeugen
        $sc->insert($snippet); // Snippet in die Datenbank schreiben
        header("Location: index.php?message=snippet-created");
        break;

    // === View Snippet ===
    case 'view-snippet':
        $sc = new SnippetController($dbh);
        $snippet = $sc->findSnippetById($get['id']);
        $tpl = "templates/view-snippet.tpl.php";
        break;

    // === Delete Snippet ===
    case 'delete-snippet':
        $post = filter_input_array(INPUT_POST);
        $sc = new SnippetController($dbh);
        $sc->delete($get['id']);
        header("Location: index.php?message=snippet-deleted");
        break;

    // === Edit Snippet ===
    case 'edit-snippet':
        $post = filter_input_array(INPUT_POST);
        // $snippet = new Snippet();
        // $snippet->arrayToObject($post);
        $sc = new SnippetController($dbh);
        $snippet = $sc->findSnippetById($get['id']);
        $tpl = './templates/forms/snippet-form.tpl.php';
        break;

    // === Register page ===
    case 'register':
        $tpl = './templates/forms/register-form.tpl.php';
        break;

    // === Login page ===
    case 'login':
        $tpl = './templates/forms/login-form.tpl.php';
        break;
    
    // === Login User ===
    case 'login-user':
        $post = filter_input_array(INPUT_POST);
        // in $user ist nun ein User Objekt mit den ganzen Daten aus der Datenbank
        // oder ein Null, falls kein User mit dem benutzernamen gefunden wurde
        $user = (new UserController($dbh))->findByUsername($post['username']);
        if($user != null && password_verify($post['password'], $user->getPassword())) {
            $_SESSION['user'] = $user;
            header('Location: index.php');
        } else {
            header('Location: index.php?action=login?error=1');
            die();
        }
        break;
    
    // === Register User ===
    case 'register-user':
        $post = filter_input_array(INPUT_POST);
        $user = new User();
        $user->arrayToObject($post);
        $user->setHashedPassword($post['password']);
        $uc = new UserController($dbh);
        $uc->save($user);
        header('Location: index.php?action=login');
        break;

    // === Logout User ===
    case 'logout-user':
        session_destroy();
        header('Location: index.php?action=logged-out');
        break;

    default:
        $tpl = 'home.tpl.php';
        break;  
}

include_once "./templates/base.tpl.php";
                
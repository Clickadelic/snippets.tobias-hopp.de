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
    case 'newSnippet':
        $tpl = './templates/forms/snippet-form.tpl.php';
        break;

    // === Save Snippet ===
    case 'saveSnippet':
        $post = filter_input_array(INPUT_POST);
        $snippet = new Snippet();
        $snippet->arrayToObject($post);
        $sc = new SnippetController($dbh);
        $sc->insert($snippet);
        break;

    // === View Snippet ===
    case 'viewSnippet':
        $sc = new SnippetController($dbh);
        $snippet = $sc->findSnippetById($get['id']);
        // echo '<pre>';
        // var_dump($snippet);
        // echo '</pre>';
        $tpl = "templates/view-snippet.tpl.php";
        break;

    // === Save Snippet ===
    case 'deleteSnippet':
        
        $sc = new SnippetController($dbh);
        $sc->insert($snippet);
        break;

    // === Edit Snippet ===
    case 'editSnippet':
        $post = filter_input_array(INPUT_POST);
        $snippet = new Snippet();
        $snippet->arrayToObject($post);
        $sc = new SnippetController($dbh);
        $sc->insert($snippet);
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
    case 'loginUser':
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
    case 'regUser':
        $post = filter_input_array(INPUT_POST);
        $user = new User();
        $user->arrayToObject($post);
        $user->setHashedPassword($post['password']);
        $uc = new UserController($dbh);
        $uc->save($user);
        header('Location: index.php?action=login');
        break;

    // === Logout User ===
    case 'logout':
        session_destroy();
        header('Location: index.php?action=logged-out');
        break;

    default:
        $tpl = 'home.tpl.php';
        break;  
}

include_once "./templates/base.tpl.php";
                
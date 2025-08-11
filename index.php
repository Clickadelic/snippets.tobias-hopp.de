<?php

require_once(dirname(__FILE__) ."/autoload.php");

session_start();

require_once("./helper/db.php");

$get = filter_input_array(INPUT_GET);

$action = $get["action"] ?? "home";

switch ($action) {
    case 'home':
        $tpl = 'home.tpl.php';
        break;

    case 'register':
        $tpl = './templates/forms/register-form.tpl.php';
        break;

    case 'login':
        $tpl = './templates/forms/login-form.tpl.php';
        break;
    
    case 'loginUser':
        $post = filter_input_array(INPUT_POST);
        // in $user ist nun ein User Objekt mit den ganzen Daten aus der Datenbank
        // oder ein Null, falls kein User mit dem benutzernamen gefunden wurde
        $user = (new UserController($dbh))->findByUsername($post['username']);
        if(!$user != null && password_verify($post['password'], $user->getPassword())) {
            $_SESSION['user'] = $user;
            header('Location: index.php');
        } else {
            header('Location: index.php?action=login?error=1');
            die();
        }
        break;
    
    case 'regUser':
        $post = filter_input_array(INPUT_POST);
        $user = new User();
        $user->arrayToObject($post);
        $user->setHashedPassword($post['password']);
        $uc = new UserController($dbh);
        $uc->insert($user);

        break;

    case 'logout':
        session_destroy();
        header('Location: index.php?action=logged-out');
        break;

    default:
        $tpl = 'home.tpl.php';
        break;
}

include_once "./templates/base.tpl.php";
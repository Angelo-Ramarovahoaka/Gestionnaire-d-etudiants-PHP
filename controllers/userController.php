<?php
    include_once '../classes/user.php';
    include_once '../classes/db.php';
    session_start();
    $database= new Db();
    $db=$database->connection();
    $user= new User($db);
    $action= isset($_GET['action'])? $_GET['action'] : die('error:action not found');
    
    switch($action){
        case 'create':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $user->username = $_POST['username'];
                    $user->email = $_POST['email'];
                    $user->password = $_POST['password'];
                    
                    if ($user->verifyUser()) {
                        die('user already exists');
                    }
                    if ($user->create()) {
                        header('location: ../index.php');
                    }
                } else {
                   
                    header('location: ../display/users/createUser.php');
                }
            break;
        
        case 'login':
            $user-> email = $_POST['email'];
            $user-> password = $_POST['password'];
            $user_info = $user->login(); 
            // echo $user_info['password'];
            if ($user->password === $user_info['password']) {
                $_SESSION['user_id'] = $user_info['id'];
                $_SESSION['username'] = $user_info['username'];
                header('location: ../controllers/etudiantController.php?action=read');
            }
            else{
                echo 'Email or mot de passe wrong.';
            }
            break;
        case 'logout':
            session_start();
            // Suppression de toutes les variables de session
            session_unset();
            // Destruction de la session
            session_destroy();
            header('Location: ../index.php');
            break;
    }
?>
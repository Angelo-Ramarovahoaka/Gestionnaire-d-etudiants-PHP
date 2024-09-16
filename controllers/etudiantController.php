<?php
    include_once '../classes/etudiants.php';
    include_once '../classes/db.php';
    session_start();
    $database= new Db();
    $db=$database->connection();
    $etudiant= new Etudiants($db);
    $action= isset($_GET['action'])? $_GET['action'] : die('error:action not found');
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../index.php");
        exit();
    }

    switch($action){
        case 'create':
            $etudiant -> firstname = $_POST['firstname'];
            $etudiant -> lastname = $_POST['lastname'];
            $etudiant -> parcours= $_POST["parcours"];
            $etudiant -> date_of_birth = $_POST["date_of_birth"];
            $etudiant -> adresse = $_POST["adresse"];
            $etudiant -> sex = $_POST["sex"];
            if ($etudiant ->verifyEtudiants()) {
                echo "<p> nom et prenom dejà existé </p>";
                header('location: etudiantController.php?action=read');
            }
            elseif ($etudiant -> create()) {
                header('location: etudiantController.php?action=read');
            }else{
                header('location: ../display/etudiants/etudiants.php');
            }
            break;
        case 'read':
            $etudiant->id= $_SESSION['user_id'];
            $etudiants = $etudiant-> read();
            // echo $_SESSION['user_id'];
                require '../display/etudiants/etudiants.php';
            break;
        case 'search':
            $etudiant->search=$_POST['search'];
            $etudiant->id=$_SESSION['user_id'];
            $etudiants = $etudiant-> search();
            // echo 'ito';
                require '../display/etudiants/etudiants.php';
            break;
        case 'delete': 
            $id=$_GET['id'];
            $etudiant -> id = $id;
            if($etudiant-> delete()){
                header('location: etudiantController.php?action=read');
            }
            else{
                echo 'tsss';
            }
            break;
        case 'update':
            $etudiant -> firstname = $_POST['firstname'];
            $etudiant -> lastname = $_POST['lastname'];
            $etudiant -> parcours= $_POST["parcours"];
            $etudiant -> date_of_birth = $_POST["date_of_birth"];
            $etudiant -> adresse = $_POST["adresse"];
            $etudiant -> sex = $_POST["sex"];
            $etudiant -> id = $_GET['id'];
            if($etudiant-> update()){
                header('location: etudiantController.php?action=read');
            }
            else{
                echo 'tsss';
            }
            break;
        case 'detail':
            $id = $_GET['id'];
            $etudiant->id = $id;
            $etudiantDetails = $etudiant->detail();
            if ($etudiantDetails) {
                require '../display/etudiants/detail.php'; 
            } else {
                echo 'Étudiant non trouvé.';
            }
            break;

        case 'detailUpdate':
            $id = $_GET['id'];
            $etudiant->id = $id;
            $etudiantDetails = $etudiant->detail();
            if ($etudiantDetails) {
                require '../display/etudiants/update.php'; 
            } else {
                echo 'Étudiant non trouvé.';
            }
            break;
        default:
            echo "ERROR: invalid ACTION.";
            break;
    }
    
    if ($_GET['action'] == 'get') {
        $id = $_GET['id'];
        // Récupérer l'étudiant à partir de l'ID
        $etudiant = $studentManager->getStudentById($id); // Assure-toi d'avoir cette méthode dans ton gestionnaire d'étudiant
    
        // Renvoie les données de l'étudiant au format JSON
        echo json_encode($etudiant);
        exit;
    }
    
?>
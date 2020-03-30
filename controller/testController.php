<?php 



/**
 * Signin
 *
 * @return void
 * 
 * Formulaire de connexion admin
 */
function admin() 
{
    include_once 'view/adminSignIn.php';
}


function adminController()
{

    // session_start();
    /* Connexion à la bdd pour inscrire un nouveau membre dans bdd */
    try {
        $db = new PDO('mysql:host=localhost;dbname=littles;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $membreManager = new MembreManager($db);
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }

    $email = $_GET['email'];
    $pass = $_GET['pass'];

    if (isset($email) && !empty($email) && isset($pass) && !empty($pass)) {

        if ($membreManager->exists($email)) {
            if ($membreManager->signIn($email, $pass)) {
                /* verifie si le user est un admin */
                if ($membreManager->admin($email)) { 
                    $membre = $membreManager->get($email);
                    session_start();
                    
                    $response = true;
                       $_SESSION['user'] = 'administrateur';
                       $_SESSION['email'] = $membre->email();
                       $_SESSION['name'] = $membre->name();
                    
                } else {
                    $response = "Vous n'avez pas accès.";
                }
            } else { 
                $response = "Mot de passe incorrect.";
            }

        } else {
            $response = "Vous n'avez pas accès.";
        }
        
    }

    echo $response;

}
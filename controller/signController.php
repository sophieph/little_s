<?php 

require 'model/MembreManager.php';
require 'model/Membre.php';


/**
 * Signin
 *
 * @return void
 * 
 * Connexion en tant que membre
 */
function signin() {
    
    var_dump($_POST['email']);
    var_dump($_GET['email']);

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
                $membreConnecte = $membreManager->get($email);
                $response = true;
            } else { 
                $response = "Mot de passe incorrect";
            }

        } else {
            $response = '<a href="form-sign-up.php">Incrivez-vous</a> pour vous connecter.';
        }    
    }

    echo $response;

    include 'view/signinView.php';
}

/**
 * Signup
 *
 * @return void
 * 
 * Inscription à 
 */
function signup() {
    include 'view/signupView.php';
}
<?php 

require 'model/MembreManager.php';
require 'model/Membre.php';


/**
 * Signin
 *
 * @return void
 * 
 * Formulaire de connexion
 */
function signin() 
{
    include_once 'view/signinView.php';
}

/**
 * SigninController
 *
 * @return void
 * 
 * Connexion en tant que membre
 */
function signinController() 
{

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
            $response = '<a href="index.php?action=signup">Inscrivez-vous</a> pour vous connecter.';
        }    
    }

    echo $response;

    //include 'view/signinView.php';
}

/**
 * Signup
 *
 * @return void
 * 
 * Inscription à 
 */
function signup() 
{
    include 'view/signupView.php';
}
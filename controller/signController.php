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
}

/**
 * Signup
 *
 * @return void
 * 
 * Formulaire d'inscription
 */
function signup() 
{
    include 'view/signupView.php';
}

/**
 * SignupController
 *
 * @return void
 * 
 * Inscription du membre dans la bdd
 */
function signupController() 
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=littles;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $membreManager = new MembreManager($db);
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }


    $name = $_GET['name'];
    $email = $_GET['email'];
    $pass = $_GET['pass1'];
    $category = $_GET['category'];

    if (isset($name) && !empty($name) && isset($email) && !empty($email) && isset($pass) && !empty($pass) && isset($category) && !empty($category)) {

        $membre = new Membre(
            ['name' => $name,
            'email' => $email,
            'password' => $pass,
            'category' => $category]
        );

        if ($membreManager->exists($membre->email())) {
            $response = "Le mail existe déjà. Utilisez un autre mail.";
        } else {
            $membreManager->add($membre);
            $response = 'Vous êtes inscrit. <a href="index.php?action=signin">Connectez-vous</a> !';
        }       
    }

    echo $response;
}
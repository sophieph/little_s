<?php 

require 'config.php';
require ROOT_PATH . 'model/membre/MembreManager.php';
require ROOT_PATH . 'model/membre/Membre.php';


/**
 * Signin
 *
 * @return void
 * 
 * form connection 
 */
function signin() 
{
    include_once ROOT_PATH . 'view/signing/signinView.php';
}

/**
 * SigninController
 *
 * @return void
 * 
 * Log in 
 */
function signinController() 
{
    $db = db();
    $membreManager = new MembreManager($db);

    $email = $_GET['email'];
    $pass = $_GET['pass'];

    if (isset($email) && !empty($email) && isset($pass) && !empty($pass)) {

        if ($membreManager->exists($email)) {

            $membre = $membreManager->get($email);
            $password_hashed = $membre->password();
            if (password_verify($pass, $password_hashed)) {

                $response = true;
    
                session_start();
                $_SESSION['user'] = 'membre';
                $_SESSION['id'] = $membre->id();
                $_SESSION['email'] = $membre->email();
                $_SESSION['name'] = $membre->name();
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
                
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
 * Subscribers form
 */
function signup() 
{
    include_once ROOT_PATH . 'view/signing/signupView.php';
}

/**
 * SignupController
 *
 * @return void
 * 
 * Form to subscribe as a member
 */
function signupController() 
{
    $db = db();
    $membreManager = new MembreManager($db);

    $name = $_GET['name'];
    $email = $_GET['email'];
    $pass = $_GET['pass1'];
    $category = $_GET['category'];

    if (isset($name) && !empty($name) && isset($email) && !empty($email) && isset($pass) && !empty($pass) && isset($category) && !empty($category)) {

        $options = [
            'cost' => 12,
        ];
        $hashed_password = password_hash($pass, PASSWORD_BCRYPT, $options);
              
        $membre = new Membre(
            ['name' => $name,
            'email' => $email,
            'password' => $hashed_password,
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


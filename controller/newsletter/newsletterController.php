<?php 

require ROOT_PATH . 'model/newsletter/NewsletterManager.php';
require ROOT_PATH . 'model/newsletter/Newsletter.php';

/**
 * Subscribe
 *
 * @return void
 * 
 * Inscription à la newsletter
 */
function subscribe() 
{
    /* Connexion à la bdd pour inscrire l'email dans la newsletter */
    try {
        $db = new PDO('mysql:host=localhost;dbname=littles;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $manager = new NewsletterManager($db);
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }

    
    if (isset($_GET['emailNewsletter']) && !empty($_GET['emailNewsletter'])) {
        $email = new Newsletter(['email' => $_GET['emailNewsletter']]);
    } else {
        return false;
    }

    if (isset($email)) {
        if ($manager->exists($email->email())) {
            $response = "Le mail existe déjà.";
        } else {
            $manager->add($email);
            $response = "Vous êtes inscrit à la newsletter.";
        }
    } 
    
    echo $response;
}

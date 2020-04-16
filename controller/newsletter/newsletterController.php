<?php 

require ROOT_PATH . 'model/newsletter/NewsletterManager.php';
require ROOT_PATH . 'model/newsletter/Newsletter.php';

/**
 * Subscribe
 *
 * @return void
 * 
 * Subscribe to newsletter
 */
function subscribe() 
{
    $db = db();
    $manager = new NewsletterManager($db);
    
    if (isset($_GET['emailNewsletter']) && !empty($_GET['emailNewsletter'])) {
        $email = new Newsletter(['email' => $_GET['emailNewsletter']]);
    } else {
        return false;
    }

    if (isset($email)) {
        if ($manager->exists($email->email())) {
            $response = "Le mail existe déjà. <br> Vous êtes déjà inscrit.";
        } else {
            $manager->add($email);
            $response = "Vous êtes inscrit à la newsletter.";
        }
    } 
    
    echo $response;
}

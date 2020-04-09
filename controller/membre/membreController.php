<?php

/**
 * Account
 *
 * @return void
 * 
 * Acocunt of member logged in
 */
function account()
{
    $db = db();
    $membreManager = new MembreManager($db);

    if (isset($_GET['user'])) {
        $email = $_GET['user'];
        $membre = $membreManager->get($email);
        
        $name = $membre->name();
        $mail = $membre->email();
    }




    include_once ROOT_PATH . 'view/membre/account.php';
}
<?php

/**
 * Account
 *
 * @return void
 * 
 * Account of member logged in
 */
function account()
{
    $db = db();
    $membreManager = new MembreManager($db);

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        $membre = $membreManager->get($email);
        
        $name = $membre->name();
        $mail = $membre->email();
        $home = $membre->home();
    }
    include_once ROOT_PATH . 'view/membre/account.php';
}

/**
 * Edit
 *
 * @return void
 * 
 * edit info of a member
 */
function editMember()
{
    $db = db();
    $membreManager = new MembreManager($db);

    if (isset($_GET['email']) && isset($_GET['home']) && isset($_GET['name'])) {
        $email = $_GET['email'];
        $home = $_GET['home'];
        $name = $_GET['name'];

        $id = $membreManager->get($email)->id();
        
        $membre = new Membre(
            [
            'id' => $id,
            'name' => $name,
            'home' => $home
            ]
        );

        $membreManager->edit($membre);

    } 

    // include_once ROOT_PATH . 'view/membre/account.php';
}
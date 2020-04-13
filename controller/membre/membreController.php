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

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $membre = $membreManager->getId($id);
        
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

/**
 * History
 *
 * @param  mixed $id
 * @return void
 * 
 * get a list of command history
 */
function history($id)
{
    $db = db();
    $membreManager = new MembreManager($db);
    $commandeManager = new CommandeManager($db);


    $membre = $membreManager->getId($id);

    $commandes = $commandeManager->getHistory($id);
    
    include_once ROOT_PATH . 'view/membre/history.php';
}

/**
 * Order
 *
 * @param  mixed $id
 * @return void
 * 
 * Get details of a command
 */
function order($id)
{
    $db = db();
    $membreManager = new MembreManager($db);
    $detailManager = new DetailCommandeManager($db);

    $membre = $membreManager->getId(1);
    $idMembre = $membre->id();

    $details = $detailManager->getOrder($id);
    
    include_once ROOT_PATH . 'view/membre/commande.php';
}
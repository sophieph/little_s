<?php 

require ROOT_PATH . 'model/panier/PanierManager.php';
require ROOT_PATH . 'model/panier/Panier.php';
require ROOT_PATH . 'model/commande/CommandeManager.php';
require ROOT_PATH . 'model/commande/Commande.php';
require ROOT_PATH . 'model/detailCommande/DetailCommandeManager.php';
require ROOT_PATH . 'model/detailCommande/DetailCommande.php';

/**
 * Basket
 *
 * @return void
 * 
 * display basket
 */
function basket($id = null)
{
    $db = db();
    $produitManager = new ProduitManager($db);
    $panierManager = new PanierManager($db);

    $paniers = $panierManager->getBasket($id);
    
    $price = $panierManager->totalPrice($id);
    $item = $panierManager->countItem($id);

    
    include_once ROOT_PATH . 'view/panier/basket.php';
    
}

function bask()
{
    include_once ROOT_PATH . 'view/panier/bask.php';
}

/**
 * AddToBasket
 *
 * @return void
 * 
 * add product to basket
 */
function addToBasket()
{
    $db = db();
    $panierManager = new PanierManager($db);
    $produitManager = new ProduitManager($db);

    if (isset($_GET['id']) && isset($_GET['codeProduit']) ) {
        $idMember = $_GET['id'];
        $codeProduit = $_GET['codeProduit'];

        $produit = new Panier(
            [
                'idMembre' => $idMember,
                'codeProduit' => $codeProduit,
                'quantity' => 1
            ]
        );

        $quantity = $panierManager->getQuantity($idMember, $codeProduit);

        if ($quantity >= 1) {
            $panierManager->changeQuantity($idMember, $codeProduit, '+1');
        } else {
            $panierManager->add($produit);
        }
        
    }

    include_once ROOT_PATH . 'view/panier/basket.php';
}

/**
 * DeleteItem
 *
 * @return void
 * 
 * delete an item to Basket
 */
function deleteItem()
{

    $db = db();
    $panierManager = new PanierManager($db);

    if (isset($_GET['id']) && isset($_GET['code'])) {
        $idMember = $_GET['id'];
        $codeProduit = $_GET['code'];
        $panierManager->deleteItem($idMember, $codeProduit);
    }
    
    homepage();

}

/**
 * ChangeQuantity
 *
 * @return void
 * 
 * change quantity in basket
 */
function changeQuantity() 
{
    $db = db();
    $panierManager = new PanierManager($db);

    if (isset($_GET['id']) && isset($_GET['code']) && isset($_GET['change'])) {
        $idMember = $_GET['id'];
        $codeProduit = $_GET['code'];
        $change = $_GET['change'];
        
        $quantity = $panierManager->getQuantity($idMember, $codeProduit);

        if ($quantity == 1 && $change == '-') {
            $panierManager->deleteItem($idMember, $codeProduit);
            $response = "delete";
        } else if ($quantity > 1 && $change == '-') {
            $panierManager->changeQuantity($idMember, $codeProduit, '-1');
            $response = "-1";
        } else {
            $panierManager->changeQuantity($idMember, $codeProduit, '+1');
            $response = "nooon";
        }
        
    }

 
    echo $response;
}

function checkout($id)
{
    if ($id == 0) {
        $msg = 'lol';
    } else {
        $db = db();
        $produitManager = new ProduitManager($db);
        $panierManager = new PanierManager($db);

        $paniers = $panierManager->getBasket($id);
        
        $price = $panierManager->totalPrice($id);
        $item = $panierManager->countItem($id);
    }
    include_once ROOT_PATH . 'view/panier/checkout.php';
}

function delivery($id)
{
    if ($id == 0) {
        $msg = 'lol';
    } else {
        $db = db();
        $membreManager = new MembreManager($db);
        $produitManager = new ProduitManager($db);
        $panierManager = new PanierManager($db);

        $paniers = $panierManager->getBasket($id);
        
        $price = $panierManager->totalPrice($id);
        $item = $panierManager->countItem($id);
    
        $membre = $membreManager->getId($id);
        $name = $membre->name();
        $mail = $membre->email();
        $home = $membre->home();
        

    }
    include_once ROOT_PATH . 'view/panier/delivery.php';
}

function payment($id)
{

    if ($id == 0) {
        $msg = 'lol';
    } else {
        $db = db();
        $produitManager = new ProduitManager($db);
        $panierManager = new PanierManager($db);

        $paniers = $panierManager->getBasket($id);
        
        $price = $panierManager->totalPrice($id);
        $item = $panierManager->countItem($id);

    
    }

    include_once ROOT_PATH . 'view/panier/payment.php';

}

function recap($id) 
{

    if ($id == 0) {
        $msg = 'lol';
    } else {
        $db = db();
        $produitManager = new ProduitManager($db);
        $panierManager = new PanierManager($db);
        $commandeManager = new CommandeManager($db);
        $detailManager = new DetailCommandeManager($db);

        $paniers = $panierManager->getBasket($id);
        
        $price = $panierManager->totalPrice($id);
        $item = $panierManager->countItem($id);

        $numeroCommande = generateRandomString();
        $date = date('Y-m-d');

        $commande = new Commande(
            [   
                'idMembre' => $id,
                'date' => $date,
                'commande' => $numeroCommande,
                'price' => $price
            ]
        );

        $commandeManager->add($commande);



        foreach ($paniers as $panier) {
            $detail = new DetailCommande(
                [
                    'idMembre' => $id,
                    'commande' => $numeroCommande,
                    'codeProduit' => $panier['codeProduit'],
                    'quantity' => $panier['quantity']
                ]
            );

            $detailManager->add($detail);
        }

        $panierManager->deleteBag($id);
        
    
    }

    include_once ROOT_PATH . 'view/panier/recap.php';

}

function generateRandomString($length = 6) 
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        if ($i == 3) {
            $randomString .= '-';
        }
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
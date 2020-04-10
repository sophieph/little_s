<?php 

require ROOT_PATH . 'model/panier/PanierManager.php';
require ROOT_PATH . 'model/panier/Panier.php';

/**
 * Basket
 *
 * @return void
 * 
 * display basket
 */
function basket($id)
{
    $db = db();
    $produitManager = new ProduitManager($db);
    $panierManager = new PanierManager($db);

    $paniers = $panierManager->getBasket($id);
    


    include_once ROOT_PATH . 'view/panier/basket.php';
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

        $panierManager->add($produit);
    }

    include_once ROOT_PATH . 'view/panier/basket.php';
}

/**
 * DeleteItem
 *
 * @param  mixed $idMember
 * @param  mixed $codeProduit
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

        
        // if ($change == '+') {
        //     // $panierManager->changeQuantity($idMember, $codeProduit, '+1');
        //     $response = $change;
        // } else {
        //     $response = 'no';
        // }
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
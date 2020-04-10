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

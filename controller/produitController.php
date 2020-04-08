<?php 



/**
 * Product
 *
 * @return void
 * 
 * list products by category
 */
function product($category)
{
    $db = db();
    $produitManager = new ProduitManager($db); 

    $produits = $produitManager->getListByCategory($category);

    include_once ROOT_PATH . 'view/product/catalogueProduct.php';
}

/**
 * Product
 *
 * @return void
 * 
 * list products by news
 */
function news()
{
    $db = db();
    $produitManager = new ProduitManager($db); 

    $produits = $produitManager->getListByNews();

    include_once ROOT_PATH . 'view/product/catalogueProduct.php';
}

/**
 * productCard
 *
 * @param  mixed $id
 * @return void
 * 
 * show a product card
 */
function productCard($id)
{

    $db = db();
    $produitManager = new ProduitManager($db); 
    $imageProduitManager = new ImageProduitManager($db);

    $product = $produitManager->get($id);
    $images = $imageProduitManager->getListImage($id);
    
    include_once ROOT_PATH . 'view/product/cardProduct.php';
}

function orderProduct()
{

    $db = db();
    $produitManager = new ProduitManager($db); 

    if (isset($_GET['order']) && !empty($_GET['order']) && isset($_GET['category'])) {
        $order = $_GET['order'];
        $category = $_GET['category'];
        $produitManager->getListByPrice($order, $category);
        $produits =  $produitManager->getListByPrice($order, $category);
        $response = 'youhou';
        
    } else {
        $response = 'nope';
    }

    echo $response;

    include_once ROOT_PATH . 'view/product/catalogueProduct.php';
}

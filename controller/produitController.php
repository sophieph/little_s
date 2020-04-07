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

    include_once 'view/catalogueProduct.php';
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

    include_once 'view/catalogueProduct.php';
}

/**
 * productCard
 *
 * @param  mixed $id
 * @return void
 * 
 * show a product card
 */
function productCard($id) {

    $db = db();
    $produitManager = new ProduitManager($db); 
    $imageProduitManager = new ImageProduitManager($db);

        $product = $produitManager->get($id);
        $images = $imageProduitManager->getListImage($id);
    
    include_once 'view/cardProduct.php';
}
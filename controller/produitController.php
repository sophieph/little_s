<?php 


/**
 * Product
 *
 * @return void
 * 
 * liste les produits par categorie
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
 * liste les produits par nouveautés
 */
function news()
{
    $db = db();
    $produitManager = new ProduitManager($db); 

    $produits = $produitManager->getListByNews();

    include_once 'view/catalogueProduct.php';
}

function productCard($id) {

    $db = db();
    $produitManager = new ProduitManager($db); 
    $imageProduitManager = new ImageProduitManager($db);

        $product = $produitManager->get($id);
        $images = $imageProduitManager->getListImage($id);
    
    include_once 'view/cardProduct.php';
}
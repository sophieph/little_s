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
 * ProductCard
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

/**
 * SortProduct
 *
 * @return void
 * 
 * Sort products
 */
function sortProduct()
{

    $db = db();
    $produitManager = new ProduitManager($db); 

    if (isset($_GET['sort']) && !empty($_GET['sort']) && isset($_GET['category']) ) {
        $sort = $_GET['sort'];
        $category = $_GET['category'];
        $produitManager->getListByPrice($sort, $category);
        $produits =  $produitManager->getListByPrice($sort, $category);  
    } 

    include_once ROOT_PATH . 'view/product/catalogueProduct.php';
}

/**
 * SearchProduct
 *
 * @return void
 * 
 * Search product according to words
 */
function searchProduct()
{
    $db = db();
    $produitManager = new ProduitManager($db); 

    if (isset($_GET['str']) && !empty($_GET['str'])) {
        $str = $_GET['str'];
        $produits =  $produitManager->search($str);
    }

    include_once ROOT_PATH . 'view/product/search.php';
}


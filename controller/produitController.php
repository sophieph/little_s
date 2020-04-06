<?php 


/**
 * Onepiece
 *
 * @return void
 * 
 * liste les une pièce
 */
function product($category)
{
    $db = db();
    $produitManager = new ProduitManager($db); 

    $produits = $produitManager->getListByCategory($category);

    include_once 'view/onepiece.php';
}
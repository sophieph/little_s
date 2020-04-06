<?php 


/**
 * Onepiece
 *
 * @return void
 * 
 * liste les une pièce
 */
function onepiece()
{
    $db = db();
    $produitManager = new ProduitManager($db); 
    

    // $produits = $produitManager->getListCategory('onepiece');
    $produits = $produitManager->getList('onePiece');
    // $image = $produitManager->getFirstImage();

    include_once 'view/onepiece.php';
}
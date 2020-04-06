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

    $produits = $produitManager->getListByCategory('onePiece');

    include_once 'view/onepiece.php';
}
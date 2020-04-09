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
function basket()
{
    include_once ROOT_PATH . 'view/panier/basket.php';
}
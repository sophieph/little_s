<?php 
session_start();
ob_start(); ?>

<section id="wrapper">

<p>Connectez-vous pour ajouter un produit au panier.</p>


</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/template.php'; ?>

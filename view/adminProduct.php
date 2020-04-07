<?php 
session_start();
ob_start(); 
?>

<section id="wrapper">

<?php 
if (isset($_SESSION['user']) && $_SESSION['user'] == 'administrateur') { 
    ?>

    <div class="admin-list">

        <h3> Produit : <b>
        <?php echo $product['name']; ?></b> </h3>
        
        <p><b>Nom du produit </b> : <?php echo $product['name']; ?></p>
        <p><b>Stock </b> : <?php echo $product['stock']; ?></p>
        <p><b>Prix </b> : <?php echo $product['prix']; ?></p>
        <p><b>Catégorie du produit </b> : <?php echo $product['category']; ?></p>

        <h3>Modifier le produit</h3>

        <?php
        include_once 'view/include/formEditProduct.php';
        ?>

        
    </div>

    <?php 
} else {
    http_response_code(404);
    include 'include/error404.php';
}
?>

</section>



<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>

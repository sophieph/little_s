<?php 
session_start();
ob_start(); 
?>

<section id="wrapper">

<?php 
if (isset($_SESSION['user']) && $_SESSION['user'] == 'administrateur') { 
    ?>

    <div class="admin-list">

        <h3>Ajouter un produit</h3>
    
        <?php
        include_once 'view/include/formProduit.php';
        ?>

        <h3> Liste : <b>Produits</b> </h3>


        <table class="admin-list-table">
            
            
        </table>

        <p id="demo"> </p>
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

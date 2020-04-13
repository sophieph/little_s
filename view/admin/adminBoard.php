<?php 

session_start();
ob_start(); ?>



<section id="wrapper">

<?php 
    if (isset($_SESSION['user']) && $_SESSION['user'] == 'administrateur') { 
?>

    <div class="admin">
        <ul>
            <li> <a href="?action=admin-newsletter">Gérer la newsletter</a></li>
            <li> <a href="?action=admin-product">Gérer les produits</a></li>
            <li> <a href="?action=admin-member">Gérer les membres</a></li>
        </ul>
    </div>

    <?php 
    
    } else {
        http_response_code(404);
        include_once ROOT_PATH . 'view/include/error404.php';
    }

    ?>


</section>



<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/templateAdmin.php'; ?>

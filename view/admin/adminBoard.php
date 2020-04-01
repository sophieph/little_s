<?php 

session_start();
ob_start(); ?>



<section id="wrapper">

<?php 
    if (isset($_SESSION['user']) && $_SESSION['user'] == 'administrateur') { 
?>

    <div class="admin">
        <ul>
            <li> <a href="list-newsletter.php">Gérer la newsletter</a></li>
            <li> <a href="">Gérer les produits</a></li>
            <li> <a href="">Gérer les membres</a></li>
        </ul>
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

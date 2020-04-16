<?php 
session_start();
ob_start(); ?>

<section id="wrapper">


<?php 
if ($id == 0) {
    echo $msg;

    http_response_code(404);
    include_once ROOT_PATH . 'view/include/error404.php';
} else {

    ?>

    <div class="check-out">
    <p>Check-out <i class="fa fa-angle-double-right"></i> Livraison <i class="fa fa-angle-double-right"></i> <b>Paiement</b> <i class="fa fa-angle-double-right"></i> Commande</p>
    <br>
    <br>

        <form action="" class="form-sign-up">
            <label for="number">Numéro de carte:</label><br>
            <input type="text"> <br>
            <label for="ccv">ccv:</label><br>
            <input type="text"><br>
            <label for="date">Date d'expiration:</label><br>
            <input type="text"><br>
            <label for="nom">Nom sur la carte</label><br>
            <input type="text"><br>
        </form>
        <button id="checkout"><a href='?action=recap&id=<?php echo $id; ?>'>Commander</a> </button>

    </div>



    <?php 
}
?>


</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/template.php'; ?>
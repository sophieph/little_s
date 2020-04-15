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


    <div class="list-basket">

        <h2>Récapitulatif</h2>

        <h3>Nombre d'articles : <?php echo $item; ?> articles</h3>

        <table>

            <?php 
            foreach ($paniers as $panier){
                ?>
            <tr>
                <td class="img-basket">
                    <?php 
                                $image = $produitManager->getFirstImage($panier['codeProduit']);
                            ?>
                    <img class="img-panier" src="<?php echo $image['link'];?>">

                </td>
                <td>
                    <b>Nom :</b> <?php echo $panier['name']; ?> | <?php echo $panier['codeProduit']; ?><br>
                    <b>Catégorie :</b> <?php echo $panier['category']; ?><br>
                    <b>Quantité :</b> <?php echo $panier['quantity']; ?> <br>
                    <b>Prix : </b><?php echo $panier['price']; ?> &euro;<br>

                </td>
            </tr>
                <?php 
            }
            ?>

        </table>

        <div class="total">
            <p>Prix total : <?php echo $price; ?>&euro;</p>
        </div>
    </div>


    <?php 
}
?>


</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/template.php'; ?>
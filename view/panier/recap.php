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
    <div class="checkout">

        <p>Check-out <i class="fa fa-angle-double-right"></i> Livraison <i class="fa fa-angle-double-right"></i> Paiement <i class="fa fa-angle-double-right"></i> <b>Commande<b></p>
       
        <?php echo $numeroCommande; ?> <br>
       
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



    <?php 
}
?>


</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/template.php'; ?>
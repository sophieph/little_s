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


    <div class="check-dev">
        <div class="check-out-dev">
            <p>Check-out <i class="fa fa-angle-double-right"></i> <b>Livraison</b> <i class="fa fa-angle-double-right"></i> Paiement <i class="fa fa-angle-double-right"></i> Commande</p>
                <br>
                <br>
                <h2>Livraison</h2>
                <br>
                <br>
                <p><b>Livrer à cette adresse</b></p>
            <?php echo $name; ?> <br>
            
            <?php 
            if (empty($home)) {
                echo 'Ajouter une nouvelle adresse : <br><br><br><br>';
            } else {
                echo $home; 
                echo "<br><br><br><br>Changez l'adresse de livraison : <br><br>";
            }
            ?>

                <form action="" class="form-sign-up" id="edit_member" >
                    
                    
                    <label for="home">Adresse de domicile</label><br>
                    <input type="text" name="home" id="home" value="<?php echo $home; ?>"><br>

                    
                    <input type="submit" id="modify" value="Modifier" onclick="editHome()">
                </form>

            
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
                <button id="checkout"><a href='?action=payment&id=<?php echo $panier['idMembre']; ?>'>Paiement</a> </button>

            </div>


        </div>

    </div>
    <?php 
}
?>


</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/template.php'; ?>
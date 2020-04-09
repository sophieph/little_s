<?php ob_start(); ?>

<section id="wrapper">

    <div class="list-basket">

        <table>
            
            
            <?php 
            foreach($paniers as $panier) {
                ?>
            <tr> 
                <td class="img-basket">
                    <?php 
                        $image = $produitManager->getFirstImage($panier['codeProduit']);
                        ?>
                    <img class="img-panier" src="<?php echo $image['link'];?>"> 

                </td>
                <td>
                    <b>Nom :</b> <?php echo $panier['name']; ?> <br>
                    <b>Catégorie :</b> <?php echo $panier['category']; ?><br>
                    <b>Quantité :</b> <?php echo $panier['quantity']; ?><br>
                    <b>Prix : </b><?php echo $panier['price']; ?> &euro;<br>

                </td>
                </tr>
                <?php 
            }
            ?>
            
             
        </table>

        <div class="total">
            <p>Prix total :</p>

            <button id="add-to-bag">Check out</button>
        </div>
    </div>



</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/template.php'; ?>

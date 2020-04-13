<?php 
session_start();
ob_start(); ?>

<section id="wrapper">

    <?php 
    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) {
        $panierManager->deleteBag($_SESSION['id']);
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
    } else {
        ?>
        <div class="list-basket">
        <h2>Mon panier</h2>
        <h3>Nombre d'articles : <?php echo $item; ?> articles</h3>

            <table>
                
                <?php 
                foreach ($paniers as $panier) {
                    ?>
                <tr> 
                    <td class="img-basket">
                        <?php 
                            $image = $produitManager->getFirstImage($panier['codeProduit']);
                        ?>
                        <img class="img-panier" src="<?php echo $image['link'];?>"> 

                    </td>
                    <td>
                        <b>Nom :</b> <?php echo $panier['name']; ?>  | <?php echo $panier['codeProduit']; ?><br>
                        <b>Catégorie :</b> <?php echo $panier['category']; ?><br>
                        <b>Quantité :</b>
                        <p id="t"></p>
                        <i class="fa fa-minus" onClick="changeQty(<?php echo $panier['codeProduit']; ?>, '-')" ></i>
                        
                        <?php echo $panier['quantity']; ?>
                        <i class="fa fa-plus" onClick="changeQty(<?php echo $panier['codeProduit']; ?>, '+')"></i><br>
                        <b>Prix : </b><?php echo $panier['price']; ?> &euro;<br>
                        
                        <a href="?action=delete-basket&id=<?php echo $panier['idMembre']; ?>&code=<?php echo $panier['codeProduit']; ?>">Supprimer</a>

                    </td>
                    </tr>
                    <?php 
                }
                ?>
                
                
            </table>

            <div class="total">
                <p>Prix total : <?php echo $price; ?>&euro;</p>

                <button id="checkout">Check out</button>
            </div>
        </div>

        <?php 
    }
    ?>




</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/template.php'; ?>

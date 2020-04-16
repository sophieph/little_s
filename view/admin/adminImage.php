<?php 
session_start();
ob_start(); 
?>

<section id="wrapper">

<?php 
if (isset($_SESSION['user']) && $_SESSION['user'] == 'administrateur') { 
    ?>

    <div class="admin-list">

        <h3> Produit : <b><?php echo $product['name']; ?></b> </h3>
        
        <p><b>Nom du produit </b> : <?php echo $product['name']; ?></p>
        <p><b>Stock </b> : <?php echo $product['stock']; ?></p>
        <p><b>Catégorie du produit </b> : <?php echo $product['category']; ?></p>
        <p><b>Prix </b> : <?php echo $product['price']; ?>&euro; </p>
        <p>
            <b>Images</b> : 
        </p>
        <div class="slideshow-container">
            <ul >
            <?php
            foreach($images as $image) {
                ?>

                <li class="slide-image">
                    <img src="<?php echo $image['link'];?>">
                </li>

                <?php 
            }
            ?>
            </ul>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>

        <br><br>


        <form action="">
            <label for="images">Ajouter une image</label>
            <input type="text" name="image" id="image" onfocusout="addPath()" >
            <input type="hidden" name="codeProduit" id="codeProduit" value="<?php echo $product['codeProduit']; ?>">
            <input type="hidden" name="category" id="category" value="<?php echo $product['category']; ?>">

            <input type="submit" value="Ajouter l'image" onclick="return(addImage());">
        </form>

        <p id="image-text"></p>
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

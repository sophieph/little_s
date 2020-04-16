<?php 
session_start();
ob_start(); ?>

<section id="wrapper">

    <div class="card">


        <div class="card-list">
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

            <div class="description">

                <h4><?php echo $product['name']; ?></h4>
                <p><?php echo $product['price']; ?>&euro;</p>
                <button class="size"> Taille unique</button> 
                <br>
                <button id="add-to-bag" value="<?php echo $product['codeProduit']; ?>">Ajouter au panier</button> 
                <br>

                <div class="delivery">
                    <p>Livraison & retours - Livraison gratuite à partir de 100&euro;</p>
                </div>

                <div class="btn-product">
                    <a href="?action=product&category=<?php echo $product['category']; ?>"><button class="all-product">Voir tous les produits <?php echo $product['category']; ?> </button></a>

                </div>
            </div>
        </div>

    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/template.php'; ?>

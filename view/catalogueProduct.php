<?php ob_start(); ?>

<section id="wrapper">
    <?php 
        include_once 'include/filter.php';
    ?>

    <div class="catalogue">

        <ul>    
        <?php 
        foreach ($produits as $produit) {
            ?>
            <li>
                <a href="?action=card&id=<?php echo $produit['codeProduit']; ?>">
                <?php $image = $produitManager->getFirstImage($produit['codeProduit']); ?>
                <img src="<?php echo $image['link'];?>">    
                <p class="title-product">
                    <?php echo $produit['name']; ?>  
                    <br>
                    <b><?php echo $produit['price']; ?>&euro;</b>
                    <br>
                </p>
                </a>                   
            </li>
            <?php
        }
        ?>

        </ul>

    </div>


</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>

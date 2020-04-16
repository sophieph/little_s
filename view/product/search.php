<?php 
session_start();
ob_start(); ?>
<?php if (!isset($_GET['ajax'])) :  ?>
<section id="wrapper">
<?php endif; ?>
    <?php 
        include_once ROOT_PATH . 'view/include/filter.php';
    ?>




    <div id="catalogue">

        <?php
        if (empty($produits)) {
            ?>
            Aucun produit ne correspond à la recherche.
            <?php 
        }
        ?>
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


<?php require ROOT_PATH . 'view/template.php'; ?>

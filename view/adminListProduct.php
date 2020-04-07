<?php 
session_start();
ob_start(); 
?>

<section id="wrapper">

<?php 
if (isset($_SESSION['user']) && $_SESSION['user'] == 'administrateur') { 
    ?>

    <div class="admin-list">

        <h3> Liste : <b>Produits</b> </h3>


        <table class="admin-list-table">
            
        <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Date</th>
                <th>Stock</th>
                <th>Prix</th>
                <th>Category</th>
                <th>Images</th>
                <th>Modifier</th>
                <th></th>
                
            </tr> 
            <?php
            foreach($liste as $produit) {
                ?>

                <tr>
                <td><?php echo $produit['codeProduit'];?></td>
                <td><?php echo $produit['name'];?></td>
                <td><?php echo $produit['date'];?></td>
                <td><?php echo $produit['stock'];?></td>
                <td><?php echo $produit['price'];?></td>
                <td><?php echo $produit['category'];?></td>
                <td><a href="?action=image-product&codeProduit=<?php echo $produit['codeProduit']; ?>">Ajouter des images<a/></td>
                <td><a href="?action=edit-product&codeProduit=<?php echo $produit['codeProduit']; ?>">Modifier</a></td>

                <td class="admin-hover"> <a href="?action=delete-product&codeProduit=<?php echo $produit['codeProduit']; ?>">delete </a></td>
                </tr>

                <?php 
            }
            ?>

        </table>

        <h3>Ajouter un produit</h3>
        <?php
        include_once 'view/include/formProduit.php';
        ?>
        
    </div>

    <?php 
} else {
    http_response_code(404);
    include 'include/error404.php';
}
?>

</section>



<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>

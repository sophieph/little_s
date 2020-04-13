<?php 
session_start();
ob_start(); ?>

<?php 
if (!(isset($_SESSION['user']) && $_SESSION['user'] == 'membre')) { 
    http_response_code(404);
    include_once ROOT_PATH . 'view/include/error404.php';
}
?>



<section id="wrapper">

    <div class="member">

        <div class="menu">
            <ul>
                <li><a href="?action=account&id=<?php echo $_SESSION['id']; ?>">Mes informations</a></li>
                <li><a href="?action=history&id=<?php echo $_SESSION['id'] ?>">Mes commandes</a></li>
            </ul>
        </div>



        
        <div class="info">
        <h2>Ma commande : <?php echo $id; ?></h2>


        <?php 
        foreach ($details as $detail) {
            ?>
        <ul>
            <li> <?php echo $detail['nom']; ?></a></li>
            <li><?php echo $detail['quantity'] ?> </li>
            <li><?php echo $detail['category'] ?> </li>
            <li><b><?php echo $detail['price'] ?>&euro;</b> </li>
            <br>

        </ul>
            <?php
        }
        ?>



            
        </div>
    </div>


    
    

</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/template.php'; ?>

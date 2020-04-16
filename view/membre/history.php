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
        <h2>Mes commandes</h2>


        <?php 
        if (empty($commandes)) {
            ?>
            <p>Vous n'avez encore rien commandé.</p>
            <?php 
        } else {
            ?> 
            
        <?php 
        foreach ($commandes as $commande) {
            ?>
        <ul>
            <li><i>Numéro de commande :</i><a href="?action=order&id=<?php echo $commande['commande']; ?>"> <b><?php echo $commande['commande']; ?></b></a>
            <br>
            <i>Commandé le :</i><?php echo $commande['date'] ?> 
            <br>
            <b><i>Prix total :</i><?php echo $commande['total'] ?>&euro;</b> </li>
            <br>

        </ul>
            <?php
        }
        ?>

            <?php 
        }
        ?>
            
        </div>
    </div>


    
    

</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/template.php'; ?>

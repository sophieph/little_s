<?php 
session_start();
ob_start(); ?>

<section id="wrapper">

<?php 
if (isset($_SESSION['user']) && $_SESSION['user'] == 'membre') { 
    ?>

    <div class="member">

        <div class="menu">
            <ul>
                <li><a href="?action=account&user=<?php echo $mail; ?>">Mes informations</a></li>
                <li><a href="?action=">Mes commandes</a></li>
            </ul>
        </div>

        <div class="info">

        <h2>Mes informations</h2>

        <ul>
            <li><b>Nom</b> : <?php echo $name; ?></li>
            <li><b>Email</b> : <?php echo $mail; ?></li>
            <li><b>Adresse de domicile</b> : </li>
        </ul>
        
        <h3>Modifier mes informations</h3>
            <form action="" class="form-sign-up">
                <label for="name">Nom</label> <br>
                <input type="text" placeholer="<?php echo $name; ?>"><br>
                <label for="home">Adresse de domicile</label><br>
                <input type="text" placeholder="<?php  ?>"><br>

                <input type="submit" value="Modifier" id="modify">
                
            </form>
        </div>
    </div>

    <?php 
} else {
    http_response_code(404);
    include_once ROOT_PATH . 'view/include/error404.php';
}
?>
    
    

</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/template.php'; ?>

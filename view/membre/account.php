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
                <li><a href="?action=account&email=<?php echo $mail; ?>">Mes informations</a></li>
                <li><a href="?action=">Mes commandes</a></li>
            </ul>
        </div>



        
        <div class="info">
        <p id="f"></p>
        <h2>Mes informations</h2>

        <ul>
            <li><b>Nom</b> : <?php echo $name; ?></li>
            <li><b>Email</b> : <?php echo $mail; ?></li>
            <li><b>Adresse de domicile</b> : 
            <br>
            <?php echo $home; ?> </li>
        </ul>
        
        <h3>Modifier mes informations</h3>
            <form action="" class="form-sign-up" id="edit_member" >
                <input type="hidden" name="email" id="email" value="<?php echo $mail; ?>">
                <label for="name">Nom</label> <br>
                <input type="text" name="name" id="name" value="<?php echo $name; ?>" ><br>
                <label for="home">Adresse de domicile</label><br>
                <input type="text" name="home" id="home" value="<?php echo $home; ?>"><br>

                
                <input type="submit" id="modify" onclick="editM()">
            </form>

            
        </div>
    </div>


    
    

</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/template.php'; ?>

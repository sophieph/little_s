<?php 
    session_start();
?>

<!DOCTYPE html>
<html>

    <head>
        <title>little.s</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="public/css/normalize.css">
        <link rel="stylesheet" href="public/css/style.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


    </head>

    <body>

        <header>
            <?php 
            
            if (isset($_SESSION['user']) && $_SESSION['user'] == 'administrateur') { ?>
            <div class="mode-admin"> 
                <p> <?php echo $_SESSION['user'] . " : " . $_SESSION['name'] . " | <a href='admin-board.php'>Tableau de bord</a> " . " | ". "<a href='logoff.php'>Log off</a>"; ?> </p>
            </div>

            <?php } ?>

            <div class="header">
                <!-- search form -->
                <div class="header-research">
                    <form class="research-items" action="#" method="get">
                        <input type="text" name="searchItems" placeholder="Rechercher" />
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>


                <!-- sign in/up -->
                <div class="header-sign">
                    <a href="?action=signin" class="signing-signin">Sign in</a> 
                    <!-- <span class="two-dots">::</span>  -->
                    <a href="?action=signup" class="signing-signup">Sign up</a>
                    <a href="" class="panier"><i class="fa fa-shopping-cart"></i>(0)</a>
    
      

                </div>
            </div>

            <h1><a href="/little">little.s</a></h1>



        </header>

        <nav>

            <ul>
                <li><a href="">Nouveautés</a></li>
                <li><a href="one-piece.php">Une piece</a></li>
                <li><a href="">Bikini</a></li>
                <li><a href="">Accessoires</a></li>
            </ul>

        </nav>

        <main id="content">
            <?= $content ?>
        </main>

        <footer>
            
        <?php 
            require 'view/newsletter/newsletterView.php';
        ?>

            <div class="social-media">
                <a href="http://www.twitter.com"><i class="fa fa-twitter"></i> Twitter</a>
                <span class="two-dots">&nbsp&nbsp&nbsp</span>
                <a href="http://www.facebook.com"><i class="fa fa-facebook"></i> Facebook</a> 
                <span class="two-dots">&nbsp&nbsp&nbsp</span>
                <a href="http://www.instagram.com"><i class="fa fa-instagram"></i> Instagram</a>
            </div>

            <div class="footer">
                <div class="footer-infos">
                    <h2>Get some help</h2>
                    <a href="">Assistance</a> <br>
                    <a href="">Retours</a><br>
                    <a href="">Guide des tailles</a><br>
                    <a href="">Livraison</a><br>
                </div>

                <div class="footer-infos">
                    <h2>Informations</h2>
                    <a href="">Conditions générales</a><br>
                    <a href="">Politique de confidentialité</a><br>
                    <a href="">Plan du site</a><br>
                </div>

                <div class="footer-infos">
                    <h2>Mon compte</h2>
                    <a href="">Historique</a><br>
                    <a href="">Suivre ma commande</a><br>
                </div>
            </div>

            <div class="copyright">
                <a href="form-admin.php">connexion admin</a>
                <p>little.s &copy; 2020</p>
            </div>

        </footer>

        <!-- script js -->
        <script src="public/js/validateForm.js"></script>
        <script src="public/js/admin.js"></script>
        <script src="public/js/jquery-3.4.1.min.js"></script>
    </body>

</html>

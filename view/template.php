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
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="public/css/normalize.css">
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

                <!-- sign in/up -->
                <div class="header-sign">
                    <a href="?action=signin">Sign in</a> 
                    <span class="two-dots">::</span> 
                    <a href="?action=signup">Sign up</a>
                </div>
                <!-- basket -->
                <div class="header-basket">
                    <a href=""><img src="public/images/btn-basket.png"></a>
                </div>
            </div>

            <h1><a href="/little">little.s</a></h1>


            <!-- search form -->
            <div class="header-research">
                <form class="research-items" action="#" method="get">
                    <input type="text" name="searchItems" placeholder="Rechercher" />
                    <input type="submit" 
                    style="background:url('assets/images/btn-search.png') 
                            no-repeat; width:25px; height:25px; font-size:0px;" 
                    name="submit">
                </form>
            </div>

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
                <a href="http://www.twitter.com">Twitter</a>
                <span class="two-dots">::</span>
                <a href="http://www.facebook.com">Facebook</a> 
                <span class="two-dots">::</span>
                <a href="http://www.instagram.com">Instagram</a>
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

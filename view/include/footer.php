            <footer>
            
            <?php 
                require 'view/newsletter/newsletterView.php';
            ?>
    
                <div class="social-media">
                    <ul>
                        <li> <a href="http://www.twitter.com"><i class="fa fa-twitter"></i> Twitter</a></li>
                        <li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i> Facebook</a> </li>
                        <li><a href="http://www.instagram.com"><i class="fa fa-instagram"></i> Instagram</a></li>
                    </ul>
                    <!-- <a href="http://www.twitter.com"><i class="fa fa-twitter"></i> Twitter</a>
                    <span class="two-dots">&nbsp&nbsp&nbsp</span>
                    <a href="http://www.facebook.com"><i class="fa fa-facebook"></i> Facebook</a> 
                    <span class="two-dots">&nbsp&nbsp&nbsp</span>
                    <a href="http://www.instagram.com"><i class="fa fa-instagram"></i> Instagram</a> -->
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
                    <?php 
                                        
                    if ($_SESSION['user'] != 'membre') {
                                        
                        ?>
                    <a href="?action=admin">connexion admin</a>

                        <?php 
                    }
                    ?>
                    <p>little.s &copy; 2020</p>
                </div>
    
            </footer>
    <header>
            <div class="header">
                <!-- search form -->
                <div class="header-research">
                    <form id ="research-items" class="research-items" action="#" method="get">
                        <input type="text" id="searchItems" name="searchItems" placeholder="Rechercher" />
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <?php 
            
            if (isset($_SESSION['user']) && $_SESSION['user'] == 'membre') { 
                ?>
                <!-- account -->
                <div class="header-account">
                
                 <a href="?action=account&id=<?php echo $_SESSION['id']; ?>"> <i class="fa fa-user"></i> Mon compte</a> 

                    <a href="?action=logoff">Déconnexion</a>
                    <a href="?action=basket&id=<?php echo  $_SESSION['id']; ?>" class="panier"><i class="fa fa-shopping-cart"></i></a>
                   
                </div>
                <?php
            } else { 
                ?>
                <!-- sign in/up -->
                <div class="header-sign">
                    <a href="?action=signin" class="signing-signin">Sign in</a> 

                    <a href="?action=signup" class="signing-signup">Sign up</a>
                    <a href="?action=basket&id=<?php echo $_SESSION['id']; ?>" class="panier"><i class="fa fa-shopping-cart"></i></a>
                </div>
                <?php
            }
            ?>

            </div>


            <a href="#" class="hamburger"> <ion-icon name="menu-outline"></ion-icon></a>
            <h1><a href="/little">little.s</a></h1>
            <a href="?action=basket&id=<?php echo $_SESSION['id']; ?>" class="panier-mobile"><i class="fa fa-shopping-cart"></i></a>



        </header>

        <nav>

            <ul>
                <li><a href="?action=product">Nouveautés</a></li>
                <li><a href="?action=product&category=onePiece">Une piece</a></li>
                <li><a href="?action=product&category=bikini">Bikini</a></li>
                <li><a href="?action=product&category=accessoire">Accessoires</a></li><br>
                <li><a href="?action=signin" class="account">Mon compte</a></li>
                <?php 
                if (isset($_SESSION['user']) && $_SESSION['user'] == 'membre') {
                ?>
                <li><a href="?action=account&id=<?php echo $_SESSION['id']; ?>" class="account">Mon compte</a></li>
                <li><a href="?action=logoff" class="account">Déconnexion</a></li>

                <?php
                }
                ?>

            </ul>

        </nav>
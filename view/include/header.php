    <header>
            <?php 
            
            if (isset($_SESSION['user']) && $_SESSION['user'] == 'administrateur') { ?>
            <div class="mode-admin"> 
                <p> <?php echo $_SESSION['user'] . " : " . $_SESSION['name'] . " | <a href='?action=board'>Tableau de bord</a> " . " | ". "<a href='?action=logoff'>Log off</a>"; ?> </p>
            </div>

            <?php } else if (isset($_SESSION['user']) && $_SESSION['user'] == 'membre') { 
                ?>
            
            <div class="header">
                <!-- search form -->
                <div class="header-research">
                    <form class="research-items" action="#" method="get">
                        <input type="text" name="searchItems" placeholder="Rechercher" />
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <!-- account -->
                <div class="header-account">
                
                 <a href="?action=account&email=<?php echo $_SESSION['email']; ?>"> <i class="fa fa-user"></i> Mon compte</a> 

                    <a href="?action=logoff">Déconnexion</a>
                    <a href="" class="panier"><i class="fa fa-shopping-cart"></i>(0)</a>
                   
                </div>
            </div>

            


                <?php
            }  else{
                ?>

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

                    <a href="?action=signup" class="signing-signup">Sign up</a>
                    <a href="" class="panier"><i class="fa fa-shopping-cart"></i>(0)</a>
                </div>
            </div>
    
                <?php 
            }
            ?>


            <a href="#" class="hamburger"> <ion-icon name="menu-outline"></ion-icon></a>
            <h1><a href="/little">little.s</a></h1>
            <a href="#" class="panier-mobile"><i class="fa fa-shopping-cart"></i></a>



        </header>

        <nav>

            <ul>
                <li><a href="?action=product">Nouveautés</a></li>
                <li><a href="?action=product&category=onePiece">Une piece</a></li>
                <li><a href="?action=product&category=bikini">Bikini</a></li>
                <li><a href="?action=product&category=accessoire">Accessoires</a></li>
                <li><a href="?action=account&email=<?php echo $_SESSION['email']; ?>" class="account">Mon compte</a></li>
                <?php 
                if (isset($_SESSION['user']) && $_SESSION['user'] == 'membre') {
                ?>
                <li><a href="?action=logoff" class="account">Déconnexion</a></li>

                <?php
                }
                ?>

            </ul>

        </nav>
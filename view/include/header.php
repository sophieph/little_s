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
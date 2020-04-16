

<!DOCTYPE html>
<html>

    <head>
        <title>little.s</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="<?php echo BASE_URL;?>public/css/normalize.css">
        <link rel="stylesheet" href="<?php echo BASE_URL;?>public/css/style.css">
        <link rel="stylesheet" href="<?php echo BASE_URL;?>public/css/admin.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


    </head>

    <body>
            <div class="mode-admin"> 
                
                <?php if (isset($_SESSION['user'])) {
                    ?>
                <p> <?php echo $_SESSION['user'] . " : " . $_SESSION['name'] . " | <a href='?action=board'>Tableau de bord</a> " . " | ". "<a href='?action=logoff'>Log off</a>"; ?> </p>

                    <?php
                }
                ?>
            
            </div>
    
        <main id="content">
            <?= $content ?>
        </main>


        <!-- script js -->
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
        <script src="<?php echo BASE_URL; ?>public/js/validateForm.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/admin.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/animation.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/product.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/main.js"></script>

        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

        
        <script type="text/javascript">
        
        $( document ).ready(function() {
            init();
        });
    </script>

    </body>

</html>

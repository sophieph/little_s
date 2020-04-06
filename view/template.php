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

        <?php include_once 'include/header.php'; ?>

        <main id="content">
            <?= $content ?>
        </main>

        <?php include_once 'include/footer.php'; ?>

        <!-- script js -->
        <script src="public/js/validateForm.js"></script>
        <script src="public/js/admin.js"></script>
        <script src="public/js/animation.js"></script>
        <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

        
        <script type="text/javascript">
        // A $( document ).ready() block. for menu
        $( document ).ready(function() {
            $(".hamburger").click(function(){
                $("nav").slideToggle();
                console.log('ok');
            });
        });
    </script>
    </body>

</html>

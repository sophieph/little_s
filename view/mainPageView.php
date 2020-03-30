<?php ob_start(); ?>

<!-- get latest items -->
<section id="main-image">
    <div class="wrapper" style="background-image: url('public/images/main-img.jpeg') center;">
        <h2> Rendez-vous au soleil ? <br>
        <span class="get-dressed">Get dressed </span></h2>
        <a href="#" class="button-shop">Shoppez les nouveautés</a>
    </div>
</section>

<!-- sorting items -->
<section id="sort-items">
    <div class="images">
        <img src="public/images/img-1.png">
        <img src="public/images/img-1.png">
        <img src="public/images/img-1.png">
    </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>

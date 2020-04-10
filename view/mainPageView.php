<?php 
session_start();
ob_start(); ?>

<!-- get latest items -->
<section id="main-image" style="background-image: url('<?php echo BASE_URL; ?>public/images/main-img.jpeg');">
    <div class="home">
        <h2> Rendez-vous au soleil ? <br>
        <span class="get-dressed">Get dressed </span></h2>
        <a href="?action=product" class="button-shop">Shoppez les nouveautés</a>
    </div>
</section>

<!-- sorting items -->
<section id="sort-items">
    <div class="images">
        <img src="<?php echo BASE_URL; ?>public/images/img-1.png">
        <img src="<?php echo BASE_URL; ?>public/images/img-1.png">
        <img src="<?php echo BASE_URL; ?>public/images/img-1.png">
    </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/template.php'; ?>
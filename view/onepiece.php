<?php ob_start(); ?>

<section id="wrapper">
    <?php 
        include_once 'include/filter.php';
    ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>

<?php ob_start(); ?>

<section id="wrapper">

    <div class="card">


        <div class="card-list">
            <div class="slideshow-container">
                <ul >
                <?php
                foreach($images as $image) {
                    ?>
                    <li class="slide-image">
                        <img src="<?php echo $image['link'];?>">
                    </li>
                    <?php 
                }
                ?>
                </ul>
                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
        </div>

    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/template.php'; ?>

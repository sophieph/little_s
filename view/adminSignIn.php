<?php ob_start(); ?>



<section id="wrapper">

    <div id="form-sign">
        <h3> Compte admin </h3>

        <form  action="" class="form-sign-up" >
            <label for="email"> Email : </label> <br>
            <input type="text" name="email" id="email"> <br>
            <label for="pass"> Mot de passe  </label> <br>
            <input type="password" name="pass" id="pass"> <br>
            <input type="submit" value="Sign in" onclick="return(admin());" >

            <p id="text"> </p>
        </form>

    </div>



</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>

<?php ob_start(); ?>

<section id="wrapper">

<div id="form-sign">
    <h3> Mon compte </h3>

    <form  action="" class="form-sign-up" >
        <label for="email"> Email  </label> <br>
        <input type="text" name="email" id="sign-in-email"> <br>
        <label for="pass"> Mot de passe  </label> <br>
        <input type="password" name="pass" id="sign-in-pass"> <br>
        <input type="submit" value="Sign in" onclick="return(validateSignIn());" >

        <p id="text-sign-in"> </p>
    </form>

</div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>

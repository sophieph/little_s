<?php ob_start(); ?>

<section id="wrapper">

<div id="form-sign">
    <h3> Inscription </h3>

     <form action="" class="form-sign-up" > 
        <label for="name"> Nom  </label> <br>
        <input type="text" name="name" id="sign-up-name"> <br>
        <label for="email"> Email  </label> <br>
        <input type="text" name="email" id="sign-up-email" > <br>
        <label for="pass1"> Mot de passe  </label> <br>
        <input type="password" name="pass1" id="sign-up-pass1"> <br>
        <label for="pass2"> Retapez le mot de passe  </label> <br>
        <input type="password" name="pass2" id="sign-up-pass2"> <br>
        <input type="hidden" name="category" id="sign-up-category" value="membre">

        <input type="submit" value="S'inscrire" onclick="return(validateSignUp());" > <br>

        <p id="text-sign-up">  </p>
    </form>

</div>


</section>


<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>

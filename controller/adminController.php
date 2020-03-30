<?php 


require 'model/MembreManager.php';
require 'model/Membre.php';


/**
 * Signin
 *
 * @return void
 * 
 * Formulaire de connexion admin
 */
function admin() 
{
    include_once 'view/adminSignIn.php';
}
<?php 

require 'controller/controller.php';
require 'controller/newsletterController.php';
require 'controller/signController.php';
// require 'controller/adminController.php';

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'homepage') {
            homepage();
        } else if ($_GET['action'] == 'logoff') { // deconnexion
            logoff();
        } else if ($_GET['action'] == 'subscribe') { // inscription a la newsletter
            subscribe();
        } else if ($_GET['action'] == 'signin') { // connexion
            signin();
        } else if ($_GET['action'] == 'signinC') {
            signinController();
        } else if ($_GET['action'] == 'signup') { // inscription en tant que membre
            signup();
        } else if ($_GET['action'] == 'signupC') { 
            signupController();
        } else if ($_GET['action'] == 'admin') { // connexion en tant qu'admin
            admin();
        } 
    } else {
        homePage();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

<?php 

require 'controller/controller.php';
require 'controller/newsletterController.php';
require 'controller/signController.php';

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'homepage') {
            homepage();
        } else if ($_GET['action'] == 'subscribe') {
            subscribe();
        } else if ($_GET['action'] == 'test') {
            test();
        } else if ($_GET['action'] == 'signin') {
            signin();
        } else if ($_GET['action'] == 'signup') {
            signup();
        } else {

        }
    } else {
        homePage();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

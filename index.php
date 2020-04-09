<?php 
require 'config.php';
require  ROOT_PATH . 'controller/controller.php';
require  ROOT_PATH . 'controller/newsletter/newsletterController.php';
require  ROOT_PATH . 'controller/membre/signController.php';
require  ROOT_PATH . 'controller/admin/adminController.php';
require  ROOT_PATH . 'controller/produit/produitController.php';



try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'homepage') {
            homepage();
        } else if ($_GET['action'] == 'logoff') { // log off
            logoff();
        } else if ($_GET['action'] == 'subscribe') { // subscribe to a newsletter
            subscribe();
        } else if ($_GET['action'] == 'signin') { // log in as a member
            signin();
        } else if ($_GET['action'] == 'signinC') {
            signinController();
        } else if ($_GET['action'] == 'signup') { // subscribe as a member
            signup();
        } else if ($_GET['action'] == 'signupC') { 
            signupController();
        } else if ($_GET['action'] == 'admin') { // log in as an admin
            admin();
        } else if ($_GET['action'] == 'adminC') { 
            adminController();
        } else if ($_GET['action'] == 'board') { // dashboard for admin
            board();
        } else if ($_GET['action'] == 'admin-newsletter') { // manage newsletter
            manageNewsletter();
        } else if ($_GET['action'] == 'delete-newsletter') { // delete newsleter
            deleteNewsletter();
        } else if ($_GET['action'] == 'admin-member') { // manage member
            manageMember();
        } else if ($_GET['action'] == 'admin-product') { // manage product
            manageProduct();
        } else if ($_GET['action'] == 'add-product') { // add a product
            addProduct();
        } else if ($_GET['action'] == 'edit-product') { // edit a product
            editProduct();
        } else if ($_GET['action'] == 'delete-product') { // delete a product
            deleteProduct();
        } else if ($_GET['action'] == 'image-product') { // add an image to a product
            imageProduct();
        } else if ($_GET['action'] == 'add-image') { // add an image to a product
            addImageProduct();
        } else if ($_GET['action'] == 'product' && ($_GET['category'] == 'onePiece' || $_GET['category'] == 'bikini' || $_GET['category'] == 'accessoire' )) { // one piece page
            $category = $_GET['category'];
            product($category);
        } else if ($_GET['action'] == 'product') { // one piece page
            news();
        } else if ($_GET['action'] == 'card' && $_GET['id']) { // one piece page
            $id = $_GET['id'];
            productCard($id);
        } else if ($_GET['action'] == 'sort') { // filter
            sortProduct();
        } 
    } else {
        homePage();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

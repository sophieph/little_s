<?php 
require 'config.php';
require  ROOT_PATH . 'controller/controller.php';
require  ROOT_PATH . 'controller/newsletter/newsletterController.php';
require  ROOT_PATH . 'controller/membre/signController.php';
require  ROOT_PATH . 'controller/membre/membreController.php';
require  ROOT_PATH . 'controller/admin/adminController.php';
require  ROOT_PATH . 'controller/produit/produitController.php';
require  ROOT_PATH . 'controller/panier/panierController.php';


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
        } else if ($_GET['action'] == 'delete-newsletter') { // delete newsletter
            deleteNewsletter();
        } else if ($_GET['action'] == 'admin-member') { // manage member
            manageMember();
        } else if ($_GET['action'] == 'delete-member') { // delete member
            deleteMember();
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
        } else if ($_GET['action'] == 'search') { // search bar

            searchProduct();
        } else if ($_GET['action'] == 'account') { // account page for members
            account();
        } else if ($_GET['action'] == 'history') { // history $page for members
            $id = $_GET['id'];
            history($id);
        } else if ($_GET['action'] == 'order') { // order $page for members
            $id = $_GET['id'];
            order($id);
        } else if ($_GET['action'] == 'edit-member') { // modify info of members
            editMember();
        } else if ($_GET['action'] == 'basket') { // Basket
            $id = $_GET['id'];
            if (empty($id)) {
                bask();
            } else {
                basket($id);
            }
        } else if ($_GET['action'] == 'add-to-basket') { // add a product to Basket
            addToBasket();
        } else if ($_GET['action'] == 'delete-basket') { // delete a product to Basket
            $idMember = $_GET['id'];
            $codeProduit = $_GET['code'];
            deleteItem();
        } else if ($_GET['action'] == 'change-quantity') { // change quantity of a product from Basket
            changeQuantity();
        } else if ($_GET['action'] == 'check-out') { // checking-out
            $id = $_GET['id'];
            if (empty($id)) {
                checkout($id = 0);
            } else {
                checkout($id);
            }
        } else if ($_GET['action'] == 'delivery') { // delivery
            $id = $_GET['id'];
            if (empty($id)) {
                delivery($id = 0);
            } else {
                delivery($id);
            }
        } else if ($_GET['action'] == 'payment') { // payment
            $id = $_GET['id'];
            if (empty($id)) {
                payment($id = 0);
            } else {
                payment($id);
            }
        } else if ($_GET['action'] == 'recap') { // payment
            $id = $_GET['id'];
            if (empty($id)) {
                recap($id = 0);
            } else {
                recap($id);
            }
        } 
    } else {
        homePage();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

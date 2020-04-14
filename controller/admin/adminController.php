<?php 
require 'config.php';
require ROOT_PATH . 'model/produit/ProduitManager.php';
require ROOT_PATH . 'model/produit/Produit.php';
require ROOT_PATH . 'model/produit/ImageProduitManager.php';
require ROOT_PATH . 'model/produit/ImageProduit.php';

/**
 * Signin
 *
 * @return void
 * 
 * admin connection form
 */
function admin() 
{
    // include_once 'view/admin/adminSignIn.php';
    include_once ROOT_PATH . 'view/admin/adminSignIn.php';
}


/**
 * AdminController
 *
 * @return void
 * 
 * admin connection
 */
function adminController()
{
    /* Connexion à la bdd pour inscrire un nouveau membre dans bdd */
    try {
        $db = new PDO('mysql:host=localhost;dbname=littles;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $membreManager = new MembreManager($db);
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }

    $email = $_GET['email'];
    $pass = $_GET['pass'];

    if (isset($email) && !empty($email) && isset($pass) && !empty($pass)) {

        if ($membreManager->exists($email)) {
            $admin = $membreManager->get($email);
            $password_hashed = $admin->password();
            if (password_verify($pass, $password_hashed)) {
            
                /* verify if it is an admin */
                if ($membreManager->admin($email)) { 
                    // $membre = $membreManager->get($email);
                    session_start();
                    
                    $response = true;
                    $_SESSION['user'] = 'administrateur';
                    $_SESSION['email'] = $admin->email();
                    $_SESSION['name'] = $admin->name();
                    
                } else {
                    $response = "Vous n'avez pas accès.";
                }
            } else { 
                $response = "Mot de passe incorrect.";
            }

        } else {
            $response = "Vous n'avez pas accès.";
        }
        
    }

    echo $response;

}

/**
 * Board
 *
 * @return void
 * 
 * dashboard for admin
 * 
 */
function board()
{
    include_once ROOT_PATH . 'view/admin/adminBoard.php';
}

/**
 * ManageNewsletter
 *
 * @return void
 * 
 * manage all subscribers of the newsletter
 */
function manageNewsletter() 
{

    try {
        $db = new PDO('mysql:host=localhost;dbname=littles;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $newsletterManager = new NewsletterManager($db);
        
        $liste = $newsletterManager->getList();
    } catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    include_once ROOT_PATH . 'view/admin/adminNewsletter.php';
    
}

/**
 * DeleteNewsletter
 *
 * @return void
 * 
 * delete subscribers of the newsletter
 */
function deleteNewsletter() 
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=littles;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $newsletterManager = new NewsletterManager($db);
        
    } catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $response = 'delete';
        try {
            $newsletterManager->deleteEmail($_GET['id']);
            
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        manageNewsletter();
        /* revoir la redirection */
        try {
            header('Location : /little/?action=admin-newsletter');
        }catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }

    include_once ROOT_PATH . 'view/admin/adminNewsletter.php';
}

/**
 * ManageMember
 *
 * @return void
 * 
 * list of all members
 */
function manageMember() 
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=littles;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $membreManager = new MembreManager($db);

        $liste = $membreManager->getList();
    } catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    include_once ROOT_PATH . 'view/admin/adminMember.php';
}

/**
 * ManageProduct
 *
 * @return void
 * 
 * list of all product available
 */
function manageProduct()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=littles;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $produitManager = new ProduitManager($db);
        $liste = $produitManager->getList();
    } catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // $db = db();
    // $produitManager = new ProduitManager($db);
    // $liste = $produitManager->getList();
    include_once ROOT_PATH . 'view/admin/adminListProduct.php';
}

/**
 * AddProduct
 *
 * @return void
 * 
 * Add a product in the db
 */
function addProduct()
{

    /* Connexion à la bdd pour inscrire l'email dans la newsletter */
    try {
        $db = new PDO('mysql:host=localhost;dbname=littles;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $produitManager = new ProduitManager($db);
    } catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    
    if (isset($_GET['name']) && !empty($_GET['name'])
        && isset($_GET['date']) && !empty($_GET['date'])
        && isset($_GET['stock']) && !empty($_GET['stock'])
        && isset($_GET['category']) && !empty($_GET['category'])
        && isset($_GET['price']) && !empty($_GET['price'])
    ) {
        $nameProduct = $_GET['name'];
        $dateProduct = $_GET['date'];
        $stock = $_GET['stock'];
        $category = $_GET['category'];
        $price = $_GET['price'];
        $response = $nameProduct . " " . $dateProduct . " " . $stock . " "  . $category . " "  . $price;

        $produit = new Produit(
            [
            'name' => $nameProduct,
            'date' => $dateProduct,
            'stock' => $stock,
            'category' => $category,
            'price' => $price
            ]
        );
    } else {
        return false;
    }

    if (isset($produit)) {
        $produitManager->add($produit);
        $response = "Le produit a été ajouté à l'inventaire.";
    }

    echo $response;

}

/**
 * ImageProduct
 *
 * @return void
 * 
 * display the form to add image to a product
 */
function imageProduct()
{
    $db = db();
    $produitManager = new ProduitManager($db); 
    $imageProduitManager = new ImageProduitManager($db);

    if (isset($_GET['codeProduit']) && !empty($_GET['codeProduit'])) {
        $codeProduit = $_GET['codeProduit'];
        $product = $produitManager->get($codeProduit);
        $images = $imageProduitManager->getListImage($codeProduit);
    }

    include_once ROOT_PATH . 'view/admin/adminImage.php';
}

/**
 * AddImageProduct
 *
 * @return void
 * 
 * add an image to a product
 */
function addImageProduct()
{
    $db = db();
    $imageProduitManager = new ImageProduitManager($db);

    if (isset($_GET['image']) && !empty($_GET['image'])  
        && isset($_GET['codeProduit']) && !empty($_GET['codeProduit'])
    ) {
        $codeProduit = $_GET['codeProduit'];
        $image = $_GET['image'];

        $produit = new ImageProduit(
            [
                'codeProduit' => $codeProduit,
                'link' => $image
            ]
        );
        $response = $image . " " . $codeProduit;
    } else {
        $response = "non";
    }

    if (isset($produit)) {
        $imageProduitManager->add($produit);
        $response = "L'image a été ajoutée.";

    }
    echo $response;
    
}

/**
 * EditProduct
 *
 * @return void
 * 
 * Edit a product
 */
function editProduct()
{

    $db = db();
    $produitManager = new ProduitManager($db); 
    $imageProduitManager = new ImageProduitManager($db);


    if (isset($_GET['codeProduit']) && !empty($_GET['codeProduit']) 
        && isset($_GET['name']) && !empty($_GET['name']) 
        && isset($_GET['stock']) && !empty($_GET['stock']) 
        && isset($_GET['category']) && !empty($_GET['category'])   
        && isset($_GET['price']) && !empty($_GET['price'])
    ) {
            $codeProduit = $_GET['codeProduit'];
            $name = $_GET['name'];
            $stock = $_GET['stock'];
            $category = $_GET['category'];
            $price = $_GET['price'];

            $produit = new Produit(
                [
                'code' => $codeProduit,
                'name' => $name,
                'stock' => $stock,
                'category' => $category,
                'price' => $price
                ]
            );

            $produitManager->edit($produit);
            $response = "done";

    } else if (isset($_GET['codeProduit']) && !empty($_GET['codeProduit'])) {
            $codeProduit = $_GET['codeProduit'];
            $product = $produitManager->get($codeProduit);
            $images = $imageProduitManager->getListImage($codeProduit);
            include_once ROOT_PATH . 'view/admin/adminProduct.php';
    } 
        
    // }

    echo $response;

}


/**
 * DeleteProduct
 *
 * @return void
 * 
 * delete a product
 */
function deleteProduct() 
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=littles;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $produitManager = new ProduitManager($db);
        
    } catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    if (isset($_GET['codeProduit']) && !empty($_GET['codeProduit'])) {
        try {
            $produitManager->deleteProduct($_GET['codeProduit']);
            
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    manageProduct();
    /* revoir la redirection */
    try {
        header('Location : /little/?action=admin-product');
    }catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }    

    include_once ROOT_PATH . 'view/admin/adminListProduct.php';
}
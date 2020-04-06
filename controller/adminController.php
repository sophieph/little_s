<?php 

require 'model/ProduitManager.php';
require 'model/Produit.php';
require 'model/ImageProduitManager.php';
require 'model/ImageProduit.php';

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


/**
 * AdminController
 *
 * @return void
 * 
 * Connexion admin
 */
function adminController()
{

    // session_start();
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
            if ($membreManager->signIn($email, $pass)) {
                /* verifie si le user est un admin */
                if ($membreManager->admin($email)) { 
                    $membre = $membreManager->get($email);
                    session_start();
                    
                    $response = true;
                       $_SESSION['user'] = 'administrateur';
                       $_SESSION['email'] = $membre->email();
                       $_SESSION['name'] = $membre->name();
                    
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
 * Tableau de bord cote admin
 * 
 */
function board()
{
    include_once 'view/adminBoard.php';
}

/**
 * ManageNewsletter
 *
 * @return void
 * 
 * Gère les emails inscrites à la newsletter cote admin
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

    require_once 'view/adminNewsletter.php';
    
}

/**
 * DeleteNewsletter
 *
 * @return void
 * 
 * Supprime les gens de la liste de newsletter
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

    require_once 'view/adminNewsletter.php';
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
    require_once 'view/adminMember.php';
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
    require_once 'view/adminListProduct.php';
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
    ) {
        $nameProduct = $_GET['name'];
        $dateProduct = $_GET['date'];
        $stock = $_GET['stock'];
        $category = $_GET['category'];
        $response = $nameProduct . " " . $dateProduct . " " . $stock . " "  . $category;

        $produit = new Produit(
            [
            'name' => $nameProduct,
            'date' => $dateProduct,
            'stock' => $stock,
            'category' => $category
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
 * imageProduct
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

    require_once 'view/adminImage.php';
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
    // $imageProduitManager = new ImageProduitManager($db);


    if (isset($_GET['codeProduit']) && !empty($_GET['codeProduit']) && isset($_GET['name']) && !empty($_GET['name']) && isset($_GET['stock']) && !empty($_GET['stock']) && isset($_GET['category']) && !empty($_GET['category'])   ) {
            $codeProduit = $_GET['codeProduit'];
            $name = $_GET['name'];
            $stock = $_GET['stock'];
            $category = $_GET['category'];

            $produit = new Produit(
                [
                'code' => $codeProduit,
                'name' => $name,
                'stock' => $stock,
                'category' => $category
                ]
            );

            $produitManager->edit($produit);
            $response = "done";

    } else if (isset($_GET['codeProduit']) && !empty($_GET['codeProduit'])) {
            $codeProduit = $_GET['codeProduit'];
            $product = $produitManager->get($codeProduit);
            // $images = $imageProduitManager->getListImage($codeProduit);
            require_once 'view/adminProduct.php';
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

    require_once 'view/adminListProduct.php';
}
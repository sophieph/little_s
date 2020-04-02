<?php 

require 'model/model.php';
/**
 * Db
 *
 * @return void
 * 
 * connection to the database
 */
function db()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=littles;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }

    return $db;
}

/**
 * HomePage
 *
 * @return void
 */
function homepage() 
{
    include 'view/mainPageView.php';
}

/**
 * Logoff
 *
 * @return void
 * 
 * Supprime session
 */
function logoff()
{
        include 'view/logoff.php';
}


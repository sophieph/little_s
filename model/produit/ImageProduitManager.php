<?php 
 
class ImageProduitManager
{
    
    private $_db;
    
    public function __construct($db) 
    {
        $this->setDb($db);
    }
    
    public function setDb(PDO $db) 
    {
        $this->_db = $db;
    }
    
    
    /**
     * Add
     *
     * @param  mixed $produit
     * @return void
     * 
     * add an image to a product 
     */
    public function add(ImageProduit $produit)
    {
        $q = $this->_db->prepare('INSERT INTO ImageProduit(codeProduit, link) VALUES(:codeProduit, :link)');
        $q->bindValue(':codeProduit', $produit->codeProduit());
        $q->bindValue(':link', $produit->link());
        $q->execute();
        
        $produit->hydrate(
            [
            'id' => $this->_db->lastInsertId()
            ]
        );
    }

    /**
     * GetList
     *
     * @return void
     * 
     * list of all members
     */
    public function getListImage($codeProduit) 
    {
        $q = $this->_db->prepare('SELECT * FROM ImageProduit WHERE codeProduit = :codeProduit');
        $q->execute([':codeProduit' => $codeProduit]);

        return $q->fetchAll();
    }

    
    /**
     * Get
     *
     * @param  mixed $codeProduit
     * @return void
     * 
     * get a product with $codeProduit
     */
    public function get($codeProduit) 
    {
        $q = $this->_db->prepare('SELECT * FROM Produit WHERE codeProduit = :codeProduit');
        $q->execute([':codeProduit' => $codeProduit]);
        $produit = $q->fetch(PDO::FETCH_ASSOC); 

        return $produit;
    }

}





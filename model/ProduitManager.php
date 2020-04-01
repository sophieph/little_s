<?php 
 
class ProduitManager
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
    

    public function add(Produit $produit)
    {
        $q = $this->_db->prepare('INSERT INTO produit(name, date,stock, category) VALUES(:name, :date, :stock, :category)');
        $q->bindValue(':name', $produit->name());
        $q->bindValue(':date', $produit->date());
        $q->bindValue(':stock', $produit->stock());
        $q->bindValue(':category', $produit->category());
        $q->execute();
        
        $produit->hydrate(
            [
            'id' => $this->_db->lastInsertId()
            ]
        );
    }

}





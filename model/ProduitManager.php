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
    
    
    /**
     * Add
     *
     * @param  mixed $produit
     * @return void
     * 
     * add a product in database
     */
    public function add(Produit $produit)
    {
        $q = $this->_db->prepare('INSERT INTO Produit(name, date,stock, category) VALUES(:name, :date, :stock, :category)');
        $q->bindValue(':name', $produit->name());
        $q->bindValue(':date', $produit->date());
        $q->bindValue(':stock', $produit->stock());
        $q->bindValue(':category', $produit->category());
        $q->execute();
        
        $produit->hydrate(
            [
            'code' => $this->_db->lastInsertId()
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
    public function getList() 
    {
        $q = $this->_db->prepare('SELECT * FROM Produit');
        $q->execute();

        return $q->fetchAll();
    }
}





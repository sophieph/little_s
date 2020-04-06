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
     * DeleteProduct
     *
     * @param  mixed $product
     * @return void
     * 
     * Delete a Product in Produit table
     */
    public function deleteProduct($codeProduit) 
    {
        $q = $this->_db->prepare('DELETE FROM Produit WHERE codeProduit = :codeProduit');
        $q->bindValue(':codeProduit', $codeProduit);
        $q->execute();
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
    
    /**
     * Edit
     *
     * @param  mixed $codeProduit
     * @return void
     * 
     * edit a product
     */
    public function edit(Produit $produit)
    {
        $q = $this->_db->prepare('UPDATE Produit SET name = :name, category = :category,  stock = :stock WHERE codeProduit = :codeProduit');
        // $q = $this->_db->prepare('UPDATE Produit SET name = :name, stock = :stock WHERE codeProduit = :codeProduit');
        
        $q->bindValue(':codeProduit', $produit->code());
        $q->bindValue(':name', $produit->name());
        $q->bindValue(':stock', $produit->stock());
        $q->bindValue(':category', $produit->category());
        $q->execute();
    }
}





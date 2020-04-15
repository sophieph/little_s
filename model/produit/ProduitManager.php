<?php 
 
/**
 * ProduitManager
 */
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
        $q = $this->_db->prepare('INSERT INTO Produit(name, date,stock, category, price) VALUES(:name, :date, :stock, :category, :price)');
        $q->bindValue(':name', $produit->name());
        $q->bindValue(':date', $produit->date());
        $q->bindValue(':stock', $produit->stock());
        $q->bindValue(':category', $produit->category());
        $q->bindValue(':price', $produit->price());
        $q->execute();
        
        $produit->hydrate(
            [
            'code' => $this->_db->lastInsertId()
            ]
        );
    }

    /**
     * Edit
     *
     * @param  mixed $produit
     * @return void
     * 
     * edit a product
     */
    public function edit(Produit $produit)
    {
        $q = $this->_db->prepare('UPDATE Produit SET name = :name, category = :category,  stock = :stock, price = :price WHERE codeProduit = :codeProduit');
        $q->bindValue(':codeProduit', $produit->code());
        $q->bindValue(':name', $produit->name());
        $q->bindValue(':stock', $produit->stock());
        $q->bindValue(':category', $produit->category());
        $q->bindValue(':price', $produit->price());
        $q->execute();
    }
    
    /**
     * DeleteProduct
     *
     * @param  mixed $codeProduit
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
     * list of all product in admin
     */
    public function getList() 
    {
        $q = $this->_db->prepare('SELECT * FROM Produit');
        $q->execute();
        return $q->fetchAll();
    }

    
    /**
     * GetListByCategory
     *
     * @param  mixed $category
     * @return void
     * 
     * list of all product by category
     */
    public function getListByCategory($category) 
    {
        $q = $this->_db->prepare('SELECT name, codeProduit, price FROM Produit WHERE category = :category');
        $q->bindValue(':category', $category);
        $q->execute();
        return $q->fetchAll();
    }

    /**
     * GetListByNews
     *
     * @param  mixed $category
     * @return void
     * 
     * list product by news
     */
    public function getListByNews() 
    {
        $q = $this->_db->prepare('SELECT * FROM Produit ORDER BY date DESC');

        $q->execute();

        return $q->fetchAll();
    }

    /**
     * GetListByNews
     *
     * @param  mixed $category
     * @return void
     * 
     * list product by news
     */
    public function getListByPrice($sort, $category = null) 
    {
        if ($category == null) {
            $query = 'SELECT * FROM Produit ORDER BY price ' . $sort;
            $q = $this->_db->prepare($query);
            $q->execute();

            return $q->fetchAll();
        }

        $query = "SELECT * FROM Produit WHERE category = '" . $category  . "' ORDER BY price " . $sort ;
        $q = $this->_db->prepare($query);
        $q->execute();

        return $q->fetchAll();
        
    }
    
    /**
     * GetFirstImage
     *
     * @param  mixed $codeProduit
     * @return void
     * 
     * get the first image of a product
     */
    public function getFirstImage($codeProduit)
    {
        $q = $this->_db->prepare('SELECT p.name, p.price, i.link FROM Produit p, ImageProduit i WHERE  p.codeProduit = :codeProduit AND  p.codeProduit = i.codeProduit LIMIT 1');
        $q->bindValue(':codeProduit', $codeProduit);
        $q->execute();

        return $q->fetch();
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
     * getStok
     *
     * @param  mixed $codeProduit
     * @return void
     * 
     * get Stock of Product
     */
    public function getStock($codeProduit) 
    {
        $q = $this->_db->prepare('SELECT stock FROM Produit WHERE codeProduit = :codeProduit');
        $q->execute([':codeProduit' => $codeProduit]);
        $stock = $q->fetch(PDO::FETCH_ASSOC); 

        return $stock;
    }
    
    
    /**
     * Search
     *
     * @param  mixed $str
     * @return void
     * 
     * search product with words
     */
    public function search($str)
    {
        $query = "SELECT * FROM Produit WHERE name LIKE '%" . $str . "%'";
        $q = $this->_db->prepare($query);
        $q->execute();

        return $q->fetchAll();
    }

}





<?php 
 
/**
 * PanierManager
 */
class PanierManager
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
     * @param  mixed $panier
     * @return void
     * 
     * add a product in database
     */
    public function add(Panier $panier)
    {
        $q = $this->_db->prepare('INSERT INTO Panier(idMembre, codeProduit, quantity) VALUES(:idMembre, :codeProduit, :quantity)');
        $q->bindValue(':idMembre', $panier->idMembre());
        $q->bindValue(':codeProduit', $panier->codeProduit());
        $q->bindValue(':quantity', $panier->quantity());
        

        $q->execute();
        
        $panier->hydrate(
            [
            'id' => $this->_db->lastInsertId()
            ]
        );
    }
    
    /**
     * GetPanier
     *
     * @param  mixed $id
     * @return void
     * 
     * get basket
     */
    public function getBasket($id)
    {

        $query = 'SELECT * FROM Produit pr, Panier pa WHERE pa.idMembre =' . $id . ' AND pr.codeProduit = pa.codeProduit';
        $q = $this->_db->prepare($query);
        $q->execute();
        $panier = $q->fetchAll(); 

        return $panier;
  
    }

    public function countItem($id)
    {

    }
        
    /**
     * DeleteItem
     *
     * @param  mixed $idMembre
     * @param  mixed $codeProduit
     * @return void
     * 
     * Delete an item from Basket
     */
    public function deleteItem($idMembre, $codeProduit)
    {
        $q = $this->_db->prepare('DELETE FROM Panier WHERE codeProduit = :codeProduit AND idMembre = :idMembre');
        $q->bindValue(':codeProduit', $codeProduit);
        $q->bindValue(':idMembre', $idMembre);
        $q->execute();
    }
    
    /**
     * GetQuantity
     *
     * @param  mixed $idMembre
     * @param  mixed $codeProduit
     * @return void
     * 
     * get quantity of a product from one member
     */
    public function getQuantity($idMembre, $codeProduit) 
    {
            $q = $this->_db->prepare('SELECT quantity FROM Panier WHERE codeProduit = :codeProduit AND idMembre = :idMembre');
            $q->bindValue(':codeProduit', $codeProduit);
            $q->bindValue(':idMembre', $idMembre);
            $q->execute();
            $quantity = $q->fetchColumn(); 

        return $quantity;
    }    
    
    /**
     * ChangeQuantity
     *
     * @param  mixed $idMembre
     * @param  mixed $codeProduit
     * @param  mixed $sign
     * @return void
     * 
     * change quantity of a product from ONE member
     */
    public function changeQuantity($idMembre, $codeProduit, $sign)
    {

        if ($sign == '-1') {
            $query = "UPDATE Panier SET quantity = quantity " . $sign . " WHERE codeProduit = :codeProduit AND idMembre = :idMembre";
        } else if ($sign == "+1") {
            $query = "UPDATE Panier SET quantity = quantity " . $sign . " WHERE codeProduit = :codeProduit AND idMembre = :idMembre";
        }
        $q = $this->_db->prepare($query);
        $q->bindValue(':codeProduit', $codeProduit);
        $q->bindValue(':idMembre', $idMembre);
        
        $q->execute();
    } 
    
    /**
     * TotalPrice
     *
     * @param  mixed $id
     * @return void
     * 
     * get Total Price
     */
    public function totalPrice($id)
    {
        $query = "SELECT SUM(pr.price * pa.quantity) FROM Panier pa, Produit pr WHERE idMembre = " . $id . " AND pa.codeProduit = pr.codeProduit";
        $q = $this->_db->prepare($query);
        $q->execute();
        $price = $q->fetchColumn(); 

        return $price;
    }
}
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

}
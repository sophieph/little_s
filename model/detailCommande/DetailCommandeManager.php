<?php 
 
/**
 * DetailCommandeManager
 */
class DetailCommandeManager
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
    
    public function add(DetailCommande $commande)
    {
        $query = "INSERT INTO DetailCommande (commande, idMembre, codeProduit, quantity) VALUES (:commande, :idMembre, :codeProduit, :quantity)";
        $q = $this->_db->prepare($query);
        $q->bindValue(':commande', $commande->commande());
        $q->bindValue(':idMembre', $commande->idMembre());
        $q->bindValue(':codeProduit', $commande->codeProduit());
        $q->bindValue(':quantity', $commande->quantity());
        $q->execute();

    }
    
    /**
     * GetDetails
     *
     * @param  mixed $id
     * @return void
     * 
     * info about an order
     */
    // public function getDetails(DetailCommande $id)
    // {
    //     $query = 'SELECT * FROM DetailCommande WHERE commande="' . $id . '"';
    //     $q = $this->_db->prepare($query);
    //     $q->execute();
    //     $commande = $q->fetchAll(); 

    //     return $commande;
    // }

    /**
     * GetOrder
     *
     * @param  mixed $id
     * @return void
     * 
     * get order of a member
     */
    public function getOrder($id)
    {
        $query = 'SELECT p.name, p.category, p.price, d.commande, d.idMembre, d.quantity FROM DetailCommande d, Produit p WHERE d.codeProduit = p.codeProduit AND d. commande = "' . $id . '"';
        $q = $this->_db->prepare($query);
        $q->execute();
        $commande = $q->fetchAll(); 

        return $commande;
  
    }

}
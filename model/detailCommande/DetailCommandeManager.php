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
        $query = "INSERT INTO DetailCommande (commande, idMembre, codeProduit) VALUES (:commande, :idMembre, :codeProduit)";
        $q = $this->_db->prepare($query);
        $q->bindValue(':commande', $commande->commande());
        $q->bindValue(':idMembre', $commande->idMembre());
        $q->bindValue(':codeProduit', $commande->codeProduit());

        $q->execute();

    }

}
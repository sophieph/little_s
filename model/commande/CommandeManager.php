<?php 
 
/**
 * CommandeManager
 */
class CommandeManager
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
     * @param  mixed $commande
     * @return void
     * 
     * add to Commande
     */
    public function add(Commande $commande)
    {
        $query = "INSERT INTO Commande (commande, idMembre, date) VALUES (:commande, :idMembre, :date)";
        $q = $this->_db->prepare($query);
        $q->bindValue(':commande', $commande->commande());
        $q->bindValue(':idMembre', $commande->idMembre());
        $q->bindValue(':date', $commande->date());

        $q->execute();

    }
}
<?php

/**
 * Commande
 */
class Commande
{
    
    protected $commande;
    protected $idMembre;
    protected $date;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
        $this->type = strtolower(static::class);
    }
    
    public function hydrate(array $donnees) 
    {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }   
    }

    // getters


    public function idMembre() 
    {
        return $this->idMembre;
    }

    public function date() 
    {
        return $this->date;
    }

    public function commande() 
    {
        return $this->commande;
    }


    // setters


    public function setIdMembre($idMembre) 
    {
        $idMembre = (int) $idMembre;
            
        if ($idMembre > 0) {
            $this->idMembre = $idMembre;
        }
    }    

    public function setDate($date) 
    {
        if (is_string($date)) {
            $this->date = $date;
        }
    } 

    public function setCommande($commande) 
    {
        if (is_string($commande)) {
            $this->commande = $commande;
        }
    } 

}

?>
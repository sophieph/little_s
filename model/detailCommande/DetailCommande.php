<?php

/**
 * DetailCommande
 */
class DetailCommande
{
    
    protected $commande;
    protected $idMembre;
    protected $codeProduit = 6;
    protected $quantity;


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
    public function commande() 
    {
        return $this->commande;
    }

    public function idMembre() 
    {
        return $this->idMembre;
    }

    public function codeProduit()
    {
        return $this->codeProduit;
    }

    public function quantity() 
    {
        return $this->quantity;
    }

    // setters
    public function setCommande($commande) 
    {
        
        $this->commande = $commande;
        
    }

    public function setIdMembre($idMembre) 
    {
        $idMembre = (int) $idMembre;
            
        if ($idMembre > 0) {
            $this->idMembre = $idMembre;
        }
    }    

    public function setCodeProduit($codeProduit)
    {
        $this->codeProduit = $codeProduit;
    }

    public function setQuantity($quantity) 
    {
        $quantity = (int) $quantity;
        if ($quantity > 0) {
            $this->quantity = $quantity;
        }
    }
    
}

?>
<?php

/**
 * Panier
 */
class Panier
{
    
    protected $id;
    protected $idMembre;
    protected $codeProduit;
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
    public function id() 
    {
        return $this->id;
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

    public function category() 
    {
        return $this->category;
    }

    public function price()
    {
        return $this->price;
    }

    // setters
    public function setId($id) 
    {
        $id = (int) $id;
            
        if ($id > 0) {
            $this->id = $id;
        }
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
        $codeProduit = (int) $codeProduit;
        if ($codeProduit > 0) {
            $this->codeProduit = $codeProduit;
        }
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
<?php

/**
 * DetailCommande
 */
class DetailCommande
{
    
    protected $numeroCommande;
    protected $idMembre;
    protected $codeProduit;


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
    public function numeroCommande() 
    {
        return $this->numeroCommande;
    }

    public function idMembre() 
    {
        return $this->idMembre;
    }

    public function codeProduit() 
    {
        return $this->codeProduit;
    }

    // setters
    public function setNumeroCommande($numeroCommande) 
    {
        $numeroCommande = (int) $numeroCommande;
            
        if ($numeroCommande > 0) {
            $this->numeroCommande = $numeroCommande;
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
            $this->$codeProduit = $codeProduit;
        }
    } 

}

?>
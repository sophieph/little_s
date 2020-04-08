<?php

/**
 * Produit
 */
class Produit
{
    
    protected $code;
    protected $name;
    protected $date;
    protected $stock;
    protected $category;
    protected $price;

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
    public function code() 
    {
        return $this->code;
    }

    public function name() 
    {
        return $this->name;
    }

    public function date() 
    {
        return $this->date;
    }

    public function stock() 
    {
        return $this->stock;
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
    public function setCode($code) 
    {
        $code = (int) $code;
            
        if ($code > 0) {
            $this->code = $code;
        }
    }

    public function setName($name) 
    {
        if (is_string($name)) {
            $this->name = $name;
        }
    }    

    public function setDate($date) 
    {
        if (is_string($date)) {
            $this->date = $date;
        }
    } 

    public function setStock($stock) 
    {
        $stock = (int) $stock;
        if ($stock > 0) {
            $this->stock = $stock;
        }
    }

    public function setCategory($category) 
    {
        if (is_string($category)) {
            $this->category = $category;
        }
    } 

    public function setPrice($price) 
    {
        $price = (int) $price;
        if ($price > 0) {
            $this->price = $price;
        }
    }
}

?>
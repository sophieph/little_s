<?php 
class ImageProduit
{
    protected $id;
    protected $codeProduit;
    protected $link;

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
        $this->type = strtolower(static::class);
    }
    
    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }   
    }

    // getters
    public function id() {
        return $this->id;
    }

    public function codeProduit() {
        return $this->codeProduit;
    }

    public function link() {
        return $this->link;
    }

    // setters
    public function setId($id) {
        $id = (int) $id;
            
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function setCodeProduit($codeProduit) {
        $codeProduit = (int) $codeProduit;
            
        if ($codeProduit > 0) {
            $this->codeProduit = $codeProduit;
        }
    }

    public function setLink($link) {
        if (is_string($link)) {
            $this->link = $link;
        }
    }

}

?>
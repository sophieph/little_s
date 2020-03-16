<?php 
class Newsletter {
    protected $id;
    protected $email;

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

    public function email() {
        return $this->email;
    }

    // setters
    public function setId($id) {
        $id = (int) $id;
            
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function setEmail($email) {
        if (is_string($email)) {
            $this->email = $email;
        }
    }

    public function deleteEmail($id) {

    }

    public function test() {
        // var_dump(get_object_vars($this));
        var_dump($this->count());
    }

}

?>
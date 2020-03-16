<?php

class Membre {
    
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $category;

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

    public function name() {
        return $this->name;
    }

    public function email() {
        return $this->email;
    }

    public function password() {
        return $this->password;
    }

    public function category() {
        return $this->category;
    }

    // setters
    public function setId($id) {
        $id = (int) $id;
            
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function setName($name) {
        if (is_string($name)) {
            $this->name = $name;
        }
    }    

    public function setEmail($email) {
        if (is_string($email)) {
            $this->email = $email;
        }
    } 

    public function setPassword($password) {
        if (is_string($password)) {
            $this->password = $password;
        }
    }

    public function setCategory($category) {
        if (is_string($category)) {
            $this->category = $category;
        }
    } 

}

?>
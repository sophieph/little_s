<?php 
 
/**
 * MembreManager
 */
class MembreManager
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
     * @param  mixed $membre
     * @return void
     * 
     * Add a member
     */
    public function add(Membre $membre) 
    {
        $q = $this->_db->prepare('INSERT INTO Membre(name, email, pass, category) VALUES(:name, :email, :pass, :category)');
        $q->bindValue(':name', $membre->name());
        $q->bindValue(':email', $membre->email());
        $q->bindValue(':pass', $membre->password());
        $q->bindValue(':category', $membre->category());
        $q->execute();
        
        $membre->hydrate(
            [
            'id' => $this->_db->lastInsertId()
            ]
        );
    }
    
    /**
     * Edit
     *
     * @param  mixed $membre
     * @return void
     * 
     * edit information about a member
     */
    public function edit(Membre $membre)
    {
        $q = $this->_db->prepare('UPDATE membre SET name = :name, home = :home WHERE id = :id');
        $q->bindValue(':id', $membre->id());
        $q->bindValue(':name', $membre->name());
        $q->bindValue(':home', $membre->home());
        
        $q->execute();
    }


     
     /**
      * Exists
      *
      * @param  mixed $email
      * @return void
      * See if an email exists
      */
    public function exists($email)
    {
        $q = $this->_db->prepare('SELECT email FROM Membre WHERE email = :email');
        $q->execute([':email' => $email]);
        
        return (bool) $q->fetchColumn();
    }
    
    /**
     * SignIn
     *
     * @param  mixed $email
     * @param  mixed $pass
     * @return void
     * 
     * Signing in
     */
    public function signIn($email, $pass)
    {   
        $q = $this->_db->prepare('SELECT email, pass FROM Membre WHERE email = ? AND pass = ?');
        $q->execute(array($email, $pass));
        
        return (bool) $q->fetchColumn();
    }
    
    /**
     * Admin
     *
     * @param  mixed $email
     * @return void
     * 
     * Verify if its an admin
     */
    public function admin($email) 
    {

        $q = $this->_db->prepare('SELECT category FROM Membre WHERE email = ? AND category = ?');
        $q->execute(array($email, 'administrateur'));

        return (bool) $q->fetchColumn();
    }

    
    /**
     * Get
     *
     * @param  mixed $email
     * @return void
     * 
     * get info of a member
     */
    public function get($email) 
    {
            $q = $this->_db->prepare('SELECT * FROM Membre WHERE email = :email');
            $q->execute([':email' => $email]);
            $membre = $q->fetch(PDO::FETCH_ASSOC); 

        return new Membre($membre);
    }

    
    /**
     * GetList
     *
     * @return void
     * 
     * list of all members
     */
    public function getList() 
    {
        $q = $this->_db->prepare('SELECT * FROM Membre WHERE category = "membre"');
        $q->execute();

        return $q->fetchAll();
    }


}



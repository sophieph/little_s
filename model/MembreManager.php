<?php 
 
class MembreManager {
    
    private $_db;
    
    public function __construct($db) {
        $this->setDb($db);
    }
    
    public function setDb(PDO $db) {
        $this->_db = $db;
    }
    
    // Ajouter un nouveau membre dans bdd
    public function add(Membre $membre) {
        $q = $this->_db->prepare('INSERT INTO Membre(name, email, pass, category) VALUES(:name, :email, :pass, :category)');
        $q->bindValue(':name', $membre->name());
        $q->bindValue(':email', $membre->email());
        $q->bindValue(':pass', $membre->password());
        $q->bindValue(':category', $membre->category());
        $q->execute();
        
        $membre->hydrate([
            'id' => $this->_db->lastInsertId()
        ]);
    }

     // verifier si l'email existe deja dans la bdd
     public function exists($email) {
        
        $q = $this->_db->prepare('SELECT email FROM Membre WHERE email = :email');
        $q->execute([':email' => $email]);
        
        return (bool) $q->fetchColumn();
    }

    // connexion 
    public function signIn($email, $pass) {
        
        $q = $this->_db->prepare('SELECT email, pass FROM Membre WHERE email = ? AND pass = ?');
        $q->execute(array($email, $pass));
        
        return (bool) $q->fetchColumn();
    }

    // obtenir toutes les infos d'un membre 

    public function get($email) {

            $q = $this->_db->prepare('SELECT id, name, email FROM Membre WHERE email = :email');
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


    // si l'user est un admin

    public function admin($email) {

        $q = $this->_db->prepare('SELECT category FROM Membre WHERE email = ? AND category = ?');
        $q->execute(array($email, 'administrateur'));

        return (bool) $q->fetchColumn();
    }
}




?>
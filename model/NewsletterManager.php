<?php 
 
class NewsletterManager
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
     * @param  mixed $email
     * @return void
     * 
     * Add an email in the database 
     */
    public function add(Newsletter $email) 
    {
        $q = $this->_db->prepare('INSERT INTO Newsletter(email) VALUES(:email)');
        $q->bindValue(':email', $email->email());
        $q->execute();
        
        $email->hydrate(
            [
            'id' => $this->_db->lastInsertId()
            ]
        );
    }
        
    /**
     * Exists
     *
     * @param  mixed $email
     * @return boolean
     * 
     * Check if an email exist in the Newsletter table
     */
    public function exists($email) 
    {
        
        $q = $this->_db->prepare('SELECT email FROM Newsletter WHERE email = :email');
        $q->execute([':email' => $email]);
        $result = (bool) $q->fetchColumn();
        
        return $result;
    }

    /**
     * GetList
     *
     * @return void
     * 
     * Get a list of every email subscribed in the newsletter
     */
    public function getList() 
    {
        $q = $this->_db->prepare('SELECT * FROM Newsletter');
        $q->execute();

        return $q->fetchAll();
    }
    
    /**
     * DeleteEmail
     *
     * @param  mixed $email
     * @return void
     * 
     * Delete an email in Newsletter table
     */
    public function deleteEmail($id) 
    {
        $q = $this->_db->prepare('DELETE FROM Newsletter WHERE id = :id');
        $q->bindValue(':id', $id);
        $q->execute();
    }
}


?>
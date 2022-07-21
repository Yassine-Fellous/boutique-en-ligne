<?php
class bdd
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'boutique_en_ligne';
    private $db;
    
    public function __construct($host = null, $username = null, $password = null, $database = null)
    {
        if($host != null)
        {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }
        try
        {
            $this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        }
        catch(PDOException $messageErreur)
        {
            echo "ERREUR :" . " ". $messageErreur->getMessage();
        }
    }
    public function query($sql, $data = array())
    {
        $request = $this->db->prepare($sql);
        $request->execute($data);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
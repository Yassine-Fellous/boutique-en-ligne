<?php
session_start();
class Database
{

    private $db;

    public function __construct()
    {
        try {

            $db = new PDO("mysql:host = localhost ;dbname=boutique_en_ligne", 'root', '');

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $message) {
            echo "ERREUR :" . " " . $message->getMessage();
        }

        $this->bdd = $db;
    }
}

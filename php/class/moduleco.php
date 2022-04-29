<?php
session_start();
class Modulco{

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

    public function register($_nom, $_prenom, $_email, $_adresse ,$_password, $_passwordConfirm){
        
        echo 'ok';
        
        $db = $this->bdd;
        
        $nom =  htmlspecialchars($_nom);
        $prenom = htmlspecialchars($_prenom);
        $email = htmlspecialchars($_email);
        $adresse = htmlspecialchars($_adresse);
        $password = hash('sha512', $_password);
        
        $_SESSION['nom'] = $_nom;
        $_SESSION['prenom'] = $_prenom;
        $_SESSION['adresse'] = $_adresse;
        $_SESSION['email'] = $_email;
        
        if (!empty($_nom) && !empty($_prenom) && !empty($_email) && !empty($_adresse) && !empty($_password) && !empty($_passwordConfirm)) {
        echo'ok';
            $pasdedoublons = $db->prepare("SELECT * FROM user WHERE email = ?");
            $pasdedoublons->execute(array($email));
            $sidoublon = $pasdedoublons->rowCount();

            if ($sidoublon == 0) { 
            echo'ok';
                if ($_passwordConfirm == $_password) {
                echo'ok';
                    $insertinto = $db->prepare("INSERT INTO user(nom, prenom, email, adresse, password) VALUES(?, ?, ?, ?, ?)");
                    $insertinto->execute(array($nom, $prenom, $email, $adresse, $password));
                    unset($_SESSION);
                    header('Location:../connexion.php');
                } else {
                    echo'no';
                    $_SESSION['fail'] =  '<font color="red">les passwords ne concordent pas !!!</font>';
                    header('Location:finscription.php');
                }
            } else {
                echo 'no';
                $_SESSION['fail'] = '<font color="red">Cette email est dejà utilisé !</font>';
                header('Location:finscription.php');
            }
        } else {
            echo'no';
            $_SESSION['fail'] = '<font color="red">Il manque des champs !</font>';
            header('Location:finscription.php');
        }
    }
    
    public function connect($_email, $_password){
        
        $db = $this->bdd;
        
        $login = htmlspecialchars($_email);
        $password = hash('sha512', $_password);
        
        if(!empty($login) && !empty($password)){
            
            $request = $db->prepare("SELECT * FROM user WHERE email = ? && password = ?");
            $request->execute(array($login, $password));
            $userexist = $request->rowCount();

            if($userexist == 1){
                $userinfo = $request->fetch();
                unset($_SESSION['fail']);
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['email'] = $userinfo['email'];
                $_SESSION['id_droit'] = $userinfo['id_droit'];
                header('Location:../../index.php');
                }
                
                else{
                    $_SESSION['fail']= '<font color="red">Login inexsistant ou Password incorrect !</font>';
                    header('Location:../connexion.php');
                }
            }
            else{
                $_SESSION['fail'] = '<font color="red"> Il manque des champs !</font>';
                header('Location:../connexion.php');
            }
    }


     //tout les header locationt d'en bas doivent etre modifier



    public function updatenom($_nom){
        $db = $this->bdd;

        $requser = $db->prepare('SELECT * FROM user WHERE id = ?');
        $requser->execute(array($_SESSION['id']));
        $userinfo = $requser->fetch();
        
        if(isset($_nom) && !empty($_nom)){

            if($_nom != $userinfo['nom']){
            
                $newnom = htmlspecialchars($_nom);
                $insertnom = $db->prepare("UPDATE user SET login = ? WHERE id = ?");
                $insertnom->execute(array($newnom, $_SESSION['id']));
            }
            else{
                $_SESSION['fail'] = '<font color="red">les champs doivent être complété !!!</font>';
                header('Location:../html/profil.php');
            }
        }
        else{
            $_SESSION['fail'] = '<font color="red">L\'adresse doit etre differente de l\'ancienne !!!</font>';
            header('Location:../html/profil.php');
        }
    }

    public function updateprenom($_prenom){
        $db = $this->bdd;

        $requser = $db->prepare('SELECT * FROM user WHERE id = ?');
        $requser->execute(array($_SESSION['id']));
        $userinfo = $requser->fetch();
        
        if(isset($_prenom) && !empty($_prenom) ){
            
            if($_prenom != $userinfo['prenom']){

                $newprenom = htmlspecialchars($_prenom);
                $insertprenom = $db->prepare("UPDATE user SET prenom = ? WHERE id = ?");
                $insertprenom->execute(array($newprenom, $_SESSION['id']));
            }
            else{
                $_SESSION['fail'] = '<font color="red">Le prenom doit etre differente de l\'ancienne !!!</font>';
                header('Location:../html/profil.php');
            }
        }
        else{
            $_SESSION['fail'] = '<font color="red">les champs doivent être complété !!!</font>';
            header('Location:../html/profil.php');
        }
    }

    public function updateemail($_email){
        $db = $this->bdd;

        $requser = $db->prepare('SELECT * FROM user WHERE id = ?');
        $requser->execute(array($_SESSION['id']));
        $userinfo = $requser->fetch();
        
        if(isset($_email) && !empty($_email)){
            
            if($_email != $userinfo['email']){
                $newemail = htmlspecialchars($_email);
                $insertemail = $db->prepare("UPDATE user SET login = ? WHERE id = ?");
                $insertemail->execute(array($newemail, $_SESSION['id']));
            }
            else{
                $_SESSION['fail'] = '<font color="red">L\'email doit etre differente de l\'ancien !!!</font>';
                header('Location:../html/profil.php');
            }
        }
        else{
            $_SESSION['fail'] = '<font color="red">les champs doivent être complété !!!</font>';
            header('Location:../html/profil.php');
        }
    }

    public function updateadresse($_adresse){
        $db = $this->bdd;

        $requser = $db->prepare('SELECT * FROM user WHERE id = ?');
        $requser->execute(array($_SESSION['id']));
        $userinfo = $requser->fetch();
        
        if(isset($_adresse) && !empty($_adresse)){

            if($_adresse != $userinfo['adresse']){
            
                $newadresse = htmlspecialchars($_adresse);
                $insertadresse = $db->prepare("UPDATE user SET login = ? WHERE id = ?");
                $insertadresse->execute(array($newadresse, $_SESSION['id']));
            }
        }
        else{
            $_SESSION['fail'] = '<font color="red">L\'adresse doit etre differente de l\'ancienne !!!</font>';
            header('Location:../html/profil.php');
        }
    }

    public function updatepassword($_password, $_passwordConfirm){

        $db = $this->bdd;
        
        $requser = $db->prepare('SELECT * FROM user WHERE id = ?');
        $requser->execute(array($_SESSION['id']));
        $userinfo = $requser->fetch();
        
        if(isset($_password) && !empty($_password) && isset($_passwordConfirm) && !empty($_passwordConfirm)) {

            $newpassword = hash('sha512', $_password);
            
            if($_password == $_passwordConfirm){

                if($newpassword != $userinfo['password']){
                
                    $insertlogin = $db->prepare("UPDATE user SET password = ? WHERE id = ?");
                    $insertlogin->execute(array($newpassword, $_SESSION['id']));
                    unset($_SESSION['fail']);
                    header('Location:../html/connexion.php');
                }
                else{
                    $_SESSION['fail'] = '<font color="red">le mot de passe ne doit pas etre identique au précedent !!!</font>';
                    header('Location:../html/profil.php');
                }
            }
            else{
                $_SESSION['fail'] = '<font color="red">les mot de passe ne sont pas identique !!!</font>';
                header('Location:../html/profil.php');
            }
        }
        else{
            $_SESSION['fail'] = '<font color="red">les champs doivent être complété !!!</font>';
            header('Location:../html/profil.php');
        }
    }
}
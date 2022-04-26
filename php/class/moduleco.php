<!-- Page par Yassine -->
<?php
session_start();
class Modulco
{
    private $bdd;
    public function __construct()
    {
        try
        {
            $bdd = new PDO("mysql:host = localhost ;dbname=boutique_en_ligne", 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            echo "ERREUR :" . " " . $e->getMessage();
        }
        $this->bdd = $bdd;
    }
    // Fonction pour l'inscription
    public function register($_nom, $_prenom, $_email, $_adresse ,$_password, $_passwordConfirm)
    {    
        echo 'Inscription terminée';
        $bdd = $this->bdd;
        $nom =  htmlspecialchars($_nom);
        $prenom = htmlspecialchars($_prenom);
        $email = htmlspecialchars($_email);
        $adresse = htmlspecialchars($_adresse);
        $password = hash('sha512', $_password);
        $_SESSION['nom'] = $_nom;
        $_SESSION['prenom'] = $_prenom;
        $_SESSION['adresse'] = $_adresse;
        $_SESSION['email'] = $_email;
        if (!empty($_nom) && !empty($_prenom) && !empty($_email) && !empty($_adresse) && !empty($_password) && !empty($_passwordConfirm))
        {
            echo'ok';
            $pasdedoublons = $bdd->prepare("SELECT * FROM user WHERE email = ?");
            $pasdedoublons->execute(array($email));
            $sidoublon = $pasdedoublons->rowCount();
            if ($sidoublon == 0)
            {
                echo'ok';
                if ($_passwordConfirm == $_password)
                {
                    echo'ok';
                    $insertinto = $bdd->prepare("INSERT INTO user(nom, prenom, email, adresse, password) VALUES(?, ?, ?, ?, ?)");
                    $insertinto->execute(array($nom, $prenom, $email, $adresse, $password));
                    unset($_SESSION);
                    header('Location:../connexion.php');
                }
                else
                {
                    echo'no';
                    $_SESSION['fail'] =  '<font color="red">les passwords ne concordent pas !!!</font>';
                    header('Location:finscription.php');
                }
            }
            else
            {
                echo 'no';
                $_SESSION['fail'] = '<font color="red">Cette email est dejà utilisé !</font>';
                header('Location:finscription.php');
            }
        }
        else
        {
            echo'no';
            $_SESSION['fail'] = '<font color="red">Il manque des champs !</font>';
            header('Location:finscription.php');
        }
    }
    // Fonction pour se connecter
    public function connect($_email, $_password)
    {    
        $bdd = $this->bdd;   
        $login = htmlspecialchars($_email);
        $password = hash('sha512', $_password);
        if(!empty($login) && !empty($password))
        {    
            $request = $bdd->prepare("SELECT * FROM user WHERE email = ? && password = ?");
            $request->execute(array($login, $password));
            $userexist = $request->rowCount();
            if($userexist == 1)
            {
                $userinfo = $request->fetch();
                unset($_SESSION['fail']);
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['email'] = $userinfo['email'];
                header('Location:../../index.php');
            }    
            else
            {
                $_SESSION['fail']= '<font color="red">Login inexsistant ou Password incorrect !</font>';
                header('Location:../connexion.php');
            }
        }
        else
        {
            $_SESSION['fail'] = '<font color="red"> Il manque des champs !</font>';
            header('Location:../connexion.php');
        }
    }

     //tout ce qui est en bas en commenttaire c'est ce qui reste a programmer


//
    //public function update($_login, $_password, $_passwordConfirm){
    //    $_bdd = new PDO("mysql:host=localhost;dbname=livreor", 'root', '' );
//
    //    $requser = $_bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    //    $requser->execute(array($_SESSION['id']));
    //    $userinfo = $requser->fetch();
    //    
    //    if(isset($_login) && !empty($_login) && $_login != $userinfo['login']){
    //        
    //        $newlogin = htmlspecialchars($_login);
    //        $insertlogin = $_bdd->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
    //        $insertlogin->execute(array($newlogin, $_SESSION['id']));
    //    
    //        if(isset($_password) && !empty($_password) && isset($_passwordConfirm) && !empty($_passwordConfirm)) {
//
    //            $newpassword = hash('sha512', $_password);
    //            
    //            if($_password == $_passwordConfirm){
    //                
    //                $insertlogin = $_bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
    //                $insertlogin->execute(array($newpassword, $_SESSION['id']));
    //                unset($_SESSION['fail']);
    //                header('Location:../html/connexion.php');
    //            }
    //            else{
    //                $_SESSION['fail'] = '<font color="red">les passwords ne concordent pas !!!</font>';
    //                header('Location:../html/profil.php');
    //            }
    //        }
    //        else{
    //            $_SESSION['fail'] = '<font color="red"> Tout les champs doivent être compléte !!!</font>';
    //            header('Location:../html/profil.php');
    //        }
    //    }
    //    else{
    //        $_SESSION['fail'] = '<font color="red">Le Login doit etre different de l\'ancien !!!</font>';
    //        header('Location:../html/profil.php');
    //    }
    //} 
    //
    //public function disconnect(){
    //    
    //    session_start();
    //    $_SESSION = array();
    //    session_destroy();
    //    header("Location:../index.php");
    //}
}

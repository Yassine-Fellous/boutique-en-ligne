<?php
//pas fini
session_start();
class Moduleco
{
    //
    public function register($_login, $_password, $_passwordConfirm)
    {
        $_bdd = new PDO("mysql:host=localhost;dbname=livreor", 'root', 'root');

        $login = htmlspecialchars($_login);
        $password = hash('sha512', $_password);

        $_SESSION['login'] = $_login;

        if (!empty($login) && !empty($_password) && !empty($_passwordConfirm)) {

            $pasdedoublons = $_bdd->prepare("SELECT * FROM utilisateurs WHERE login = ?");
            $sidoublon = $pasdedoublons->rowCount();

            if ($sidoublon == 0) {

                if ($_passwordConfirm == $_password) {

                    $insertinto = $_bdd->prepare("INSERT INTO utilisateurs(login, password) VALUES(?, ?)");
                    $insertinto->execute(array($login, $password));
                    unset($_SESSION['fail']);
                    header('Location:../html/connexion.php');
                } else {
                    $_SESSION['fail'] =  '<font color="red">les passwords ne concordent pas !!!</font>';
                    header('Location:../html/inscription.php');
                }
            } else {
                $_SESSION['fail'] = '<font color="red">Ce login est dejà utilisé !</font>';
                header('Location:../html/inscription.php');
            }
        } else {
            $_SESSION['fail'] = '<font color="red">Il manque des champs !</font>';
            header('Location:../html/inscription.php');
        }
    }

    public function connect($_login, $_password)
    {
        $_bdd = new PDO("mysql:host=localhost;dbname=livreor", 'root', 'root');

        $login = htmlspecialchars($_login);
        $password = hash('sha512', $_password);

        if (!empty($login) && !empty($password)) {

            $request = $_bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? && password = ?");
            $request->execute(array($login, $password));
            $userexist = $request->rowCount();

            if ($userexist == 1) {
                $userinfo = $request->fetch();
                unset($_SESSION['fail']);
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['login'] = $userinfo['login'];
                header('Location:../index.php');
            } else {
                $_SESSION['fail'] = '<font color="red">Login inexsistant ou Password incorrect !</font>';
                header('Location:../html/connexion.php');
            }
        } else {
            $_SESSION['fail'] = '<font color="red"> Il manque des champs !</font>';
            header('Location:../html/connexion.php');
        }
    }

    public function update($_login, $_password, $_passwordConfirm)
    {
        $_bdd = new PDO("mysql:host=localhost;dbname=livreor", 'root', 'root');

        $requser = $_bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
        $requser->execute(array($_SESSION['id']));
        $userinfo = $requser->fetch();

        if (isset($_login) && !empty($_login) && $_login != $userinfo['login']) {

            $newlogin = htmlspecialchars($_login);
            $insertlogin = $_bdd->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
            $insertlogin->execute(array($newlogin, $_SESSION['id']));

            if (isset($_password) && !empty($_password) && isset($_passwordConfirm) && !empty($_passwordConfirm)) {

                $newpassword = hash('sha512', $_password);

                if ($_password == $_passwordConfirm) {

                    $insertlogin = $_bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
                    $insertlogin->execute(array($newpassword, $_SESSION['id']));
                    unset($_SESSION['fail']);
                    header('Location:../html/connexion.php');
                } else {
                    $_SESSION['fail'] = '<font color="red">les passwords ne concordent pas !!!</font>';
                    header('Location:../html/profil.php');
                }
            } else {
                $_SESSION['fail'] = '<font color="red"> Tout les champs doivent être compléte !!!</font>';
                header('Location:../html/profil.php');
            }
        } else {
            $_SESSION['fail'] = '<font color="red">Le Login doit etre different de l\'ancien !!!</font>';
            header('Location:../html/profil.php');
        }
    }

    public function disconnect()
    {

        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location:../index.php");
    }
}

<?php
try{
$pdo = new PDO(
    'mysql:host=localhost;dbname=magasin;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.

// ---------------------Vérification des infos ---------------------------------

if ($_POST) {
    $pseudo = $_POST['pseudo'];
    $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $mail = $_POST['mail'];
    
        $req1 = $pdo->prepare("
INSERT INTO users(pseudo ,pass, mail)
VALUES (:pseudo ,:pass, :mail)");
        $req1->execute(array(
            ':pseudo' => $pseudo,
            ':pass' => $pass_hache,
            ':mail' => $mail,
        ));
        }
}
catch (PDOException $e){
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

        header('../users.php');
    ?>
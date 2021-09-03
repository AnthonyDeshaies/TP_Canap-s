<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=magasin;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.

// Vérification de la validité des informations
$pseudo = $_POST['pseudo'];
$pass = $_POST['pass'];


//  Récupération de l'utilisateur et de son pass hashé
$req = $pdo->prepare('SELECT idUser, pass FROM users WHERE pseudo = :pseudo');
$req->execute(array(
'pseudo' => $pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['idUser'] = $resultat['idUser'];
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}

if (isset($_SESSION['idUser']) AND isset($_SESSION['pseudo']))
{
    echo 'Bonjour ' . $_SESSION['pseudo'];
}

header('Location:../admin.php');
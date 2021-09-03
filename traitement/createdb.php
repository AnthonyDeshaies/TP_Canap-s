<?php
//Création de la base de données
$pdo = new PDO('mysql:host=localhost;port=3306', 'root', '');
$sql = "CREATE DATABASE IF NOT EXISTS `magasin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=location;port=3306',
        'root',
        '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Création de la table canapes
    $req1 = "CREATE TABLE IF NOT EXISTS `magasin`.`canapes`(
    idCanape INT NOT NULL AUTO_INCREMENT,
    modele VARCHAR(155),
    couleur VARCHAR(50),
    matiere VARCHAR(50),
    nbPlaces INT,
    prix DECIMAL(15,2),
    description VARCHAR(520),
    img VARCHAR(255),
    idCategorie VARCHAR(50) NOT NULL,
    PRIMARY KEY(idCanape),
    FOREIGN KEY(idCategorie) REFERENCES categorie(idCategorie)
    );";
    $pdo->exec($req1);

    //Création de la table users
    $req2 = "CREATE TABLE IF NOT EXISTS `magasin`.`users` (
    idUser INT NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(255),
    pass VARCHAR(255),
    mail VARCHAR(255),
    dateInscription TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    role VARCHAR(20) DEFAULT 'USER',
    PRIMARY KEY(idUser));";
    $pdo->exec($req2);

    //Création de la table categorie
    $req3 = "CREATE TABLE IF NOT EXISTS `magasin`.`categories` (
    idCategorie INT NOT NULL AUTO_INCREMENT,
    genre VARCHAR(50),
    PRIMARY KEY(idCategorie)
    );";
    $pdo->exec($req3);

    echo 'Félicitations, les tables ont bien été créées !';
} 
    catch (PDOException $e) 
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

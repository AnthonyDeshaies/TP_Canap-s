/-------- TRAITEMENT DU FORMULAIRE DE CRÉATION DE CATÉGORIES --------------/

<?php
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=magasin;port=3306',
        'root',
        '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($_POST) {
        $genre = $_POST['genre'];
        echo "Ca marche";
        $req1 = $pdo->prepare('
INSERT INTO categories(genre)
VALUES (:genre)
');
        $req1->execute(array(
            ':genre' => $genre
        ));
    }
}   catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    }
header('location:../admin.php');
?>
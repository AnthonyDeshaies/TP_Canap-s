<?php
$idCanape =$_GET['id'];
$pdo = new PDO(
    'mysql:host=localhost;dbname=magasin;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$req1 = $pdo->prepare("SELECT * FROM canapes WHERE idCanape =$idCanape");
$req1->execute();
$canape = $req1->fetch();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Canape</title>

     <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- CSS link -->
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <!--Ne pas oublier, dans le formulaire de modif, d'entrer les values entrées précedemment, que l'on peut eventuellement modifier-->      
    <form action="traitement/updateFormCanape.php" method="post" enctype="multipart/form-data">
        <p>Modèle : <input type="text" name="modele" value='<?php echo $canape['modele'] ?>'></p> 
        <p>Couleur : <input type="text" name="couleur" value='<?php echo $canape['couleur'] ?>'></p>
        <p>Matière : <input type="text" name="matiere" value='<?php echo $canape['matiere'] ?>'></p>
        <p>Places : <input type="text" name="nbPlaces" value='<?php echo $canape['nbPlaces'] ?>'></p>
        <p>Prix : <input type="text" name="prix" value='<?php echo $canape['prix'] ?>'></p>
        <p>Description : <input type="text" name="description" value='<?php echo $canape['description'] ?>'></p>
        <p>Photo : <input type="file" value="form-control-file" name="img" value='<?php echo $canape['img'] ?>'></p>
        <input type="hidden" value = "<?php echo $_GET["id"] ?>" name ="idCanape">;
        <input type="submit" value="Mettre à jour ce canapé">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
    
</html>
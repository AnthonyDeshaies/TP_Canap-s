<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=magasin;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$req1 = $pdo->prepare("SELECT * FROM canapes");
$req1->execute();
$canape = $req1->fetchAll(PDO::FETCH_ASSOC);

$req2 = $pdo->prepare("SELECT * FROM categories");
$req2->execute();
$categories = $req2->fetchAll(PDO::FETCH_ASSOC);
?>
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page administrateur</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Festive&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- CSS link -->
    <link rel="stylesheet" href="CSS/style.css">
</head>

<header>
    <?php include("header.php"); ?>
</header>

<body class="container-fluid">
    <!--------------------------------Formulaires---------------------------------------------------->
    <div class="addForm">

        <!-- Formulaire de création de catégorie---------------->
        <div class="addCat">

            <h2>Creez une catégorie : </h2>

            <form action="traitement/createCategorie.php" method="post" enctype="multipart/form-data">
                
                <p>Genre/Catégorie : <input class="genre" type="text" name="genre""></p>
                <input class=" create_cat" type="submit" value="Créer une catégorie">
            
            </form>

        </div>

        <div class="trait"></div>

        <!-- Formulaire d'ajout de canapé----------------------->
        <div class="addCanape">

            <h2>Ajoutez un canapé : </h2>

            <form action="traitement/createCanape.php" method="post" enctype="multipart/form-data">
                <p>Modèle<input class="modele" type="text" name="modele"></p>
                <p>Couleur<input class="couleur" type="text" name="couleur"></p>
                <p>Matière<input class="matiere" type="text" name="matiere"></p>
                <p>Places<input class="nbPlaces" type="text" name="nbPlaces"></p>
                <p>Prix<input class="prix" type="text" name="prix"></p>
                <p>Description<textarea class="description" name="description"></textarea></p>
                <p>Photo<input class="img" type="file" value="form-control-file" name="img"></p>
                <select class="select_categ" name="categorie">
                    <?php
                    foreach ($categories as $key => $value) {
                    ?>
                        <option class="categ" value="<?php echo $value["idCategorie"] ?>"><?php echo $value["genre"] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <input class="add_btn" type="submit" value="Ajouter ce canapé">
            </form>
        </div>
    </div>

    <section class="container-fluid list_canap">
        <table class="table">
            <thead>
                <th scope="col">Modèle</th>
                <th scope="col">Couleur</th>
                <th scope="col">Matière</th>
                <th scope="col">Places</th>
                <th scope="col">Prix</th>
                <th scope="col">Photo</th>
                <th scope="col">Description</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </thead>

            <?php
            foreach ($canape as $key => $value) {
            ?>
                <tr scope="row">
                    <td>
                        <div class="modele">
                            <?php echo $value['modele'] ?>
                        </div>
                    </td>
                    <td><?php echo $value['couleur'] ?></td>
                    <td><?php echo $value['matiere'] ?></td>
                    <td><?php echo $value['nbPlaces'] ?></td>
                    <td><?php echo $value['prix'] ?></td>

                    <td><img class="img_canape" src="<?php echo $value['img'] ?>" alt=""></td>
                    
                    <td class="descrip"><?php echo mb_strimwidth("$value[description]", 0, 80, "...") ?></td>
                    
                    <td><a href="updateCanape.php?id=<?php echo $value["idCanape"] ?>">Modifier</a></td>
                    <td><a href="traitement/deleteCanape.php?id=<?php echo $value["idCanape"] ?>" class="suppr">X</a></td>
                </tr>

            <?php
            }
            ?>

        </table>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

<footer>
    <?php
    include("footer.php");
    ?>
</footer>

</html>
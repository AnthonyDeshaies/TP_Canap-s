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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index.php</title>

    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/e6187d3d12.js" crossorigin="anonymous"></script>
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
    <header>
        <?php include("header.php"); ?>
    </header>
</header>

<body>
    <div class="row col-lg-12 col-sm-10 sentence container">
        <p>
            Le bois de nos canapés est certifié FSC.
            Ce label garantit que le bois est issu d’une forêt gérée de façon responsable :
            vous aussi, participez à la préservation des forêts et de la biodiversité en choisissant nos produits.
        </p>
    </div>

    <div class="trait"></div>

    <div class="container-fluid">
        <h2>Les canapés</h2>
        <div class="dropdown">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="logo-espace-membre"><i class="fas fa-user"></i><span></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <li><a class="dropdown-item" href="user.php">Canapés droits</a></li>
                            <li><a class="dropdown-item" href="inscription.php">Canapés d'angle</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row all_cards">

        <?php
        foreach ($canape as $key => $value) {
        ?>

            <div class="col-lg-4 col-md-6">

                <div class="card">

                    <img class="images img-fluid" src="<?php echo $value['img'] ?>" class="card-img-top" alt="">

                    <div class="card_body">
                        <h3 class="modele"><?php echo $value['modele'] ?></h3>

                        <div class="indics">

                            <p class="couleur"><?php echo $value['couleur'] ?></p>
                            <p class="matiere"><?php echo $value['matiere'] ?></p>
                            <p class="nbPlaces"><?php echo $value['nbPlaces'] ?> places</p>

                        </div>
                    </div>

                    <p class="price"><?php echo $value['prix'] ?> €</p>
                    <p class="description"><?php echo mb_strimwidth("$value[description]", 0, 200, "...") ?></p>

                    <a href="#" class="btn">Ajouter au panier</a>



                </div>

            </div>
        <?php
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

<footer>
    <?php
    include("footer.php");
    ?>
</footer>

</html>
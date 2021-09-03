<?php

    if (isset($_POST['filtreCategorie']))
    {
        $filtreCategory = $_POST['filtreCategorie'];
    }

    $servername = 'localhost';
    $user = 'root';
    $password = '';

    try{
        $pdo = new PDO("mysql:host=$servername;dbname=magasin",  $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $req1 = $pdo->prepare("SELECT *
                            FROM  canapes
                            INNER JOIN categories ON canapes.idCategorie = categories.idCategorie");

            $req1->execute();

            $resultreq1 = $req1->fetchAll(PDO::FETCH_ASSOC);

            
            $req2 = $pdo->prepare("SELECT * FROM  categories");

            $req2->execute();

            $resultreq2 = $req2->fetchAll(PDO::FETCH_ASSOC);

            if (isset($filtreCategorie) && $filtreCategorie != 0)
            {
                $req3 = $pdo->prepare("SELECT *
                            FROM  canapes 
                            INNER JOIN categories ON canapes.idCategorie = categorie.idCategorie WHERE canapes.idCategorie = $filtreCategorie");

                $req3->execute();

                $resultreq3 = $req3->fetch(PDO::FETCH_ASSOC);
            }
    }

    catch(PDOException $e)
    {
        echo "Erreur : " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet"> 

        <!-- ICONS -->
        <script src="https://kit.fontawesome.com/e6187d3d12.js" crossorigin="anonymous"></script>

        <!-- STYLES -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <title></title>
    </head>
    <body>

        <?php require_once("header.php") ?>

        <section class="container products">
            <div class="row">
                <div class="col-md-12">
                    <h2>Canapés</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                <form action="test.php" method="POST">
                            <p>
                                <label for="filtreCategory">Catégorie :</label>
                                <select name="filtreCategory" id="filtreCategory">
                                    <option value="">Canapés Droits</option>
                                    <option value="">Canapés d'Angle</option>
                                    <option value="">Tous les canapés</option>
                                    <?php
                                        if ($resultreq2)
                                        {
                                            foreach ($resultreq2 as $value)
                                            {
                                                echo '<option value="'. $value['idCategorie'] .'">'. $value['modele'] . '</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </p>

                            <input class="submit-back-office" type="submit" value="Filtrer">
                        </form>
                </div>
            </div>

            <?php
                if (isset($resultreq3) && isset($filtreCategorie) && $filtreCategorie !=0)
                {?>
                    <ul>
                        <li>
                            <article>
                                <img src="<?php echo $resultreq3['img'] ?>" alt="">
                                <div class="article-container">
                                        <div class="title-products">
                                            <h4><?php echo $resultreq3['modele'] ?></h4>
                                            <h5><?php echo $resultreq3['genre'] ?></h5>
                                        </div>
                                        

                                        <div class="products-descript">
                                            <?php echo $resultreq3['desciption'] ?>
                                        </div>

                                        <p class="products-price">
                                            <?php echo $resultreq3['prix'] ?>
                                        </p>
                                </div>
                            </article>
                        </li>
                    </ul>
                    
            <?php
                }
                else 
                {?>
                    <div class="row">
                        <div class="Col-md-12">
                            <h3>Tous nos canapés</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <ul>
                                <?php
                                    if ($resultreq1)
                                    {
                                        foreach ($resultreq1 as $value)
                                        {?>
                                            <li>
                                                <article>
                                                    <img src="<?php echo $value['img'] ?>" alt="">
                                                    <div class="article-container">
                                                            <div class="title-products">
                                                                <h4><?php echo $value['modele'] ?></h4>
                                                                <h5><?php echo $value['genre'] ?></h5>
                                                            </div>
                                                            

                                                            <div class="products-descript">
                                                                <?php echo $value['prix'] ?>
                                                            </div>

                                                            <p class="products-price">
                                                                <?php echo $value['description'] ?>
                                                            </p>
                                                    </div>
                                                </article>
                                        </li>
                                        <?php
                                        }
                                    }

                                ?>
                            </ul>
                        </div>
                    </div>
            <?php   
                }
            ?>


            
        </section>

        <?php require_once("footer.php"); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>    
    </body>
</html>
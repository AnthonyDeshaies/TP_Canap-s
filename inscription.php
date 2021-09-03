<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>

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
    <?php include("header.php"); ?>
</header>

<body class="inscrip">
    <div class="inscription container">

        <h3>Inscrivez-vous !</h3>

        <form action="traitement/createUsers.php" method="post">
 
            <p><label class="resize_champ" for="">Pseudo</label><input type="text" name="pseudo"></p>
            <p><label class="resize_champ" for="">Mot de passe</label><input type="password" name="pass"></p>
            <p><label class="resize_champ" for="">Confirmer mot de passe</label><input type="password" name="confirmation"></p>
            <p><label class="resize_champ" for="">e-mail</label><input type="text" name="mail"></p>
            
            <input class="create" type="submit" value="Creer compte">
        
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

<footer>

    <?php
    include("footer.php");
    ?>

</footer>

</html>
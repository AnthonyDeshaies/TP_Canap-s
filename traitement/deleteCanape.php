<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deleteCanape.php</title>
</head>

<body>
    <?php
    try {
        $idCanape = $_GET['id'];
        $pdo = new PDO('mysql:host=localhost;dbname=magasin;port=3306', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM canapes WHERE idCanape = $idCanape";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $count = $sth->rowCount();
        print('Effacement de ' . $count . ' entrées.');
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>
</body>

<?php
    header("location:../canape.php");
?>

</html>
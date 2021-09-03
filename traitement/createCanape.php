//----------------SYSTEME D'UPLOAD D'IMAGES----------------------/
<?php
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// On vérifie si le fichier image est une image réelle ou une fausse image
if(isset($_POST["submit"])) {
 $check = getimagesize($_FILES["img"]["tmp_name"]);
 if($check !== false) {
 echo "File is an image - " . $check["mime"] . ".";
 $uploadOk = 1;
 } else {
 echo "File is not an image.";
 $uploadOk = 0;
 }
}
// On vérifie si le fichier existe déjà
if (file_exists($target_file)) {
 echo "Désolé, ce fichier existe déjà.";
 $uploadOk = 0;
 }
// On vérifie la taille de l'image
if ($_FILES["img"]["size"] > 500000) {
 echo "Désolé, ce fichier dépasse la limite de taille autorisée.";
 $uploadOk = 0;
 }
// On vérifie le type de fichier
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 echo "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
 $uploadOk = 0;
}
// On vérifie si $uploadOk est à 0 à cause d'une erreur
if ($uploadOk == 0) {
 echo "Désolé, votre fichier n'a pas été uploader";
 // Si tout est ok on essaye d'uploader le fichier
 } else {
 if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
 echo "Le fichier ". basename( $_FILES["img"]["name"]). " a bien été uploader."
;
 } else {
 echo "Sorry, there was an error uploading your file.";
 }
 }
//---------------------FIN SYSTEME D'UPLOAD D'IMAGES------------------------------/


// --------------TRAITEMENT DU FORMULAIRE D'AJOUT DE CANAPÉ ------------------/

try{
    $pdo = new PDO(
        'mysql:host=localhost;dbname=magasin;port=3306','root','',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne qui permet d'afficher les erreurs s'il y en a.
    
    if ($_POST) {
        $modele = $_POST['modele'];
        $couleur = $_POST['couleur'];
        $matiere = $_POST['matiere'];
        $nbPlaces = $_POST['nbPlaces'];
        $prix = $_POST['prix'];
        $description = $_POST['description'];
        $img = "images/".$_FILES["img"]["name"];
        $categorie = $_POST['categorie'];
        $req1 = $pdo->prepare("
    INSERT INTO canapes(modele, couleur, matiere, nbPlaces, prix,description, img, idCategorie )
    VALUES (:modele , :couleur, :matiere , :nbPlaces ,:prix,:description, :img, :idCategorie)
    ");
            $req1->execute(array(
                ':modele' => $modele,
                ':couleur' => $couleur,
                ':matiere'=> $matiere,
                ':nbPlaces' => $nbPlaces,
                ':prix' => $prix,
                ':description' => $description,
                ':img' => $img,
                ':idCategorie' => $categorie
            ));
    }
    }
    catch (PDOException $e){
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    
    header('location:../admin.php');
    
    ?>



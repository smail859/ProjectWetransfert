<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=wetransfert;charset=utf8", "root","");

} catch(\Throwable $e){
    die("erreur : ".$e->getMessage());
}

$responce = $bdd->query("SELECT `user`.id, `file`.name, `file`.extension FROM `file` INNER JOIN `user` ON `user`.id = `file`.userId WHERE `file`.id = ".$_GET["id"].";");
    $row = $responce->fetch();

if(!isset($row['id'])) {

    header('Location: smailpage.html');

}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <h1>Page reussi voici le fichier</h1>
    <a href="downloadtraitement.php?userId=<?php echo $row['id'] ?>&fileBaseName=<?php echo $row['name'] ?>&fileExt=<?php echo $row['extension'] ?>">telecharger</a>




</body>
</html>
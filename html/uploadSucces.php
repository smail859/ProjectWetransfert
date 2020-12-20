<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Telechargement</title>
   
</head>
<body>
    <h1> 
        votre fichier 
        <?php
            echo $_GET["fileName"];
            
            echo "cliquer ici pour telecharger"
            
        ?>
        a bien été mis en ligne.
        il est disponible à l'adresse 
        <a href="download.php?id=<?php echo $_GET["fileId"] ?>"> download.php?id=<?php echo $_GET["fileId"] ?> </a>
        
        
    </h1>
    <a href="smailpage.html"> Uploader un autre fichier </a></br>
    

</body>
</html>


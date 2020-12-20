<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=wetransfert;charset=utf8", "root","");

} catch(\Throwable $e){
    die("erreur : ".$e->getMessage());
}

$userId = $_GET["userId"];
$baseName = $_GET["fileBaseName"];
$ext = $_GET["fileExt"];
$fileId = 0;

$responce = $bdd->query(<<<EOD
    SELECT `file`.id FROM `file`
    INNER JOIN `user` ON `user`.id = `file`.userId
    WHERE `user`.id = ${userId} AND `file`.name = "${baseName}" AND `file`.extension = "${ext}";
EOD);
$row = $responce->fetch();

if(!isset($row['id'])){
    echo "erreur";
} else {
    $fileId = $row['id'];
    $statId = 0;
    $now = new DateTime();
    $year = $now->format("Y");
    $week = $now->format("W");
    

    $responce = $bdd->query(<<<EOD
        SELECT `statistics`.id FROM `statistics`
        INNER JOIN `file` ON `statistics`.fileId = ${fileId}
        WHERE `statistics`.yearNumber = ${year} AND `statistics`.weekNumber = ${week}
    EOD);
    $row = $responce->fetch();

    if (isset($row["id"]))
    {
        $statId = $row["id"];
        echo "just increment !";
    }
    else
    {
        echo "erreur".$fileId;
        $bdd->exec(<<<EOD
            INSERT INTO `statistics` 
                (`statistics`.weekNumber, `statistics`.yearNumber, `statistics`.nbDownload, `statistics`.fileId) 
                VALUE (${week}, ${year}, 0, ${fileId});
        EOD);
        echo "new stat inserted !";


        $responce = $bdd->query(<<<EOD
            SELECT `statistics`.id FROM `statistics`
            INNER JOIN `file` ON `statistics`.fileId = ${fileId}
            WHERE `statistics`.yearNumber = ${year} AND `statistics`.weekNumber = ${week}
        EOD);
        $row = $responce->fetch();
        $statId = $row["id"];
        echo $statId;
    }

    $bdd->exec(<<<EOD
        UPDATE `statistics` 
        SET `statistics`.nbDownload = `statistics`.nbDownload + 1 
        WHERE id = ${statId}
    EOD);

    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Cache-Control: private', false); 
    header('Content-Type: application/pdf');

    header('Content-Disposition: attachment; filename="'. $baseName . '";');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($baseName.".".$ext));

    readfile($filename);

}


    


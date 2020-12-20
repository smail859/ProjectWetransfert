<?php
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=wetransfert;charset=utf8","root","");
    } catch (\Throwable $e) {
        die("erreur : ".$e->getMessage());
    }

    $fileId = $_GET["fileId"];


    $responce = $bdd->query(<<<EOD
        SELECT `statistics`.nbDownload, `statistics`.weekNumber, `statistics`.yearNumber FROM `statistics`
        WHERE `statistics`.fileId = {$fileId}
        ORDER BY `statistics`.yearNumber, `statistics`.weekNumber;
    EOD);
    $row = $responce->fetchAll();

    $jsArray = "[";
    for ($i=0; $i < sizeof($row); $i++) { 
        $jsArray = $jsArray.$row[$i]["nbDownload"];
        if ($i < sizeof($row) - 1)
        {
            $jsArray = $jsArray.", ";
        }
    }
    $jsArray = $jsArray."]";
    

    $jsLabel = "[";
    for ($i=0; $i < sizeof($row); $i++) { 
        $jsLabel = $jsLabel."'s : ".$row[$i]["weekNumber"]." / ".$row[$i]["yearNumber"]."'";

        if ($i < sizeof($row) - 1)
        {
            $jsLabel = $jsLabel.", ";
        }
    }
    $jsLabel = $jsLabel."]";
    echo $jsLabel;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test chart</title>
</head>
<body>
    <canvas id="line-chart" width="200" height="100"></canvas>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
    var arrayData = <?php echo $jsArray ?>;
    var label = <?php echo $jsLabel ?>;
    new Chart(document.getElementById("line-chart"), {
    type: 'line',
    data: {
        labels: label,
        datasets: [{ 
            data: arrayData,
            label: "downloads",
            borderColor: "#3e95cd",
            fill: true
        }
        ]
    },
    options: {
      scales: {
         yAxes: [{
            ticks: {
               min: Math.min.apply(this, arrayData) - 5,
               max: Math.max.apply(this, arrayData) + 5,
               stepSize: 5
            }
         }]
      }
   }
    });
</script>
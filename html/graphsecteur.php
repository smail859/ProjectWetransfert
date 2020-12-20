<?php



try {
    $bdd = new PDO("mysql:host=localhost;dbname=wetransfert;charset=utf8", "root","");

} catch(\Throwable $e){
    die("erreur : ".$e->getMessage());
}

$reponce = ("SELECT `user`.id, `user`.pseudo, FROM `user`");
$reponce = $bdd->query( "INSERT INTO `user` ("`user`.pseudo, `user`.id,") VALUE('".pathinfo($_POST[""INSERT INTO `user` (`user`.pseudo, `user`.id,) VALUE('".pathinfo($_REQUEST_POST["nbDownload"]["weekNumber"])."' ,'".pathinfo($_POST["pseudo"])."',".$idut.")")";
if(!isset($row['statistics'])) {

   

}




?>

<!doctype html>
<html lang="fr">
  <head>

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/pagecss.css">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <title>Graphique</title>
  </head>


  <body>
    <h1>Graphique en courbe</h1>
    <title>Graphique en courbe</title>
    <div style="width: 75%;">
      <canvas id="myChart"></canvas>
    </div>
    
    <div class="head">
      <div class="navb">

        <a href="smailpage.html" class="header__navbar--menu--link">Accueil</a>
        <a href="graphhisto.html" class="header__navbar--menu--link">Histogramme</a>
        <a href="graphsecteur.html" class="header__navbar--menu--link">Graphique secteur</a>
        

      
      </div>
      
    </div>

    <script>
      
      var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        
        type: 'pie',
    
        
        data: {
            labels: ['Semaine 12 en 2020'  ],
            datasets: [{
                label: 'nombre de telechargement',
                backgroundColor: 'rgba(255, 99, 132, )',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },
    
        
        options: {
            
        }
    });
     
    </script>


  </body>
</html>

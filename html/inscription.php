<?php
    

    try {
        $bdd = new PDO("mysql:host=localhost;dbname=wetransfert;charset=utf8", "root","");
    
    } catch(\Throwable $e){
        die("erreur : ".$e->getMessage());
    }


$AfficherFormulaire=1;
if(isset($_POST['pseudo'],$_POST['mdp'])){
    if(empty($_POST['pseudo'])){
        echo "Le champ Pseudo est vide.";
    } else if(!preg_match("#^[a-z0-9]+$#",$_POST['pseudo'])){
        echo "Le Pseudo doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
    } else if(strlen($_POST['pseudo'])>100){
        echo "Le pseudo est trop long, il dépasse 100 caractères.";
    } else if(empty($_POST['mdp'])){
        echo "Le champ Mot de passe est vide.";
    } else if(mysqli_num_rows(mysqli_query($mysqli,"SELECT 'memmbres.id' FROM membres WHERE pseudo='".$_POST['pseudo']."smail'"))==1){
        echo "pseudo est déjà utilisé.";
    } else {
        
        if(!mysqli_query($mysqli,"INSERT INTO membres SET pseudo='".$_POST['pseudo']."', mdp='".md5($_POST['mdp'])."'")){
            echo "Une erreur s'est produite: ".mysqli_error($mysqli);
        } else {
            echo "Vous êtes inscrit avec succès!";
          
            $AfficherFormulaire=0;
        }
    }
}
if($AfficherFormulaire==1){
    ?>
    
    <link rel="stylesheet" type="text/css" href="../css/inscription.css">
    <br />
    <h1>Inscrit toi !!!</h1>
    <div class= "insc">

    
        <form method="post" action="inscription.php">
            Pseudo (a-z0-9) : <input type="text" name="pseudo">
            <br />
            Mot de passe : <input type="password" name="mdp">
            <br />
            <input type="submit" value="S'inscrire">
        </form>
    </div>
    <?php
}
?>
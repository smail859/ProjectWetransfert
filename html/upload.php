<?php
use PHPMailer\PHPMailer\PHPMailer;
require "../vendor/autoload.php";
try {
    $bdd = new PDO("mysql:host=localhost;dbname=wetransfert;charset=utf8", "root","");

} catch(\Throwable $e){
    die("erreur : ".$e->getMessage());
}
if (!isset($_POST['Convey'])) 
{
    echo 'formaulaire non remplie</br>';
}
else if (!isset($_POST['adressemail'])|| $_POST['adressemail']=='')
{
    echo 'adresse mail invalid</br>';

}

    

    echo 'valide</br>';
    $responce = $bdd->query("SELECT `user`.id FROM `user` WHERE `user`.mail = '".$_POST['adressemail']."'" );
    $row = $responce->fetch();
    if(isset ($row ['id'])){
        $idut = $row ['id'];

    } 
    else {
        $nbrow = $bdd->exec("INSERT INTO `user`(`user`.mail) VALUE ('".$_POST['adressemail']."')");
        $responce = $bdd->query("SELECT `user`.id FROM `user` WHERE `user`.mail = '".$_POST['adressemail']."'" );
        $row = $responce->fetch();
        $idut = $row ['id'];
    }








    $targetfile = "../upload/".$idut ."/".basename($_FILES["fileToupload"]["name"]);

    if (!is_dir('../upload/'.$idut)){
        mkdir("../upload/".$idut);
    }

    if (file_exists($targetfile)){
        echo 'file exists';
    
    }
    else{
        
        if (move_uploaded_file($_FILES["fileToupload"]["tmp_name"], $targetfile)){
        
          
            $bdd->exec("INSERT INTO `file` (`file`.name, `file`.extension,`file`.userId) VALUE('".pathinfo($_FILES["fileToupload"]["name"])["filename"]."' ,'".pathinfo($_FILES["fileToupload"]["name"])["extension"]."',".$idut.")");
            $responce = $bdd->query("SELECT `file`.id FROM `file` WHERE `file`.userId = ".$idut." AND `file`.name = \"".pathinfo( $_FILES["fileToupload"]["name"])['filename']."\" AND `file`.extension = \"".pathinfo($_FILES["fileToupload"]["name"])['extension']."\";");
            $row = $responce->fetch();
            $fileId = $row['id'];
            
        

            
                
                
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Debugoutput = 'html';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = 'elhajjarsmail70000@gmail.com';
            $mail->Password = 'ateyaba0307';
            $mail->setfrom($_POST['adressemail'], $_POST['adressemail']);
            $mail->addAddress($_POST['emaildest'], $_POST['emaildest']);
            if ($mail->addreplyto($_POST['adressemail'], $_POST['adressemail'])) {
                $mail->Subject = 'Formulaire de contact PHPMailer';
                $mail->isHTML(false);
                $mail->Body = <<<EOT
                    {$_POST['Message']}
                    url de telechargement: http://localhost/ProjectWetransfert/tests/html/download.php?id={$fileId}
                    EOT;
                if (!$mail->send()) {
                    $msg = 'Désolé, quelque chose a mal tourné. Veuillez réessayer plus tard.';
                } else {
                    $msg = 'Message envoyé ! Merci de nous avoir contactés.';
                }
            } else {
                $msg = 'Partagez-les avec nous !';
            }

            
            header('Location: uploadSucces.php?fileId='.$fileId.'&fileName='.htmlspecialchars( basename( $_FILES["fileToupload"]["name"])).'');
            exit();
        }
            else{
            header('Location: uploadfail.php?fileId='.$fileId.'&fileName='.htmlspecialchars( basename( $_FILES["fileToupload"]["name"])).'');
            exit();
        }
    }
       












?>
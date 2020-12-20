
<?php
use PHPMailer\PHPMailer\PHPMailer;
require "../vendor/autoload.php";

if(isset($_POST['email'])) {
    
    
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'elhajjarsmail70000@gmail.com';
    $mail->Password = 'ateyaba0307';
    $mail->setfrom($_POST['email'], 'wetranfert');
    $mail->addAddress($_POST['email'], $_POST['name']);
    if ($mail->addreplyto('elhajjarsmail70000@gmail.com', 'wetranfert')) {
        $mail->Subject = 'Formulaire de contact PHPMailer';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
            E-mail: {$_POST['email']}
            Nom: {$_POST['name']}
            Message: {$_POST['message']}
            url de telechargement: http://localhost/ProjectWetransfert/tests/html/download.php?{$_POST['id']}
            EOT;
        if (!$mail->send()) {
            $msg = 'Désolé, quelque chose a mal tourné. Veuillez réessayer plus tard.';
        } else {
            $msg = 'Message envoyé ! Merci de nous avoir contactés.';
        }
    } else {
        $msg = 'Partagez-les avec nous !';
    }
    
}











?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire d'envoi de mail</title>
    <link rel="stylesheet" type="text/css" href="../css/mail.css">
</head>
<body>
<h1>Envoyer un email</h1>
<?php if (!empty($msg)) {
    echo "<h2>$msg</h2>";
} ?>
<form method="POST">
    <div class= email>

        <div class=nom>
            <label for="name">Nom: <input type="text" name="name" id="name"></label><br><br>
        </div>
        
        <div class=emil>
            <label for="email">E-mail destinataire: <input type="email" name="email" id="email"></label><br><br>   
        </div>

        <div class=mes>
            <label for="message">Message: <textarea name="message" id="message" rows="8" cols="20"></textarea></label><br><br>
        </div>

        <div class=env>
            <input type="submit" value="Envoyer">
        </div>
    </div>
</form>
</body>
</html>
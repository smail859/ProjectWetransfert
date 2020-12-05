<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet">
    <title>Projet WeTransfert</title>
</head>
<body>
    <h1> Projet WeTransfert </h1>

    <div id="content">
        <div id="form-content">
            <form action="upload.php" method="post" enctype="multipart/form-data">

                <label> Nom d'utilsateur : </label>
                <input type="text" name="userName">
                <input type="file" name="fileToUpload">
                <input type="submit" name="submit">

            </form>
        </div>

        <div id="info-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
        </div>
    </div>

</body>
</html>
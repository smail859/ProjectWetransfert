
<?php

echo $_POST["userName"];
if (!is_dir("uploads/".$_POST["userName"])) {
    //Create our directory if it does not exist
    echo " Directory created -> ".mkdir("uploads/".$_POST["userName"])."<br>";
}

$target_dir = "uploads/".$_POST["userName"]."/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;

// Check if file already exists
if (file_exists($target_file)) 
{
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
} 
else 
{
    // if everything is ok, try to upload file
    echo $_FILES["fileToUpload"]["tmp_name"]."<br/>";
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
    {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
}

    
?>
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'db.php';


echo var_dump($_POST);


// if(!empty($_POST['firstname']))
// {

    if(isset($_POST['fileuploadsubmit'])) {
        $fileupload = $_FILES['fileupload']['name'];
        $fileuploadTMP = $_FILES['fileupload']['tmp_name'];
        $folder = "images/";
        move_uploaded_file($fileuploadTMP, $folder.$fileupload);

        $sql = "INSERT INTO `entries`(Title, Body, Author, Category, Image) VALUES ('".$_POST['title']."','".$_POST['Description']."','".$_POST['firstname']."','".$_POST['Catego']."','$fileupload')";
        $qry = mysqli_query($conn, $sql);
         
        if ($qry) {
        echo "<br />uploaded";
        }
        }
    
    if ($conn->connect_errno) {
        echo "Connect failed:". $conn->connect_error;
        exit();
    }


// }
header("Location: index.php?sucess");

?>
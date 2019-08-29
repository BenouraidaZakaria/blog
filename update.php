<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'db.php';

// if(!empty($_POST['firstname']))
// {
    
    if(isset($_POST['Update'])) {
        $fileupload = $_FILES['image']['name'];
        $fileuploadTMP = $_FILES['image']['tmp_name'];

        $folder = "images/";
        move_uploaded_file($fileuploadTMP, $folder.$fileupload);

        $sql = "UPDATE `entries` SET Title='".$_POST['title']."',Body='".$_POST['Description']."',Author='".$_POST['firstname']."',Category='".$_POST['Catego']."',Image='$fileupload'WHERE ID=".$_GET['id'];
        $qry = mysqli_query($conn, $sql);
         
        if ($qry) {
        echo "<br />updated";
        }
        }
    
    if ($conn->connect_errno) {
        echo "Connect failed:". $conn->connect_error;
        exit();
    }
// }
header("Location: index.php?updated");

?>
<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require 'db.php';


echo var_dump($_POST);

// if(!empty($_POST['firstname']))
// {
    if ( $conn->query("INSERT INTO comments(FName, Commented, ArticleID) VALUES ('".$_POST['Comname']."', '".$_POST['comment']."','".$_POST['id']."')") === TRUE) {
        printf("comment successfully added.\n");
    }
    
    
    if ($conn->connect_errno) {
        echo "Connect failed:". $conn->connect_error;
        exit();
    }


// }
header('Location: articlepage.php?id='.$_POST["id"]);
?>

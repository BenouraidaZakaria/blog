<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'db.php';
$sql = "UPDATE `entries` SET showstatus=0 WHERE ID=".$_GET['id'];
$qry = mysqli_query($conn, $sql);
header("Location: index.php?articledeleted");

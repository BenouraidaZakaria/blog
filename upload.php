<?php 
    if (isset($_POST['submit'])) {
        $file = $_files['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        dd($fileType);
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed= array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt,allowed)) {
            if($fileError === 0){
                if($fileSize<1000000){
                    $fileNameNew=uniqid('',true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    header("Location: index.php?uploadsucess");
                }else{
                    echo"FILE TOO BIG";
                }
            }else{
                echo"ERROR TO UPLOAD";
            }
        }else{
            echo"WRONG FILE TYPE";
        }
        
    }

?>
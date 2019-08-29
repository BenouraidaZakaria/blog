<!DOCTYPE html>
<html lang="en">
<?php
require 'head.php';
require 'nav.php'
?>

<body>

  <div class="container-fluid" style="width:100%">
    <div id="articles">
    <?php
        $mysqli = new mysqli('localhost', 'root', '', 'blog');
        $mysqli->set_charset("utf8");
        $requete = 'SELECT * FROM entries';
        $resultat = $mysqli->query($requete);
        echo'<div class="row">';
        while ($ligne = $resultat->fetch_assoc()) {
          echo '<div class="col-md-3">'.'<div style="margin-bottom:10px;border:solid 1px grey;border-radius:25px;justify-content:center;padding:10px 10px 10px 10px;text-align:center"><img style="border-radius:25px" src="images/'.$ligne['Image'].'" height="150" width="100%" >'.'<br>'.'<br>'.'
          <h5>'. $ligne['Title'].'</h5> '.'
          '.'<a class="btn btn-success" href="editblog.php?id='. $ligne['ID'] .'">EDIT</a>
          '.'<a class="btn btn-danger" href="delete.php?id='. $ligne['ID'] .'">DELETE</a>
          </div>'.'</div> ';
        }
        echo'</div>';
        $mysqli->close();
    ?>
    </div>
  </div>



    
</body>
</html>
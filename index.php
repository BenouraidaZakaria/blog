<!DOCTYPE html>
<html lang="en">
<?php
require 'head.php';
require 'nav.php'
?>
<body>
<div class="container-fluid"  style="width:100%">
  <div id="articles">
    <?php
      $mysqli = new mysqli('localhost', 'root', '', 'blog');
      $mysqli->set_charset("utf8");
      $requete = 'SELECT * FROM entries WHERE showstatus=1';
      $resultat = $mysqli->query($requete);
      echo '<div class="row" class="back">';
      while ($ligne = $resultat->fetch_assoc()) {
        ?>
        <div class="col-md-3">
          <div style="margin-bottom:10px;margin-top:10px;border:solid 1px grey;border-radius:25px;justify-content:center;padding:10px 10px 10px 10px;text-align:center">
            <img style="border-radius:25px" src="images/<?php echo $ligne['Image'] ?>" height="150" width="100%" >
            <br><br>
            <h5><?php echo $ligne['Title'] ?></h5>
            <p><?php echo substr($ligne['Body'],0,150);?> ...</p>
            <a class="btn btn-primary" href="articlepage.php?id=<?php echo $ligne['ID'] ?>">Read</a>
          </div>
        </div>
        <?php
      }
      echo '</div>';
      $mysqli->close();
    ?>
  </div>
</div>  
</body>
</html>
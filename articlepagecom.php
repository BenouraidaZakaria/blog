<!DOCTYPE html>
<html lang="en">
<div id="container">
  <div id="header">
    <?php
    require 'head.php';
    require 'nav.php'
    ?>
  </div>

  <div id="body">
    <div class="container">
      <div id="articles">
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'blog');
        $mysqli->set_charset("utf8");
        $requete = 'SELECT * FROM entries WHERE ID=' . $_GET["id"];
        $resultat = $mysqli->query($requete);
        echo '<div class="row" style="width:1000px;margin:auto;margin-top:20px;text-decoration:underline">';
        while ($ligne = $resultat->fetch_assoc()) {
          echo '<h1><div class="col-md-12">' . $ligne['Title'] . '</h1>' . '<br>' . '<br>' . '<br>' . '<br>' . '';
        }
        echo '</div>';
        echo '<div class="row" style="width:1000px;margin:auto;border:1px solid black;border-radius:25px;margin-bottom:50px;box-shadow: 5px 10px #999;">';
        $resultat = $mysqli->query($requete);
        while ($ligne = $resultat->fetch_assoc()) {
          echo '<div class="col-md-12" style="margin-top:20px;">' . $ligne['Body'] . '<br>' . '<br>' . '';
        }
        echo '</div>';
        echo '<div class="row" style="width:1000px;margin:auto">';
        $resultat = $mysqli->query($requete);
        while ($ligne = $resultat->fetch_assoc()) {
          echo '<div class="col-md-12">' . '<strong>Added by: </strong>' . $ligne['Author'] . ' ' . '<br>' . '<br>';
        }
        echo '</div>';
        $mysqli->close();
        ?>
      </div>
    </div>

    <div id="comments">

      <?php
      $mysqli = new mysqli('localhost', 'root', '', 'blog');
      $mysqli->set_charset("utf8");
      $requete = 'SELECT * FROM comments WHERE  ArticleID=' . $_GET['id'];
      $resultat = $mysqli->query($requete) or die($mysqli->error);
      ?>
      <div style="width:970px;margin:auto">
        <?php
        while ($ligne = $resultat->fetch_assoc()) {
          ?>
          <div style="box-shadow: 5px 10px #888888;border:solid 1px grey;border-radius:25px;margin:30px; padding:20px">
            <strong>Comment by: </strong> <?php echo $ligne['FName'] ?><br><br>

            <?php echo $ligne['Commented'] ?><br>
            <?php echo '<a class="btn btn-danger" href="deletecom.php?id=' . $ligne['ID'] . '">DELETE</a>' ?>
            <?php echo '<a class="btn btn-warning" href="restorecom.php?id=' . $ligne['ID'] . '">RESTORE</a>' ?>
          </div>
        <?php
        }
        ?>
      </div>

    </div>


    <fieldset class="contain" style="width:500px;margin:auto">
      <form action="insertcom.php" name="Com" method="post">
        <p>Add Comment:</p>
        <input type="hidden" name="id" value="<?php echo  $_GET["id"]; ?>">
        <div class="row">
          <div class="col-lg-12">
            <input type="text" name="Comname" placeholder="Your Name" class="form-control"><br>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 ">
            <textarea class="form-control" name="comment" rows="10"></textarea>
          </div>
        </div><br><br>
        <button type="submit" id="combtn" name="send" class="btn btn-success">Comment</button>
        <a href="index.php" id="cancel" class="btn btn-danger">Cancel</a>
      </form>
    </fieldset><br><br>
  </div>

</div>

</div>

</div id="footer">
<?php
require 'footer.php';
?>
</div>
</div>

</html>
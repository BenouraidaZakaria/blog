<!DOCTYPE html>
<html lang="en">
<title><?php echo $_GET["category"] ?></title>
<div id="container">
  <div id="header">
    <?php
    require 'head.php';
    require 'nav.php'
    ?>
  </div>

  <div id="body">
    <div class="container-fluid" style="width:100%">
      <div class="row" style="margin:20px 0 0 0;">
        <div id="articles" class="col-md-9">
          <?php
          $mysqli = new mysqli('localhost', 'root', '', 'blog');
          $mysqli->set_charset("utf8");
          $cate = $_GET["category"];
          $requete = "SELECT * FROM entries WHERE showstatus=1 AND Category = '$cate' ORDER BY Title";
          $resultat = $mysqli->query($requete) or die($mysqli->error);
          echo '<div class="row">';
          while ($ligne = $resultat->fetch_assoc()) {
            ?>
            <div class="col-md-4">
              <div style="box-shadow: 3px 3px #888888; margin-bottom:10px;margin-top:10px;border:solid 1px grey;border-radius:25px;justify-content:center;padding:10px 10px 10px 10px;text-align:center">
                <img style="border-radius:25px" src="images/<?php echo $ligne['Image'] ?>" height="150" width="100%">
                <br><br>
                <h5 style="text-decoration:underline"><?php echo $ligne['Title'] ?></h5>
                <p><?php echo substr($ligne['Body'], 0, 150); ?> ...</p>
                <a class="btn btn-primary" href="articlepage.php?id=<?php echo $ligne['ID'] ?>">Read</a>
              </div>
            </div>
          <?php
          }
          echo '</div>';
          $mysqli->close();
          ?>
        </div>
        <div class="col-md-3">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Categories</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row"> <a href="categoryindex.php?category=category1" style="text-decoration:none;">Category 1</a>
                </th>

              </tr>
              <tr>
                <th scope="row"> <a href="categoryindex.php?category=category2" style="text-decoration:none;">Category 2</a>
                </th>

              </tr>
              <tr>
                <th scope="row"> <a href="categoryindex.php?category=category3" style="text-decoration:none;">Category 3</a>
                </th>

              </tr>
            </tbody>
          </table>
        </div>

      </div>
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
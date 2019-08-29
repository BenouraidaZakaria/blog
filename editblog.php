<!DOCTYPE html>
<html lang="en">
<?php
    $mysqli = new mysqli('localhost', 'root', '', 'blog');
        $mysqli->set_charset("utf8");
        $requete = 'SELECT * FROM entries WHERE ID='.$_GET["id"];
        $resultat = $mysqli->query($requete);
        $ligne = $resultat->fetch_assoc()
?>
<?php
require 'head.php';
require 'nav.php'
?>
<body>
<h1 style="text-align:center">Edit post</h1> 
<fieldset class="contain" style="width:500px;margin:auto">
  <form id="myForm" name="myForm"  action="update.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-lg-12">
        <input id="Fname"type="text" name="title"placeholder="Title" class="form-control" value="<?php echo  $ligne["Title"]; ?>"><br>    
      </div>
    </div>   
      <div class="row">
        <div class="col-lg-12 ">
          <textarea class="form-control" name="Description" id="description" rows="10" cols="50"><?php echo  $ligne["Body"]; ?></textarea>   
        </div>
      </div> <br>
      <div class="row">
        <div class="col-lg-12">
          <input id="Fname"type="text" name="firstname" placeholder="Your Name" class="form-control" value="<?php echo  $ligne["Author"]; ?>"><br>    
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <select name="Catego" class="form-control" form="myForm" value="<?php echo  $ligne["Category"]; ?>">
            <option value="categorie">categorie</option>
            <option value="cate">cate</option>
            <option value="categogo">categogo</option>
          </select>                 
        </div>
      </div><br>
      <img style="border-radius:5px" src="images/<?php echo $ligne['Image'] ?>" width="100px" >
      <input type="file" name="image"><br><br>
      <button type="submit" name="Update" class="btn btn-success">Update</button>
      <a href="index.php"  id="cancel" class="btn btn-danger">Cancel</a><br><br>
  </form>
</fieldset>    
</body>
</html>


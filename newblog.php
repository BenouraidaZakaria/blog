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

    <h1 style="text-align:center;margin-top:20px">Create new post</h1>
    <fieldset class="contain" style="width:500px;margin:auto">
      <form action="insert.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-12">
            <input id="Fname" type="text" name="title" placeholder="Title" class="form-control"><br>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 ">
            <textarea class="form-control" name="Description" id="description" rows="10" cols="50"></textarea>
          </div>
        </div><br>
        <div class="row">
          <div class="col-lg-12">
            <input id="Fname" type="text" name="firstname" placeholder="Your Name" class="form-control"><br>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <select name="Catego" class="form-control">
              <option value="category1">category1</option>
              <option value="category2">category2</option>
              <option value="category3">category3</option>
            </select>
          </div>
        </div> <br>
        <input type="file" name="fileupload" /><br><br>
        <input class="btn btn-success" type="submit" name="fileuploadsubmit" value="Upload" />
        <a href="index.php" id="cancel" class="btn btn-danger">Cancel</a>
      </form>
      <br>
    </fieldset>
  </div id="footer">
  <?php
  require 'footer.php';
  ?>
</div>

</html>
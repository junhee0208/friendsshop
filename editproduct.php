<?php include 'inc/header.php'; ?>
<?php //include_once 'config/init.php'?>
<style>
    #upper-banner{
        width:80%;
        margin-left:auto;
        margin-right:auto;
    }
    form{
        width:40%;
        margin-left:auto;
        margin-right:auto;
    }
</style>
<div id="upper-banner" class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Edit Products</h1>
        <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
        <!--<button class="btn btn-primary btn-lg" type="button">Example button</button>-->
      </div>

      
</div>

<?php
require_once 'inc/function.inc.php';
require_once 'inc/dbh.inc.php';

if(isset($_GET['prod_id']))
{
  $prod_id = $_GET['prod_id'];

  $product = GetProduct($conn, $prod_id);
} 
?>

<form method="post" action="inc/edit.php?prod_id=<?php echo $prod_id ?>">
    <h1 class="h3 mb-3 fw-normal">Edit Products</h1>
    <div class="row g-3">

            <div class="col-12">
              <label for="title" class="form-label">Product Title</label>
              <div class="input-group has-validation" style="margin-bottom:5px;">
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $product["productName"]; ?>"/>
              </div>
            </div>

            <div class="col-12">
              <label for="title" class="form-label">Product Price</label>
              <div class="input-group has-validation" style="margin-bottom:5px;">
                <span class="input-group-text">$</span>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $product["productPrice"]; ?>" />
              </div>
            </div>

            <div class="col-12">
              <label for="description" class="form-label">Description</label>
              <div class="input-group has-validation" style="margin-bottom:5px;">
                <!--<input type="text" class="form-control" id="description" name="description" placeholder="Description" required>-->
                <textarea class="form-control" id="description" name="description" style="width:660px; height:300px">
                <?php echo $product["productDesc"]; ?>              
              </textarea>
              </div>
            </div>

            <div class="col-12">
              <label for="image" class="form-label">Image file</label>
              <div class="input-group has-validation" style="margin-bottom:5px;">
                <input type="text" class="form-control" id="image"  name="image" value="<?php echo $product["productImg"]; ?>"/>
              </div>
            </div>
          </div>

          <br><br>
  
    <button class="w-30 btn btn-lg btn-primary" type="submit" name="submit">Update</button>
  </form>

  <br><br>


<?php include 'inc/footer.php'; ?>
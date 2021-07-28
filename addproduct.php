<?php include 'inc/header.php'; ?>

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
        <h1 class="display-5 fw-bold">Add Friends' New Products!</h1>
        <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
        <!--<button class="btn btn-primary btn-lg" type="button">Example button</button>-->
      </div>

      
</div>


<form action="inc/addprod.inc.php" method="post">
  <br><br>
    <h1 class="h3 mb-3 fw-normal">Add A Product</h1>

    <div class="row g-3">

            <div class="col-12">
              <label for="title" class="form-label">Product Title</label>
              <div class="input-group has-validation" style="margin-bottom:5px;">
                <input type="text" class="form-control" id="title" name="title" placeholder="Product Title" required>
              <div class="invalid-feedback">
                  Product title is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="title" class="form-label">Product Price</label>
              <div class="input-group has-validation" style="margin-bottom:5px;">
                <span class="input-group-text">$</span>
                <input type="text" class="form-control" id="price" name="price" placeholder="Product Price" required>
              <div class="invalid-feedback">
                  Product title is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="description" class="form-label">Description</label>
              <div class="input-group has-validation" style="margin-bottom:5px;">
                <!--<input type="text" class="form-control" id="description" name="description" placeholder="Description" required>-->
                <textarea class="form-control" id="description" name="description" style="width:660px; height:300px"></textarea>
                <div class="invalid-feedback">
                  Your Password is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="image" class="form-label">Image file</label>
              <div class="input-group has-validation" style="margin-bottom:5px;">
                <input type="text" class="form-control" id="image"  name="image" required>
              <div class="invalid-feedback">
                  Please input product image.
                </div>
              </div>
            </div>
          </div>

          <br><br>
  
    <button class="w-30 btn btn-lg btn-primary" type="submit" name="submit">Add Product</button>
  </form>

  <br><br>







<?php include 'inc/footer.php'; ?>
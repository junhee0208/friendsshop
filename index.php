<?php include 'inc/header.php'; ?>
<?php error_reporting(E_ALL); ?>
<?php ini_set('display_errors', 1); ?>
<?php include_once 'config/init.php'; ?>


<style>

.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

.main{
    width:80%;
    margin-right:auto;
    margin-left:auto;
}
em:nth-child(2) {
    color: #eb212b;
    font-size: 1.6625em;
}
em:nth-child(4) {
    color: #00a9e0;
    font-size: 1.6625em;
}
em:nth-child(6) {
    color: #fab81c;
    font-size: 1.6625em;
}
p{
    color: black;
    font-size: 1.3em; 
}

.p strong{
    font-family: Comic Sans MS;
    color: black;
    font-size: 1.6em;
}

</style>
<main class="main">

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Shop FRIENDS Official Goods</h1>
        <br>
        <p class="p strong">
            <strong>OH</strong><em>.</em> 
            <strong>MY</strong><em>.</em> 
            <strong>GAWD</strong><em>.</em><strong> </strong>
            | Welcome to 
            <em>The FRIENDS™ Experience</em> 
            <em>Store!</em> <br><br>
            Throw your Hugsy in a Crap Bag and let's roll.</p>

        <p>
          <?php 
          if(isset($_SESSION["isAdmin"])){
            if($_SESSION["isAdmin"] == 1)
            {
              echo '<a href="addproduct.php" class="btn btn-primary my-2">Add A New Product</a>';
            }
          }
          ?>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php $product = new Product; $products = $product->getAllProducts();?>
        <?php foreach($products as $product): ?>
        <div class="col">
          <div class="card shadow-sm">
            <img src="<?php echo $product->productImg; ?>" style="width:100%; height:225px;margin: 5% auto 5% auto;" /> 

            <div class="card-body">
            <p style="font-weight:bold; font-size: 1.3em;font-family: Comic Sans MS;"> <em> <?php echo $product->productName; ?> </em> </p>
            <p class="card-text"><?php echo $product->productPrice; ?></p>  
            <p class="card-text"><?php echo $product->productDesc; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <?php
                    if(isset($_SESSION["isAdmin"]))
                    {
                      $isAdmin = $_SESSION["isAdmin"];
                      if($isAdmin == 0)
                      {
                        echo '<button type="button" class="btn btn-sm btn-outline-secondary">View</button>';
                      }
                      else
                      {
                        echo '<a href="editproduct.php?prod_id='.$product->productNo.'" name="prod_id" class="btn btn-sm btn-outline-secondary">Edit</a>';
                    
                        echo '<a href="deleteproduct.php?prod_id='.$product->productNo.'" class="btn btn-sm btn-outline-secondary"
                              onClick="return confirm(\'Are you sure you want to delete this post?\');">
                              Remove</a>';
                      }
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</main>

<?php include 'inc/footer.php'; ?>
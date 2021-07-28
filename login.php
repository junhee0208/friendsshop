<?php include 'inc/header.php'; ?>


<style>

      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: 10% auto 10% auto;
      }

      .form-signin .form-floating:focus-within {
        z-index: 2;
      }
      .form-signin input[type="text"] {
        margin-bottom: 20px;
      
      }

      .form-signin input[type="password"] {
        margin-bottom: 10px;
     
      }



    </style>

<main class="form-signin">

  <form action="inc/login.inc.php" method="post">
  <br><br>
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="userId" placeholder="User ID">
    </div>

    
    <div class="form-floating">
    <input type="password" class="form-control" id="floatingPassword" name="pwd" placeholder="Password">
    </div>
    <br>
  
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
    </form>
    </main>


    <?php
    if(isset($_GET["error"])){
        if($_GET["error"]=="emptyinput"){
          echo "<p>Fill in all fields! </p>";
        }
        else if($_GET["error"]=="wrongId"){
          echo "<p>Incorrect login information! </p>";
        }
        else if($_GET["error"]=="wrongPassword"){
          echo "<p>Incorrect login information! </p>";
        }
        else if($_GET["error"]=="none"){
          echo "<p>You have signed up! </p>";
        }
      }
    ?>
  

<br><br>

<?php include 'inc/footer.php'; ?>

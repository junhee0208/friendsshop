<?php include 'inc/header.php'; ?>

<style>
 .form-signup {
        width: 100%;
        max-width: 600px;
        padding: 15px;
        margin: 5% auto 5% auto;
      }

      .form-control{
        margin-bottom: 5px;
      }
</style>

<main class="form-signup">

  <form action="inc/signup.inc.php" method="post">
  <br><br>
    <h1 class="h3 mb-3 fw-normal">Sign Up</h1>

    <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="userid" class="form-label">User ID</label>
              <div class="input-group has-validation" style="margin-bottom:5px;">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="userId" name="userId" placeholder="User ID" required>
              <div class="invalid-feedback">
                  Your user ID is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="password" class="form-label">Password</label>
              <div class="input-group has-validation" style="margin-bottom:5px;">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
              <div class="invalid-feedback">
                  Your Password is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="password" class="form-label">Confirm Password</label>
              <div class="input-group has-validation" style="margin-bottom:5px;">
                <input type="password" class="form-control" id="pwdRepeat"  name="pwdRepeat" placeholder="Repeat Password" required>
              <div class="invalid-feedback">
                  Please repeat your password.
                </div>
              </div>
            </div>
          </div>

          <br><br>
  
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign Up</button>
  </form>
</main>

<?php
		if(isset($_GET["error"])){
			if($_GET["error"]=="emptyinput"){
				echo "<p>Fill in all fields! </p>";
			}
			else if($_GET["error"]=="invaliduid"){
				echo "<p>Choose proper username! </p>";
			}
			else if($_GET["error"]=="emptyinput"){
				echo "<p>Choose proper email!</p>";
			}
			else if($_GET["error"]=="invalidemail"){
				echo "<p>Password doesn't match! </p>";
			}
			else if($_GET["error"]=="passwordnotmatch"){
				echo "<p>Password doesn't match! </p>";
			}
			else if($_GET["error"]=="usernametaken"){
				echo "<p>User name already taken </p>";
			}
			else if($_GET["error"]=="stmtfailed"){
				echo "<p>Something went wrong, try again! </p>";
			}

			else if($_GET["error"]=="none"){
				echo "<p>You have signed up! </p>";
			}
		}
	?>
<br><br>




<?php include 'inc/footer.php'; ?>
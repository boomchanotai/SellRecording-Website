<?php
	include_once('include/head.php');
	if ($_POST) {
		if ($_POST['action'] == "login") {

			$username = $_POST['Username'];
			$password = md5($_POST['Password']);

			$user = "SELECT * FROM user WHERE username='" . $username . "'";
			$result = $conn->query($user);

			if ($result->num_rows == 1) {
				
				$data = $result->fetch_assoc();

				if ($password == $data['password']) {
					$_SESSION['userid'] = $data['id'];
					$_SESSION['username'] = $data['username'];
					$_SESSION['realname'] = $data['realname'];
					$_SESSION['lastname'] = $data['lastname'];
					$_SESSION['role'] = $data['role'];
					$_SESSION['shopping_cart'] = array();
					$_SESSION['calresult'] = null;
					$_SESSION['receivemoney'] = null;

					header("location: product.php");
				} else {
					echo "<script language=\"JavaScript\">alert('Username or Password is wrong!')</script>";
				}


			} else {
				echo "<script language=\"JavaScript\">alert('Username or Password is wrong!')</script>";
			}
		}
	}
	
?>
	<form class="form-signin text-center py-5 container" method="post">
	<div align="center">
	</div>
	  <h1 class="h3 mb-3 font-weight-normal">Login</h1>

	  <input type="hidden" name="action" value="login">

	  <label for="inputUsername" class="sr-only">Username</label>
	  <input name="Username" type="text" id="Username" class="form-control" placeholder="Username" required="" autofocus="">
	  <br>
	  <label for="inputPassword" class="sr-only">Password</label>
	  <input name="Password" type="password" id="Password" class="form-control" placeholder="Password" required="">
	  <br>
	  <div class="checkbox mb-3">
	    <label>
	      <input type="checkbox" value="remember-me"> Remember me
	    </label>
	  </div>

	  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>
<?php
	include_once('include/footer.php');
?>
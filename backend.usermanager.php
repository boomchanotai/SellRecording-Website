<?php
include_once('include/head.php');
if (isset($_POST['back'])) {
	header("location: backend.php");
	exit();
}

if (isset($_POST['addnewaccount'])) {
	$createusername = $_POST['caccountusername'];
	$createpassword = md5($_POST['caccountpass']);
	$createfullname = $_POST['caccountfullname'];
	$createlastname = $_POST['caccountlastname'];
	$createemail = $_POST['caccountemail'];
	$createrole = $_POST['caccountrole'];

	$check = "SELECT * FROM user WHERE username='" . $createusername . "'";
	$check = $conn->query($check);

	if ($check->num_rows > 0) {
		echo "<script language=\"JavaScript\">";
		echo "alert('มีชื่อผู้ใช้นี้อยู่แล้ว !')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();
	} else {

	if ($createusername == null or $createusername == "") {
		echo "<script language=\"JavaScript\">";
		echo "alert('เติมข้อมูลไม่ครบ!')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();
	}
	if ($createpassword == null or $createpassword == "") {
		echo "<script language=\"JavaScript\">";
		echo "alert('เติมข้อมูลไม่ครบ!')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();
	}
	if ($createfullname == null or $createfullname == "") {
		echo "<script language=\"JavaScript\">";
		echo "alert('เติมข้อมูลไม่ครบ!')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();
	}
	if ($createlastname == null or $createlastname == "") {
		echo "<script language=\"JavaScript\">";
		echo "alert('เติมข้อมูลไม่ครบ!')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();
	}
	if ($createemail == null or $createemail == "") {
		echo "<script language=\"JavaScript\">";
		echo "alert('เติมข้อมูลไม่ครบ!')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();
	}
	if ($createrole == null or $createrole == "") {
		echo "<script language=\"JavaScript\">";
		echo "alert('เติมข้อมูลไม่ครบ!')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();
	}

	$sql = "INSERT INTO user (username,password,realname,lastname,email,role) VALUES ('$createusername','$createpassword','$createfullname','$createlastname','$createemail','$createrole')";
	$conn->query($sql);
		echo "<script language=\"JavaScript\">";
		echo "alert('Create Account Successful!')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();
	}
}

if (isset($_POST['changepassforthisaccount'])) {
	$newpassword = md5($_POST['passnew']);
	if ($newpassword == null or $newpassword == "") {
		echo "<script language=\"JavaScript\">";
		echo "alert('เติมข้อมูลไม่ครบ!')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();
	}
	$sql = "UPDATE user SET password='" . $newpassword . "' WHERE username='" . $_SESSION['username'] . "'";
	$conn->query($sql);

		echo "<script language=\"JavaScript\">";
		echo "alert('อัพเดตข้อมูลสำเร็จ !')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; logout.php" >';
		exit();
}

if (isset($_POST['close'])) {
	switch ($_POST['close']) {
		case 'newpass':
			unset($_POST['newpass']);
			break;
		case 'edituser':
			unset($_POST['edituser']);
			break;
		case 'passnew':
			unset($_POST['changepassforthisaccount']);
			break;
		default:
			break;
	}
}

if (isset($_POST['newpass'])) {
	$userid = $_POST['userid'];
	$newpassword = md5($_POST['newpass']);
	if ($newpassword == null or $newpassword == "") {
		echo "<script language=\"JavaScript\">";
		echo "alert('เติมข้อมูลไม่ครบ!')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();
	}
	$sql = "UPDATE user SET password='" . $newpassword . "' WHERE id='" . $userid . "'";
	$conn->query($sql);

		echo "<script language=\"JavaScript\">";
		echo "alert('อัพเดตข้อมูลสำเร็จ !')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();
}

if (isset($_POST['edituser'])) {
	$userid = $_POST['userid'];
	$newrealname = $_POST['fullname'];
	$newlastname = $_POST['lastname'];
	$newemail = $_POST['email'];
	$newrole = $_POST['role'];

	if ($newrealname == null or $newrealname == "") {
		echo "<script language=\"JavaScript\">";
		echo "alert('เติมข้อมูลไม่ครบ!')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();
	} elseif ($newlastname == null or $newlastname == "") {
		echo "<script language=\"JavaScript\">";
		echo "alert('เติมข้อมูลไม่ครบ!')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();
	} elseif ($newemail == null or $newemail == "") {
		echo "<script language=\"JavaScript\">";
		echo "alert('เติมข้อมูลไม่ครบ!')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();
	} elseif ($newrole == null or $newrole == "") {
		echo "<script language=\"JavaScript\">";
		echo "alert('เติมข้อมูลไม่ครบ!')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();
	}

	$sql = "UPDATE user SET realname='" . $newrealname . "', lastname='" . $newlastname . "', email='" . $newemail . "', role='" . $newrole . "' WHERE id='" . $userid . "'";
	$conn->query($sql);

	if ($_SESSION['userid'] == $userid) {
		echo "<script language=\"JavaScript\">";
		echo "alert('อัพเดตข้อมูลสำเร็จ !')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; logout.php" >';
		exit();
	} else {

		echo "<script language=\"JavaScript\">";
		echo "alert('อัพเดตข้อมูลสำเร็จ !')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.usermanager.php" >';
		exit();

	}
}

if (isset($_SESSION['username'])) { ?>
	
	<div style="background-color: white; margin: 5%; padding: 30px; border-radius: 20px; font-family: 'Cloud-Bold'; font-size: 1.5rem;">
	<div class="row container">
		<h4>User Manager&nbsp;</h4>
		<form method="post">
			<button name="back" value="back" class="btn btn-sm btn-warning" style="color: white;">back</button>
		</form>
	</div>
		<div>
			<button class="btn btn-sm btn-success" data-toggle="collapse" data-target="#addnewaccount">Create New Account</button>
			<button class="btn btn-sm btn-danger" data-toggle="collapse" data-target="#changepassforthisaccountbtn">Changepassword for this account</button>
			<div class="collapse" id="changepassforthisaccountbtn">
			<br><form method="post" class="form-inline">
				<input type="hidden" name="changepassforthisaccount" value="dasd" class="form-control">
				<div class="form-group">
					<label for="changepassforthisaccount">New Password : &nbsp;</label>
					<input type="password" name="passnew" id="changepassforthisaccount" class="form-control">
				</div>
				&nbsp;
				<button class="btn btn-success btn-sm">Change Password</button>
			</form>
			</div>
			<div class="collapse" id="addnewaccount">
				<br><form method="post">
					<input type="hidden" name="addnewaccount">
					<div class="form-group form-inline">
						<label>Username : &nbsp;</label>
						<input type="text" name="caccountusername" class="form-control">
					</div>
					<div class="form-group form-inline">
						<label>Password : &nbsp;</label>
						<input type="password" name="caccountpass" class="form-control">
					</div>
					<div class="form-group form-inline">
						<label>Full Name : &nbsp;</label>
						<input type="text" name="caccountfullname" class="form-control">
					</div>
					<div class="form-group form-inline">
						<label>Last Name : &nbsp;</label>
						<input type="text" name="caccountlastname" class="form-control">
					</div>
					<div class="form-group form-inline">
						<label>Email : &nbsp;</label>
						<input type="text" name="caccountemail" class="form-control" size="25">
					</div>
					<div class="form-group form-inline">
						<label>Role : &nbsp;</label>
						<select name="caccountrole" class="form-control">
							<option value="Admin" class="form-control">Admin</option>
							<option value="Owner" class="form-control">Owner</option>
						</select>
					</div>
					<button class="btn btn-sm btn-success">Submit</button>
				</form>
			</div>
	</div>
	<div><br>
		<table class="table" style="font-size: 1.2rem; font-family: Cloud-Light;">
			<thead>
				<tr>
					<td>#</td>
					<td>Username</td>
					<td>Full Name</td>
					<td>Last Name</td>
					<td>Email</td>
					<td>Role</td>
					<td>Edit</td>
				</tr>
			</thead>
			<tbody>
			<?php
				$sql = "SELECT * FROM user";
				$sql = $conn->query($sql);
				foreach ($sql as $key => $value) { ?>
				<tr>
					<td><?php echo $key + 1; ?></td>
					<td><?php echo $value['username']; ?></td>
					<td><?php echo $value['realname']; ?></td>
					<td><?php echo $value['lastname']; ?></td>
					<td><?php echo $value['email']; ?></td>
					<td><?php echo $value['role']; ?></td>
					<td class="row">
						<form method="post" action="backend.usermanager.php?key=<?php echo $key + 1; ?>">
							<input type="hidden" name="changepass" value="changepass">
							<button class="btn btn-sm btn-danger">ChangePassword</button>
						</form>&nbsp;
						<form method="post" action="backend.usermanager.php?key=<?php echo $key + 1; ?>">
							<input type="hidden" name="edit" value="edit">
							<button class="btn btn-sm btn-warning" style="color: white;">Edit</button>
						</form>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php
			if (isset($_POST['changepass'])) {
				$edittask = $_GET['key']; 
				$sql = "SELECT * FROM user WHERE id='" . $edittask . "'";
				$sql = $conn->query($sql);
				$userdata = $sql->fetch_assoc(); ?>
				<form method="post">
					<input type="hidden" name="userid" value="<?php echo $edittask; ?>">
					<div class="form-group form-inline">
						<label for="newpass">New Password for <?php echo $userdata['username']; ?> : &nbsp;</label>
						<input type="password" name="newpass" id="newpass" class="form-control">
					</div>
					<button class="btn btn-sm btn-danger">Changepassword</button>
				</form>
				<form>
					<button class="btn btn-sm btn-danger" name="close" value="newpass" style="transform: translate(140px,-31px) ;">Close</button>
				</form>
		<?php	} ?>
		<?php
			if (isset($_POST['edit'])) {
				$edittask = $_GET['key'];
				$sql = "SELECT * FROM user WHERE id='" . $edittask . "'";
				$sql = $conn->query($sql);
				$userdata = $sql->fetch_assoc(); ?>
				<form method="post">
					<input type="hidden" name="userid" value="<?php echo $edittask; ?>">
					<div class="form-group form-inline">
						<label for="fullname">Full Name : &nbsp;</label>
						<input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo $userdata['realname']; ?>">
					</div>
					<div class="form-group form-inline">
						<label for="lastname">Last Name : &nbsp;</label>
						<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $userdata['lastname']; ?>">
					</div>
					<div class="form-group form-inline">
						<label for="email">Email : &nbsp;</label>
						<input size="25" type="text" name="email" id="email" class="form-control" value="<?php echo $userdata['email']; ?>">
					</div>
					<div class="form-group form-inline">
						<label for="role">Role : &nbsp;</label>
						<select name="role" class="form-control">
							<option value="Admin" class="form-control">Admin</option>
							<option value="Owner" class="form-control">Owner</option>
						</select>
					</div>
					<input type="hidden" name="edituser" value="edituser">
					<button class="btn btn-sm btn-success">submit</button>
				</form>
				<form>
					<button class="btn btn-sm btn-danger" name="close" value="edituser" style="transform: translate(70px,-31px);">Close</button>
				</form>
		<?php	}
		?>
	</div>
</div>

<?php } else {
	header("location: index.php");
}
?>
<?php
include_once('include/footer.php');
?>
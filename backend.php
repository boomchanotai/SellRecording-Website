<?php
	include_once('include/head.php');
		$strDate = date("Y-m-d");

	if (isset($_POST['check_date'])) {
		if ($_POST['check_date'] == null or $_POST['check_date'] == "") {
				header("location: backend.php");
				exit();
				}
	}
	if (isset($_POST['checkonmonth'])) {
		if ($_POST['check_month'] == null or $_POST['check_month'] == "") {
				header("location: backend.php");
				exit();
				}
	}
	if (isset($_POST['checkonyear'] )) {
		if ($_POST['check_year'] == null or $_POST['check_year'] == "") {
				header("location: backend.php");
				exit();
			}
	}
	if (isset($_POST['back'])) {
		header("location: product.php");
		exit();
	}
	if (isset($_POST['usermanager'])) {
		header("location: backend.usermanager.php");
	}

	if (isset($_POST['productmanager'])) {
		header("location: backend.productmanager.php");
	}

	if (isset($_POST['close'])) {
		switch ($_POST['close']) {
			case 'checkondate':
				unset($_POST['checkondate']);
				break;
			case 'checkonmonth':
				unset($_POST['checkonmonth']);
				break;
			case 'checkonyear':
				unset($_POST['checkonyear']);
				break;
			default:
				break;
		}
	}
	if (isset($_SESSION['username'])) { ?>
<div style="background-color: white; margin: 5%; padding: 30px; border-radius: 20px; font-family: 'Cloud-Bold'; font-size: 1.5rem;">
	<div class="row container">
		<h4>Welcome, <?php echo $_SESSION['realname'] . " " . $_SESSION['lastname']; ?>&nbsp;</h4>
		<form method="post">
			<button name="back" value="back" class="btn btn-sm btn-warning" style="color: white;">back</button>
		</form>
	</div>
	<div>เลขที่บิลล่าสุด : 
		<?php
			$sql = "SELECT id FROM billrecords WHERE  id=(SELECT max(id) FROM billrecords)";
			$sql = $conn->query($sql);
			$sql = $sql->fetch_assoc();
			echo $sql['id'];
		?>
	</div>
	<button class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#balance" type="button">ยอดขายวันนี้</button><br>
	<div class="collapse" id="balance">
		<?php 	
				$strSplit = explode("-", $strDate);
				$year = $strSplit[0];
				$month = $strSplit[1];
				$day = $strSplit[2];
				$sql = "SELECT totalprice FROM billrecords WHERE YEAR(date)='" . $year . "' AND MONTH(date)='" . $month . "' AND DAY(date)='" . $day . "'";
				$sql = $conn->query($sql);
				$data = $sql->fetch_all();
				$data = array_column($data, 0);
				$bal = array_sum($data);
		?>
			<div class="py-2">ยอดขายวันนี้ : <?php echo $bal; ?> บาท</div>
			<table class="table" style="font-size: 1.2rem; font-family: Cloud-Light;">
				<thead>
					<tr>
						<td>#</td>
						<td>ชื่อสินค้า</td>
						<td>ยอดขาย</td>
					</tr>
				</thead>
				<tbody>
			<?php 
				$sql = "SELECT * FROM product";
				$sql = $conn->query($sql);
				foreach ($sql as $key => $value) { ?>
					<tr>
						<td><?php echo $key; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td>
							<?php
								$saledata = "SELECT amount FROM sellrecords WHERE productid='" . $value['id'] . "' AND YEAR(date)='" . $year . "' AND MONTH(date)='" . $month . "' AND DAY(date)='" . $day . "'";
								$saledata = $conn->query($saledata);
								$saledata = $saledata->fetch_all();
								$saledata = array_column($saledata, 0);
								$saledata = array_sum($saledata);
								echo $saledata;
							?>
						</td>
					</tr>
			<?php }
			?>
				</tbody>
			</table>
			<?php
				$strSplit = explode("-", $strDate);
				$year = $strSplit[0];
				$month = $strSplit[1];
				$day = $strSplit[2];
				$sql = "SELECT * FROM sellrecords WHERE note <> '' AND YEAR(date)='" . $year . "' AND MONTH(date)='" . $month . "' AND DAY(date)='" . $day . "'";
				$sql = $conn->query($sql);
				$sql = $sql->fetch_all();
				if ($sql != "" or $sql != null) {
					foreach ($sql as $key => $value) { ?>
						<table class="table" style="font-size: 1.2rem; font-family: Cloud-Light;">
						<thead>
							<tr>
								<td>#</td>
								<td>รายการงานสั่ง</td>
								<td>ราคา</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $key + 1; ?></td>
								<td><?php echo $value[6]; ?></td>
								<td><?php echo $value[5]; ?></td>
							</tr>
						</tbody>
					</table>
			<?php	}
				} else { 
					
				}
			?>
	</div>
	<div class="row container">
	<form class="form-inline" method="post">
		<button class="btn btn-sm btn-primary" type="submit">ยอดขายวันที่</button>&nbsp;
		<input type="hidden" name="checkondate">
		<input type="date" name="check_date" class="form-control" class="px-5" placeholder="yyyy-mm-dd">
		&nbsp;เช่น 2019-12-21, 2020-01-13&nbsp;
	</form>
	<form>
		<button class="btn btn-sm btn-danger" name="close" value="checkondate">Close</button>
	</form>
	</div>
	<?php
		if (isset($_POST['checkondate'])) { 

				$strDate = $_POST['check_date'];
				$strSplit = explode("-", $strDate);
				$year = $strSplit[0];
				$month = $strSplit[1];
				$day = $strSplit[2];
				$sql = "SELECT totalprice FROM billrecords WHERE YEAR(date)='" . $year . "' AND MONTH(date)='" . $month . "' AND DAY(date)='" . $day . "'";
				$sql = $conn->query($sql);
				$data = $sql->fetch_all();
				$data = array_column($data, 0);
				$bal = array_sum($data);
		?>
			<div class="py-2">ยอดขายวันที่ <?php echo $strDate; ?> : <?php echo $bal; ?> บาท</div>
			<table class="table" style="font-size: 1.2rem; font-family: Cloud-Light;">
				<thead>
					<tr>
						<td>#</td>
						<td>ชื่อสินค้า</td>
						<td>ยอดขาย</td>
					</tr>
				</thead>
				<tbody>
			<?php
				$sql = "SELECT * FROM product";
				$sql = $conn->query($sql);
				foreach ($sql as $key => $value) { ?>
					<tr>
						<td><?php echo $key; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td>
							<?php
								$saledata = "SELECT amount FROM sellrecords WHERE productid='" . $value['id'] . "' AND YEAR(date)='" . $year . "' AND MONTH(date)='" . $month . "' AND DAY(date)='" . $day . "'";
								$saledata = $conn->query($saledata);
								$saledata = $saledata->fetch_all();
								$saledata = array_column($saledata, 0);
								$saledata = array_sum($saledata);
								echo $saledata;
							?>
						</td>
					</tr>
			<?php }
			?>
				</tbody>
			</table>
			<?php
				$strSplit = explode("-", $strDate);
				$year = $strSplit[0];
				$month = $strSplit[1];
				$day = $strSplit[2];
				$sql = "SELECT * FROM sellrecords WHERE note <> '' AND YEAR(date)='" . $year . "' AND MONTH(date)='" . $month . "' AND DAY(date)='" . $day . "'";
				$sql = $conn->query($sql);
				$sql = $sql->fetch_all();
				if ($sql != "" or $sql != null) {
					foreach ($sql as $key => $value) { ?>
						<table class="table" style="font-size: 1.2rem; font-family: Cloud-Light;">
						<thead>
							<tr>
								<td>#</td>
								<td>รายการงานสั่ง</td>
								<td>ราคา</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $key + 1; ?></td>
								<td><?php echo $value[6]; ?></td>
								<td><?php echo $value[5]; ?></td>
							</tr>
						</tbody>
					</table>
			<?php	}
				} else { 
					
				}
			?>	
		<?php } ?>
	<div class="row container">
	<form class="form-inline" method="post">
		<button class="btn btn-sm btn-primary" type="submit">ยอดรายเดือน</button>&nbsp;
		<input type="hidden" name="checkonmonth">
		<input type="text" name="check_month" class="form-control" class="px-5" placeholder="yyyy-mm">
		&nbsp;เช่น 2019-12, 2020-01&nbsp;
	</form>
	<form>
		<button class="btn btn-sm btn-danger" name="close" value="checkonmonth">Close</button>
	</form>
	</div>
	<?php
		if (isset($_POST['checkonmonth'])) {

				$strDate = $_POST['check_month'];
				$strSplit = explode("-", $strDate);
				$year = $strSplit[0];
				$month = $strSplit[1];
				$sql = "SELECT totalprice FROM billrecords WHERE MONTH(date)='" . $month . "' AND YEAR(date)='" . $year . "'";
				$sql = $conn->query($sql);
				$data = $sql->fetch_all();
				$data = array_column($data, 0);
				$bal = array_sum($data);
		?>
			<div class="py-2">ยอดขายเดือน <?php echo $strDate; ?> : <?php echo $bal; ?> บาท</div>
			<table class="table" style="font-size: 1.2rem; font-family: Cloud-Light;">
				<thead>
					<tr>
						<td>#</td>
						<td>Product Name</td>
						<td>Today's Saled</td>
					</tr>
				</thead>
				<tbody>
			<?php
				$sql = "SELECT * FROM product";
				$sql = $conn->query($sql);
				foreach ($sql as $key => $value) { ?>
					<tr>
						<td><?php echo $key + 1; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td>
							<?php
								$saledata = "SELECT amount FROM sellrecords WHERE productid='" . $value['id'] . "' AND MONTH(date)='" . $month . "' AND YEAR(date)='" . $year . "'";
								$saledata = $conn->query($saledata);
								$saledata = $saledata->fetch_all();
								$saledata = array_column($saledata, 0);
								$saledata = array_sum($saledata);
								echo $saledata;
							?>
						</td>
					</tr>
			<?php }
			?>
				</tbody>
			</table>
			<?php
				$strSplit = explode("-", $strDate);
				$year = $strSplit[0];
				$month = $strSplit[1];
				$sql = "SELECT * FROM sellrecords WHERE note <> '' AND YEAR(date)='" . $year . "' AND MONTH(date)='" . $month . "'";
				$sql = $conn->query($sql);
				$sql = $sql->fetch_all();
				if ($sql != "" or $sql != null) {
					foreach ($sql as $key => $value) { ?>
						<table class="table" style="font-size: 1.2rem; font-family: Cloud-Light;">
						<thead>
							<tr>
								<td>#</td>
								<td>รายการงานสั่ง</td>
								<td>ราคา</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $key + 1; ?></td>
								<td><?php echo $value[6]; ?></td>
								<td><?php echo $value[5]; ?></td>
							</tr>
						</tbody>
					</table>
			<?php	}
				} else { 
					
				}
			?>
		<?php } ?>
	<div class="row container">
	<form class="form-inline" method="post">
		<button class="btn btn-sm btn-primary" type="submit">ยอดรายปี</button>&nbsp;
		<input type="hidden" name="checkonyear">
		<input type="number" name="check_year" class="form-control" class="px-5" placeholder="yyyy">
		&nbsp;เช่น 2019, 2020&nbsp;
	</form>
	<form>
		<button class="btn btn-sm btn-danger" name="close" value="checkonyear">Close</button>
	</form>
	</div>
	<?php
		if (isset($_POST['checkonyear'])) {

				$strDate = $_POST['check_year'];
				$sql = "SELECT totalprice FROM billrecords WHERE YEAR(date)='" . $strDate . "'";
				$sql = $conn->query($sql);
				$data = $sql->fetch_all();
				$data = array_column($data, 0);
				$bal = array_sum($data);
		?>
			<div class="py-2">ยอดขายปี <?php echo $strDate; ?> : <?php echo $bal; ?> บาท</div>
			<table class="table" style="font-size: 1.2rem; font-family: Cloud-Light;">
				<thead>
					<tr>
						<td>#</td>
						<td>ชื่อสินค้า</td>
						<td>ยอดขาย</td>
					</tr>
				</thead>
				<tbody>
			<?php
				$sql = "SELECT * FROM product";
				$sql = $conn->query($sql);
				foreach ($sql as $key => $value) { ?>
					<tr>
						<td><?php echo $key; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td>
							<?php
								$saledata = "SELECT amount FROM sellrecords WHERE productid='" . $value['id'] . "' AND YEAR(date)='" . $strDate . "'";
								$saledata = $conn->query($saledata);
								$saledata = $saledata->fetch_all();
								$saledata = array_column($saledata, 0);
								$saledata = array_sum($saledata);
								echo $saledata;
							?>
						</td>
					</tr>
			<?php }
			?>
				</tbody>
			</table>
			<?php
				$strSplit = explode("-", $strDate);
				$year = $strSplit[0];
				$sql = "SELECT * FROM sellrecords WHERE note <> '' AND YEAR(date)='" . $year . "'";
				$sql = $conn->query($sql);
				$sql = $sql->fetch_all();
				if ($sql != "" or $sql != null) {
					foreach ($sql as $key => $value) { ?>
						<table class="table" style="font-size: 1.2rem; font-family: Cloud-Light;">
						<thead>
							<tr>
								<td>#</td>
								<td>รายการงานสั่ง</td>
								<td>ราคา</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $key + 1; ?></td>
								<td><?php echo $value[6]; ?></td>
								<td><?php echo $value[5]; ?></td>
							</tr>
						</tbody>
					</table>
			<?php	}
				} else { 
					
				}
			?>
		<?php } ?>
		<br>
		<div class="row container">
		<form class="form-inline" method="post">
			<input type="hidden" name="usermanager" value="usermanager">
			<button class="btn btn-sm btn-success" type="submit">User Manager</button>
		</form>&nbsp;
		<form class="form-inline" method="post">
			<input type="hidden" name="productmanager" value="productmanager">
			<button class="btn btn-sm btn-success" type="submit">Product Manager</button>
		</form>
		</div>


</div>
	<?php } else { 
		header("location: index.php");
	}?>
<?php
	include_once('include/footer.php');
?>
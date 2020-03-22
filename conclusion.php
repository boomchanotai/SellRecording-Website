<?php
	include_once('include/head.php');

	if (isset($_POST['calculator'])) {
		$_SESSION['receivemoney'] = $_POST['receivemoney'];
		$_SESSION['calresult'] = $_SESSION['receivemoney'] - $_SESSION['totalprice'];
	}

	if ($_SESSION['shopping_cart'] == null) { 
		header("location: product.php");
	} else { ?>
			<div style="background-color: white; margin: 5%; padding: 30px; border-radius: 20px; font-family: 'Cloud-Bold'; font-size: 1.5rem;">
				<div>
					<?php
					date_default_timezone_set("Asia/Bangkok");
					$strTime = date("h:i:sa");
					$strDate = date("Y-m-d");
					echo "วันที่ : ". $strDate . " เวลา : " . $strTime;
					?>
				</div>
				<table class="table">
					<thead>
						<tr>
							<td>#</td>
							<td>Name</td>
							<td>Amount</td>
							<td>Total Price</td>
						</tr>
					</thead>
					<tbody>
				<?php $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
				foreach ($_SESSION['shopping_cart'] as $key => $value) { ?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td><?php echo $value['name']; ?></td>
							<td><?php echo $value['amount']; ?></td>
							<td><?php echo $value['totalprice']; ?></td>
						</tr>
				<?php } ?>
					</tbody>
				</table>
				<div class="d-inline-flex justify-content-end">
					<div class="d-inline-flex">
					<form action="sys/system2.php" method="post">
						<button class="btn btn-success" type="submit" name="finished" value="finished" style="color: white;">Check Bill</button>
					</form>&nbsp;
					<form action="sys/system2.php" method="post" style="transform: translateX(600px);">
						<button class="btn btn-warning" type="submit" name="back" value="back" style="color: white;">Back</button>
					</form>&nbsp;
					</div>
						<p>ราคาเต็ม : <?php echo $_SESSION['realprice']; ?>&nbsp;&nbsp;</p>
						<p>Total Price : <?php echo $_SESSION['totalprice']; ?></p>
				</div>
			</div>
			<div style="background-color: white; margin: 5%; padding: 30px; border-radius: 20px; font-family: 'Cloud-Bold'; font-size: 1.5rem;">
				Calculator เครื่องคิดเลข
				<form class="form-inline" method="post">
					<input type="hidden" name="calculator">
					<div class="form-inline">
						<label>จำนวนเงินที่รับ : &nbsp;</label>
						<input type="number" name="receivemoney" class="form-control">&nbsp;
					</div>
					<button class="btn btn-success">Calculate</button>
				</form>
				<?php
				if (isset($_POST['calculator'])) {
					echo "เงินที่ได้รับ : " . $_SESSION['receivemoney'] . " บาท<br>";
					echo "เงินทอน : " . $_SESSION['calresult'] . " บาท";
				}
				?>
			</div>
			<div style="background-color: white; margin: 5%; padding: 30px; border-radius: 20px; font-family: 'Cloud-Bold'; font-size: 1.5rem;">
				Discount ส่วนลด
				<div class="row">
					<div class="col-6">
						<form class="form-inline" method="post" action="sys/system.php" class="col-6">
							<label for="discount1">ลดราคาเหลือ : &nbsp;</label>
							<input type="number" name="discount1" value="discount1" placeholder="ลดราคาเหลือ" class="form-control">
							&nbsp;บาท&nbsp;
							<button class="btn btn-warning" style="color: white;">Discount</button>
						</form><br>
						<form class="form-inline" method="post" action="sys/system.php" class="col-6">
							<label for="discount1">ลดไป &nbsp;</label>
							<input type="number" name="discount2" value="discount2" placeholder="ลดไปกี่บาท" class="form-control">
							&nbsp;บาท&nbsp;
							<button class="btn btn-warning" style="color: white;">Discount</button>
						</form><br>
						<form class="form-inline" method="post" action="sys/system.php">
							<label for="discount1">ลด : &nbsp;</label>
							<input type="number" name="discount3" value="discount3" placeholder="ลดกี่ %" class="form-control">
							&nbsp;%&nbsp;
							<button class="btn btn-warning" style="color: white;">Discount</button>
						</form>
					</div>
					<div class="col-6 row">
						<?php
							$sql = "SELECT * FROM product";
							$sql = $conn->query($sql);
							$sql = $sql->fetch_all();
							foreach ($sql as $key => $value) { 
								if ($value[3] != null or $value[3] != "") { ?>
								<form method="post" action="sys/system.php">
									<input type="hidden" name="sprice">
									<input type="hidden" name="sprice_key" value="<?php echo $key; ?>">
									<input type="hidden" name="sprice_pro" value="<?php echo $value[3]; ?>">
									<input type="hidden" name="sprice_price" value="<?php echo $value[2]; ?>">
									<button class="btn btn-warning" style="color: white;">ราคาโปรโมชั่น <?php echo $value[1]; ?></button>
								</form>&nbsp;
						<?php	}
							}
						?>
					</div>
				</div>
				<br>
	
			</div>
<?php
}
	include_once('include/footer.php');
?>
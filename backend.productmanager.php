<?php
include_once('include/head.php');
if (isset($_POST['back'])) {
	header("location: backend.php");
	exit();

if (isset($_POST['close'])) {
	switch ($_POST['close']) {
		case 'productid':
			unset($_POST['productid']);
			break;
		default:
			break;
	}
}
}

if (isset($_POST['productname'])) {
	$productid = $_POST['productid'];
	$newproductname = $_POST['productname'];
	$newproductprice = $_POST['productprice'];
	$newproductsprice = $_POST['productsprice'];
	
	$sql = "UPDATE product SET name='" . $newproductname . "', price='" . $newproductprice . "', sprice='" . $newproductsprice . "' WHERE id='" . $productid . "'";
	$conn->query($sql);

	echo "<script language=\"JavaScript\">";
	echo "alert('อัพเดตข้อมูลสำเร็จ !')";
	echo "</script>";
	echo '<meta http-equiv="refresh" content="0; backend.productmanager.php" >';
	exit();

}

if (isset($_POST['addproductname'])) {

	$addnewproductname = $_POST['addproductname'];
	$addnewproductprice = $_POST['addproductprice'];
	$addnewproductsprice = $_POST['addproductsprice'];

	if ($_POST['addproductname'] == null or $_POST['addproductname'] = "") {
		echo "<script language=\"JavaScript\">";
		echo "alert('เติมข้อมูลไม่ครบ!')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.productmanager.php" >';
		exit();
	}
	if ($_POST['addproductprice'] == null or $_POST['addproductprice'] == "") {
		echo "<script language=\"JavaScript\">";
		echo "alert('เติมข้อมูลไม่ครบ!')";
		echo "</script>";
		echo '<meta http-equiv="refresh" content="0; backend.productmanager.php" >';
		exit();
	}

	$insert = "INSERT INTO product (name,price,sprice) VALUES ('$addnewproductname','$addnewproductprice','$addnewproductsprice')";
	$conn->query($insert);

	echo "<script language=\"JavaScript\">";
	echo "alert('เพิ่มสินค้าสำเร็จ !')";
	echo "</script>";
	echo '<meta http-equiv="refresh" content="0; backend.productmanager.php" >';
	exit();
}

if (isset($_SESSION['username'])) { ?>
	<div style="background-color: white; margin: 5%; padding: 30px; border-radius: 20px; font-family: 'Cloud-Bold'; font-size: 1.5rem;">
	<div class="row container">
		<h4>Product Manager&nbsp;</h4>
		<form method="post">
			<button name="back" value="back" class="btn btn-sm btn-warning" style="color: white;">back</button>
		</form>
	</div>
	<button class="btn btn-sm btn-success" data-toggle="collapse" data-target="#AddNewProduct">Add New Product</button>
	<div class="collapse" id="AddNewProduct"><br>
		<div>Adding New Product..</div>
		<form method="post">
			<div class="form-group form-inline">
				<label for="addproductname">Name : &nbsp;</label>
				<input class="form-control" id="addproductname" type="text" name="addproductname">
			</div>
			<div class="form-group form-inline">
				<label for="addproductprice">Price : &nbsp;</label>
				<input class="form-control" id="addproductprice" type="number" name="addproductprice">
			</div>
			<div class="form-group form-inline">
				<label for="addproductsprice">Specical Price : &nbsp;</label>
				<input class="form-control" id="addproductsprice" type="text" name="addproductsprice" placeholder="__-___">
				<label>&nbsp; เช่น 3 ชิ้น 100 บาท : 3-100, 4 ชิ้น 500 บาท : 4-500, ถ้าไม่มีให้เว้นว่าง</label>
			</div>
			<button class="btn btn-sm btn-success">Submit</button>
		</form>
	</div>
	<div>
		<?php 
			if (isset($_POST['productid'])) { 
				$productid = $_POST['productid'];
				$sql = "SELECT * FROM product WHERE id='" . $productid . "'";
				$sql = $conn->query($sql);
				$data = $sql->fetch_assoc();

				?>
				<br><form method="post">
					<input type="hidden" name="productid" value="<?php echo $productid; ?>">
					<div class="form-group form-inline">
						<label>Product Name : &nbsp;</label>
						<input class="form-control" type="text" id="productname" name="productname" value="<?php echo $data['name']; ?>">
					</div>
					<div class="form-group form-inline">
						<label>Product Price : &nbsp;</label>
						<input class="form-control" type="number" id="productprice" name="productprice" value="<?php echo $data['price']; ?>">
					</div>
					<div class="form-group form-inline">
						<label>Product Special Price : &nbsp;</label>
						<input class="form-control" type="text" id="productsprice" name="productsprice" value="<?php echo $data['sprice']; ?>" placeholder="__-___">
						<label>&nbsp; เช่น 3 ชิ้น 100 บาท : 3-100, 4 ชิ้น 500 บาท : 4-500, ถ้าไม่มีให้เว้นว่าง</label>
					</div>
					<button class="btn btn-sm btn-success" type="submit">submit</button>
				</form>
				<form>
					<button class="btn btn-sm btn-danger" name="close" value="productid" style="transform: translate(70px,-31px) ;">Close</button>
				</form>
		<?php	}
		?>
	</div>
	<div><br>
		<table class="table" style="font-size: 1.2rem; font-family: Cloud-Light;">
			<thead>
				<tr>
					<td>#</td>
					<td>Product Name</td>
					<td>Price</td>
					<td>Specical Price</td>
					<td>Edit</td>
				</tr>
			</thead>
			<tbody>
			<?php
				$sql = "SELECT * FROM product WHERE id > 0";
				$sql = $conn->query($sql);
				foreach ($sql as $key => $value) { ?>

				<tr>
					<td><?php echo $key + 1; ?></td>
					<td><?php echo $value['name']; ?></td>
					<td><?php echo $value['price']; ?></td>
					<td>
						<?php 
							if ($value['sprice'] == "" or $value['sprice'] == null) {
								echo "";
							} else {
								$value['sprice'] = explode("-", $value['sprice']);
								echo $value['sprice'][0] . " ชิ้น " . $value['sprice'][1] . " บาท";
							}
						?>
					</td>
					<td>
						<form method="post">
							<input type="hidden" name="productid" value="<?php echo $key + 1; ?>">
							<button class="btn btn-sm btn-warning" style="color: white;">Edit</button>
						</form>
					</td>
				</tr>

			<?php	} ?>
			</tbody>
		</table>
	</div>
</div>
<?php } else {
	header("location: index.php");
}

include_once('include/footer.php');
?>
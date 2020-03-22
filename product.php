<?php
	include_once('include/head.php');

	if (isset($_POST['alternative-menu'])) {
		$product = array();
		$product['id'] = 0;
		$product['amount'] = 1;
		$product['name'] = $_POST['alternative-order'];
		$product['totalprice'] = $_POST['alternative-price'];
		$product['sprice'] = null;
		$product['note'] = $_POST['alternative-order'];

		$item_stack = array('id' => $product['id'], 'name' => $product['name'],'amount' => $product['amount'],'totalprice' => $product['totalprice'],'sprice' => $product['sprice'],'note' => $product['note']);
		array_push($_SESSION['shopping_cart'], $item_stack);

	} ?>
	<div id="shopping_cart" style="background-color: white; margin: 5%; padding: 30px; border-radius: 20px; font-family: 'Cloud-Bold'; font-size: 1.5rem;">
				<table class="table">
					<thead>
						<tr>
							<td>#</td>
							<td>Name</td>
							<td>Amount</td>
							<td>Total Price</td>
							<td>Delete</td>
						</tr>
					</thead>
					<tbody>
				<?php foreach ($_SESSION['shopping_cart'] as $key => $value) { ?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td><?php echo $value['name']; ?></td>
							<td><?php echo $value['amount']; ?></td>
							<td><?php echo $value['totalprice']; ?></td>
							<td>
								<form action="sys/system.php" method="post">
									<input type="hidden" name="del" value="<?php echo $key; ?>">
									<button class="btn btn-sm btn-danger" type="submit">Del</button>
								</form>
							</td>
						</tr>
				<?php } ?>
					</tbody>
				</table>
				<div class="row mx-3">
					<div class="col-8">
					<form action="sys/system2.php" method="post" class="mx-3">
						<button class="btn btn-success" type="submit" name="total" value="total">Total Balance</button>
					</form>
					</div>
					<div class="col-4">
					<form action="sys/system2.php" method="post" class="mx-3">
						<button class="btn btn-danger" type="submit" name="reset" value="reset">Reset</button>
					</form>
					</div>
				</div>
			</div>
	<?php
	 if (isset($_SESSION['username'])) { ?>
		<div class="container py-3">
			<div class="row">
			<?php
				$db = "SELECT * FROM product WHERE id > 0";
				$result = $conn->query($db);
				foreach ($result as $key => $value) { ?>
					<div class="col-sm-3 py-1">
						<div class="card shadow-sm" style="height: 100%;">
							<div class="card-body" align="center">
								<h5 style="font-family: 'Cloud-Bold'; font-size: 2.5rem;"><?php echo $value['name']; ?></h5>
								<p style="font-family: 'Cloud-Bold'; font-size: 1.5rem;"><?php echo $value['price']; ?>&nbsp;บาท</p>
								<span class="glyphicon glyphicon-circle-info"></span>
								<form>
									<input type="number" name="amount" class="form-control mb-2 mr-sm-2" placeholder="Amount" value="1" id="amount_<?php echo $key + 1; ?>"><br>
									<button class="btn btn-success btn-lg" type="button" id="addtocart_<?php echo $key + 1; ?>">Add to cart</button>
								</form>
							</div>
						</div>
					</div>
			<?php } ?>
			</div>
		</div>
			<div style="background-color: white; margin: 5%; padding: 30px; border-radius: 20px; font-family: 'Cloud-Bold'; font-size: 1.5rem;">
				<h4>งานสั่ง</h4>
				<form method="post">
					<input type="hidden" name="alternative-menu">
					<input type="text" name="alternative-order" class="form-control" placeholder="ชื่อรายการสั่งนอกจากสินค้า"><br>
					<input type="number" name="alternative-price" class="form-control" placeholder="ราคาการสั่งซื้อนอกจากสินค้า"><br>
					<button class="btn btn-success">Add to cart</button>
				</form>
			</div>
			<div style="background-color: white; margin: 5%; padding: 30px; border-radius: 20px; font-family: 'Cloud-Bold'; font-size: 1.5rem;" align="center" class="d-flex justify-content-center">
			<?php if ($_SESSION['role'] == "Owner") { ?>
				<form method="post" action="sys/system.php" class="px-3">
					<input type="hidden" name="backend" value="backend">
					<button class="btn btn-danger">Backend</button>
				</form>
			<?php } ?>
				<form method="post" action="sys/system.php" class="px-3">
					<input type="hidden" name="logout" value="logout">
					<button class="btn btn-secondary">Logout</button>
				</form>
			</div>
			
	<?php } else { 
		header("location: index.php");
	}

	include_once('include/footer.php');
?>
<?php
	include_once('engine.php');

	if ($_POST) {

		if (isset($_POST['del'])) {
			$key = $_POST['del'];
			unset($_SESSION['shopping_cart'][$key]);
			header("location: ../product.php");
			exit();
		} 

		if (isset($_POST['sprice'])) {
		$sprice_key = $_POST['sprice_key'];
		$sprice_pro = $_POST['sprice_pro'];
		$sprice_price = $_POST['sprice_price'];
		$sprice_pro = explode("-", $sprice_pro);
		$checksprice = array_column($_SESSION['shopping_cart'], "sprice");
		$i = 0;
		foreach ($checksprice as $key => $value) {
			if ($checksprice[$key] != "" or $checksprice[$key] != null) {
					if ($_SESSION['shopping_cart'][$key]['id'] == $sprice_key) {
						$i += $_SESSION['shopping_cart'][$key]['amount'];
					}
			} 
		}
		$actualprice = $i * $sprice_price;
		$modresult = $i % $sprice_pro[0];
		$devideresult = (int) ($i / $sprice_pro[0]);
		$specialprice = $devideresult * $sprice_pro[1] + $modresult * $sprice_price;
		$_SESSION['totalprice'] = $_SESSION['totalprice'] - $actualprice + $specialprice;
		header("location: ../conclusion.php");
		exit();
		}

		if (isset($_POST['discount1'])) {
			$_SESSION['type'] = "discount";
			$_SESSION['totalprice'] = $_POST['discount1'];
			header("location: ../conclusion.php");
			exit();
		}

		if (isset($_POST['discount2'])) {
			$_SESSION['type'] = "discount";
			$_SESSION['totalprice'] = $_SESSION['totalprice'] - $_POST['discount2'];
			header("location: ../conclusion.php");
			exit();
		}

		if (isset($_POST['discount3'])) {
			$_SESSION['type'] = "discount";
			$_SESSION['keep1'] = $_SESSION['totalprice'] * ($_POST['discount3']) / 100;
			$_SESSION['totalprice'] = $_SESSION['totalprice'] - $_SESSION['keep1'];
			unset($_SESSION['keep1']);
			header("location: ../conclusion.php");
			exit();
		}

		if (isset($_POST['backend'])) {
			header("location: ../backend.php");
			exit();
		}

		if (isset($_POST['logout'])) {
			header("location: ../logout.php");
			exit();
		} 

	} else {
		header("location: ../index.php");
	}
?>
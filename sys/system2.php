<?php
	include_once('engine.php');

	if ($_POST) {
		date_default_timezone_set("Asia/Bangkok");
		$strDate = date("Y-m-d");
		$strTime = date("h:i:sa");
		$strDT = $strDate . " " . $strTime;

		if (isset($_POST['finished'])) {

				if ($_SESSION['realprice'] == 0) {
					header("location: ../product.php");
					exit();
				}

				$bill = "INSERT INTO billrecords (date, realprice, totalprice, type, user) VALUES ('" . $strDT . "','" . $_SESSION['realprice'] . "','" . $_SESSION['totalprice'] . "','" . $_SESSION['type'] . "','" . $_SESSION['userid'] . "')";
				$conn->query($bill);
				$last_id = $conn->insert_id;

			foreach ($_SESSION['shopping_cart'] as $key => $value) {

				$sql = "INSERT INTO sellrecords (BillNo, date, productid, amount, price, note, user) VALUES ('" . $last_id . "','". $strDT . "','" . $value['id'] . "','" . $value['amount'] . "','" . $value['totalprice'] . "','" . $value['note'] . "','" . $_SESSION['userid'] . "')";
				$conn->query($sql);
			}
			unset($_SESSION['shopping_cart']);
			unset($_SESSION['realprice']);
			unset($_SESSION['type']);
			unset($_SESSION['totalprice']);
			unset($_SESSION['calresult']);
			unset($_SESSION['receivemoney']);
			$_SESSION['shopping_cart'] = array();
			$_SESSION['realprice'] = 0;
			$_SESSION['totalprice'] = 0;
			header("location: ../product.php");

		}

		if (isset($_POST['back'])) {
			header("location: ../product.php");
			exit();
		}
		
		if (isset($_POST['reset'])) {
			$_SESSION['shopping_cart'] = array();
			header("location: ../product.php");
			exit();
		}

		if (isset($_POST['total'])) {
			$_SESSION['type'] = "normal";
			$totalprice = array_column($_SESSION['shopping_cart'], 'totalprice');
			$_SESSION['realprice'] = array_sum($totalprice);
			$_SESSION['totalprice'] = $_SESSION['realprice'];
			header("location: ../conclusion.php");
			exit();
		}





	} else {
		header("location: ../index.php");
	}
?>
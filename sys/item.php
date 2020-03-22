<?php
    include_once('engine.php');
	if (isset($_POST['add_product'])) {
        if (isset($_SESSION['shopping_cart'])) {

            $product = array();
            $product['id'] = $_POST['productid'];
            $product['amount'] = $_POST['amount'];

            $dbdata = "SELECT * FROM product WHERE id='" . $product['id'] . "'";
            $result = $conn->query($dbdata);
            $data = $result->fetch_assoc();

            $product['name'] = $data['name'];
            $product['price'] = $data['price'];
            $product['totalprice'] = $product['price'] * $product['amount'];
            $product['sprice'] = $data['sprice'];
            $product['note'] = null;

            $item_stack = array('id' => $product['id'], 'name' => $product['name'],'amount' => $product['amount'],'totalprice' => $product['totalprice'],'sprice' => $product['sprice'],'note' => $product['note']);
            array_push($_SESSION['shopping_cart'], $item_stack);
            
            echo "success";

        } else {
            header("location: ../index.php");
        }
    } else {
        header("location: ../index.php");
    }
?>
<?php
    session_start();
    require_once("../config/database.php");
    $db = new Database();

    if (!empty($_GET["action"])) {
        
        switch ($_GET["action"]) {
            case "add":
                if (!empty($_POST["product-quantity"])) {

                    $product_ID = $_GET["product_ID"];
                    $product_category = $_GET["product_category"];

                    $product_record = $db->runQuery("SELECT * FROM products WHERE product_ID = $product_ID");
                    $cart_item_array = array(
                        $product_ID=>array(
                            'product_ID'=>$product_ID,
                            'product_name'=>$product_record[0]["product_name"],
                            'quantity'=>$_POST["product-quantity"],
                            'product_price'=>$product_record[0]["product_price"],
                            'product_image'=>$product_record[0]["product_image"],
                            'product_stock'=>$product_record[0]["product_stock"]
                        )
                    );

                    $product_exists = false;

                    if (!empty($_SESSION["cart_items"])) {
                        foreach($_SESSION["cart_items"] as $key => $value) {
                            if($product_ID == $_SESSION["cart_items"][$key]["product_ID"]) {
                                $_SESSION["cart_items"][$key]["quantity"] += $_POST["product-quantity"];
                                $product_exists = true;
                            }
                        }

                        if(!$product_exists) {
                            $_SESSION["cart_items"] = array_merge($_SESSION["cart_items"], $cart_item_array);
                        }
                    } else {
                        $_SESSION["cart_items"] = $cart_item_array;
                    }
                }
                header("Location: ../catalogue.php?product_category=$product_category");
            break;

            case "update":
                $product_ID = $_GET["product_ID"];
                $product_category = $_GET["product_category"];
                
                if (!empty($_POST["product-quantity"])) {
                    foreach($_SESSION["cart_items"] as $key => $value) {
                        if($product_ID == $_SESSION["cart_items"][$key]["product_ID"]) {
                            $_SESSION["cart_items"][$key]["quantity"] = $_POST["product-quantity"];
                        }
                    }
                } else if ($_POST["product-quantity"] == 0) {
                    foreach($_SESSION["cart_items"] as $key => $value) {
                        if($product_ID == $_SESSION["cart_items"][$key]["product_ID"]) {
                            unset($_SESSION["cart_items"][$key]);
                        }
                    }
                }
                header('Location: ../shopping-cart.php');
            break;

            case "remove":
                $product_ID = $_GET["product_ID"];
                $product_category = $_GET["product_category"];
                
                foreach($_SESSION["cart_items"] as $key => $value) {
                    if($product_ID == $_SESSION["cart_items"][$key]["product_ID"]) {
                        unset($_SESSION["cart_items"][$key]);
                    }
                }
                header('Location: ../shopping-cart.php');
            break;
        }


    }
?>
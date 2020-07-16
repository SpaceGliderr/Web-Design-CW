<?php
    session_start();
    require_once("config/database.php");
    $db = new Database();

    include 'includes/header.php';
?>

<body>
    <?php include 'includes/navbar.php'; ?>

    <main class="cart-main">
        <h1>Shopping Cart</h1>

        <?php
            if (isset($_SESSION["cart_items"])) {
                $number = 0;
                $total_price = 0;
                $total_quantity = 0;
        ?>

                <table class="cart-table">
                    <tr>
                        <th>No.</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                        <th></th>
                    </tr>

                    <?php
                        foreach ($_SESSION["cart_items"] as $item) {
                            $item_price = $item["quantity"] * $item["product_price"];
                            $number ++;
                    ?>
                            <tr>
                                <td> <?php echo $number; ?> </td>
                                <td>
                                    <img src="<?php echo $item["product_image"]; ?>" alt="">
                                    <span> <?php echo $item["product_name"]; ?> </span>
                                </td>
                                <td>
                                    <form action="processes/shopping-cart-action.php?action=update&product_ID=<?php echo $item["product_ID"]; ?>" method="post">
                                        <span>Quantity: <input type="number" name="product-quantity" value="<?php echo $item["quantity"]; ?>" min="0" max="<?php echo $item["product_stock"]; ?>"></span>
                                        <input type="submit" class="cart-btn" value="Update">
                                    </form>
                                </td>
                                <td>RM <?php echo $item["product_price"]; ?> </td>
                                <td>RM <?php echo $item_price; ?> </td>
                                <td>
                                    <form action="processes/shopping-cart-action.php?action=remove&product_ID=<?php echo $item["product_ID"]; ?>" method="post">
                                        <input type="submit" class="cart-btn" value="Remove">
                                    </form>
                                </td>
                            </tr>
                    <?php
                            $total_price += $item_price;
                            $total_quantity += $item["quantity"];
                        }
                    ?>

                    <tr>
                        <td colspan="2"></td>
                        <td>Total:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $total_quantity; ?></td>
                        <td>  </td>
                        <td>RM <?php echo $total_price; ?> </td>
                    </tr>

                </table>

                <div class="checkout-btn">
                  <a href="checkout.php"><input type="submit" class="checkout-btn" value="Checkout"></a>
                </div>

        <?php
            } else {
                echo "No Items in Shopping Cart";
            }
        ?>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>

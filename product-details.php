<?php
    session_start();
    require_once("config/database.php");
    $db = new Database();

    include 'includes/header.php';
?>

<body>
    <?php
        include 'includes/navbar.php';

        if(!empty($_GET["product_ID"])) {
            $product_ID = $_GET["product_ID"];
            $product_record = $db->runQuery("SELECT * FROM products WHERE product_ID = $product_ID");

            $product_image = $product_record[0]['product_image'];
            $product_name = $product_record[0]['product_name'];
            $product_description = $product_record[0]['product_description'];
            $product_price = $product_record[0]['product_price'];
            $product_stock = $product_record[0]['product_stock'];
            $product_specs = $product_record[0]['product_specs'];
            $product_type = $product_record[0]['product_type'];

    ?>

            <div class="product-main">
                <!-- Left Column -->
                <div class="left-column">
                    <img src="<?php echo $product_image; ?>" alt="">
                </div>


                <!-- Right Column -->
                <div class="right-column">
                    <!-- Product Description -->
                    <div class="product-description">
                        <span><?php echo $product_type; ?></span>
                        <h1><?php echo $product_name; ?></h1>
                        <p><?php echo $product_description; ?></p>
                        <hr>
                        <p class="product-price">RM <?php echo $product_price; ?></p>
                    </div>

                    <!-- Product Pricing -->
                    <div class="product-price">

                        <!-- <a href="#" class="cart-btn">Add to cart</a> -->
                    </div>

                    <form action="processes/shopping-cart-action.php?action=add&product_category=<?php echo $_GET["product_category"]?>&product_ID=<?php echo $product_ID?>" method="post">
                        <p class="quantity">Quantity: <input type="number" name="product-quantity" value="1" min="1" max="<?php echo $product_stock?>"></p>
                        <input type="submit" class="add-to-cart-btn" value="Add to Cart">
                    </form>
                </div>

            </div>

            <div class="menu-bar">
                <ul>
                    <li class="active"><a>PRODUCT SPECIFICATIONS</a></li>
                </ul>
            </div>

            <div class="description">
                <img src="<?php echo $product_specs; ?>" alt="">
            </div>

    <?php
        }
    ?>

    <?php include 'includes/footer.php'; ?>

</body>
</html>

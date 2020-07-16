<?php
    session_start();
    require_once("config/database.php");
    $db = new Database();

    $product_ID = $product_name = $product_description = $product_price = $product_stock = $product_category = $product_delivery = $product_rating = $product_type = $product_image = $product_specs = $vendor_ID = "";
    $nameErr = $descriptionErr = $priceErr = $stockErr = $categoryErr = $deliveryErr = $ratingErr = $typeErr = $imageErr = $specsErr = $vendorErr = "";

    $valid = true;

    if (!empty($_GET["action"])) {
        switch ($_GET["action"]) {
            case "update":
                $product_ID = $_GET["product_ID"];
                $product_record = $db->runQuery("SELECT * FROM products WHERE product_ID = $product_ID");
                $product_name = $product_record[0]["product_name"];
                $product_description = $product_record[0]['product_description'];
                $product_price = $product_record[0]["product_price"];
                $product_stock = $product_record[0]["product_stock"];
                $product_category = $product_record[0]["product_category"];
                $product_delivery = $product_record[0]["delivery"];
                $product_rating = $product_record[0]["product_rating"];
                $product_type = $product_record[0]["product_type"];
                $product_image = $product_record[0]["product_image"];
                $product_specs = $product_record[0]["product_specs"];
                $vendor_ID = $product_record[0]["vendor_ID"];

                $product_name_string = "'".$product_record[0]["product_name"]."'";
                $product_description_string = "'".$product_record[0]['product_description']."'";
                $product_image_string = "'".$product_record[0]["product_image"]."'";
                $product_specs_string = "'".$product_record[0]["product_specs"]."'";
            break;

            case "data":
                $product_name = $_POST["product_name"];
                $product_description = $_POST['product_description'];
                $product_price = $_POST["product_price"];
                $product_stock = $_POST["product_stock"];
                $product_category = $_POST["product_category"];
                $product_delivery = $_POST["product_delivery"];
                $product_rating = $_POST["product_rating"];
                $product_type = $_POST["product_type"];
                $product_image = $_POST["product_image"];
                $product_specs = $_POST["product_specs"];
                $vendor_ID = $_POST["vendor_ID"];

                $product_name_string = "'".$_POST["product_name"]."'";
                $product_description_string = "'".$_POST['product_description']."'";
                $product_image_string = "'".$_POST["product_image"]."'";
                $product_specs_string = "'".$_POST["product_specs"]."'";

                if (empty($product_name)) {
                    $nameErr = "* Product name is required";
                    $valid = false;
                }

                if (empty($product_description)) {
                    $descriptionErr = "* Product description is required";
                    $valid = false;
                }

                if (empty($product_price)) {
                    $priceErr = "* Product price is required";
                    $valid = false;
                }

                if (empty($product_stock)) {
                    $stockErr = "* Product stock is required";
                    $valid = false;
                }

                if (empty($product_category)) {
                    $categoryErr = "* Product category is required";
                    $valid = false;
                }

                if (empty($product_delivery)) {
                    $deliveryErr = "* Product delivery time is required";
                    $valid = false;
                }

                if (empty($product_rating)) {
                    $ratingErr = "* Product rating is required";
                    $valid = false;
                }

                if (empty($product_type)) {
                    $typeErr = "* Product type is required";
                    $valid = false;
                }

                if (empty($product_image)) {
                    $imageErr = "* Image link is required";
                    $valid = false;
                }

                if (empty($product_specs)) {
                    $specsErr = "* Specification link is required";
                    $valid = false;
                }

                if (empty($vendor_ID)) {
                    $vendorErr = "* Vendor ID is required";
                    $valid = false;
                }

                if (!empty($vendor_ID)) {
                    $vendor_exists = $db->runQuery("SELECT * FROM vendor WHERE vendor_ID = $vendor_ID");

                    if (empty($vendor_exists)) {
                        $vendorErr = "* Vendor does not exist within the database";
                        $valid = false;
                    }
                }

                if ($valid) {
                    if ($_GET["data-action"] == "update") {
                        $product_ID = $_GET["product_ID"];
                        $sql = "UPDATE products SET
                        product_image = '$product_image',
                        product_name = '$product_name',
                        product_description = '$product_description',
                        product_price = '$product_price',
                        product_stock = '$product_stock',
                        product_category = '$product_category',
                        delivery = '$product_delivery',
                        product_specs = '$product_specs',
                        product_rating = '$product_rating',
                        product_type = '$product_type',
                        vendor_ID = '$vendor_ID '
                        WHERE product_ID = '$product_ID'";

                        if ($db->insertQuery($sql)) {
                            header("Location: admin-product-page.php");
                        }
                    } else if ($_GET["data-action"] == "insert") {
                        $sql = "INSERT INTO products VALUES ( 'NULL', '$product_image', '$product_name', '$product_description', '$product_price', '$product_stock', '$product_category', '$product_delivery', '$product_specs', '$product_rating', '$product_type', '$vendor_ID')";
                        if ($db->insertQuery($sql)) {
                            header("Location: admin-product-page.php");
                        }
                    }
                }
            break;
        }
    }

    include 'includes/header.php';
?>

<body class="bg">

    <?php include 'includes/admin-nav.php'; ?>
    <div class="product-change-box">
    <h1>Product Form</h1>

    <?php
        if (!empty($_GET["button"])) {
            if ($_GET["button"] == "update") {
    ?>
                <form action="admin-product-form.php?action=data&data-action=update&product_ID=<?php echo $product_ID; ?>&button=update" method="post">
    <?php
        } else if ($_GET["button"] == "new") {
    ?>
                <form action="admin-product-form.php?action=data&data-action=insert&button=new" method="post">
    <?php
            }
        }
    ?>

        <label for="">Name</label><p class="error"><?php echo $nameErr ?></p>
        <input type="text" class="product-name" name="product_name" placeholder="Name" value=<?php if ($product_name != "") echo $product_name_string; ?>>

        <label for="">Description</label><p class="error"><?php echo $descriptionErr ?></p>
        <input type="text" class="" name="product_description" placeholder="Description" value=<?php if ($product_description != "") echo $product_description_string; ?>>

        <label for="">Price</label><p class="error"><?php echo $priceErr ?></p>
        <input type="text" class="" name="product_price" placeholder="Price" value=<?php echo $product_price; ?>>

        <label for="">Stock</label><p class="error"><?php echo $stockErr ?></p>
        <input type="text" class="" name="product_stock" placeholder="Stock" value=<?php echo $product_stock; ?>>

        <label for="">Category</label><p class="error"><?php echo $categoryErr ?></p>
        <input type="text" class="" name="product_category" placeholder="Category" value=<?php echo $product_category; ?>>

        <label for="">Delivery</label><p class="error"><?php echo $deliveryErr ?></p>
        <input type="text" class="" name="product_delivery" placeholder="Delivery" value=<?php echo $product_delivery; ?>>

        <div class="right-edit-product">
          <label for="">Rating</label><p class="error"><?php echo $ratingErr ?></p>
          <input type="text" class="" name="product_rating" placeholder="Rating" value=<?php echo $product_rating; ?>>

          <label for="">Type</label><p class="error"><?php echo $typeErr ?></p>
          <input type="text" class="" name="product_type" placeholder="Type" value=<?php echo $product_type; ?>>

          <label for="">Image Link</label><p class="error"><?php echo $imageErr ?></p>
          <input type="text" class="" name="product_image" placeholder="Image Link" value=<?php if ($product_image != "") echo $product_image_string; ?>>

          <label for="">Specification Link</label><p class="error"><?php echo $specsErr ?></p>
          <input type="text" class="" name="product_specs" placeholder="Specification Link" value=<?php if ($product_specs != "") echo $product_specs_string; ?>>

          <label for="">Vendor ID</label><p class="error"><?php echo $vendorErr ?></p>
          <input type="text" class="" name="vendor_ID" placeholder="Vendor ID" value=<?php echo $vendor_ID; ?>>
        </div>

        <?php
            if (!empty($_GET["button"])) {
                if ($_GET["button"] == "update") {
        ?>
                    <input type="submit" value="Update Product">
        <?php
                } else if ($_GET["button"] == "new") {
        ?>
                    <input type="submit" value="Enter New Product">
        <?php
                }
            }
        ?>
    </form>
  </div>
</body>
</html>

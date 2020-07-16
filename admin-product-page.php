<?php
  session_start();
  require_once("config/database.php");
  $db = new Database();

  if (!empty($_GET["action"])) {
    $product_ID = $_GET["product_ID"];

    $sql = "DELETE FROM products WHERE product_ID = '$product_ID'";
    if ($db->insertQuery($sql)) {
      header("Location: admin-product-page.php");
    }
  }

  include 'includes/header.php';
?>
<body class="bg">

  <?php include 'includes/admin-nav.php'; ?>

  <div class="admin-product-container">
    <div class="admin-product-container-table">
      <h1>Product List</h1>
        <table>
          <tr>
            <th></th>
            <th>Product ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Category</th>
            <th>Delivery</th>
            <th>Rating</th>
            <th>Type</th>
            <th>Image Link</th>
            <th>Specification Link</th>
            <th>Vendor ID</th>
          </tr>

          <?php
            $product_records = $db->runQuery("SELECT * FROM products ORDER BY product_ID ASC");
            if (!empty($product_records)) {
              foreach ($product_records as $key=>$value) {
                $product_ID = $product_records[$key]['product_ID'];
                $product_name = $product_records[$key]["product_name"];
                $product_description = $product_records[$key]['product_description'];
                $product_price = $product_records[$key]["product_price"];
                $product_stock = $product_records[$key]["product_stock"];
                $product_category = $product_records[$key]["product_category"];
                $product_delivery = $product_records[$key]["delivery"];
                $product_rating = $product_records[$key]["product_rating"];
                $product_type = $product_records[$key]["product_type"];
                $product_image = $product_records[$key]["product_image"];
                $product_specs = $product_records[$key]["product_specs"];
                $vendor_ID = $product_records[$key]["vendor_ID"];
          ?>
                <tr>
                  <td>
                    <form action="admin-product-form.php?action=update&product_ID=<?php echo $product_ID; ?>&button=update" method="post">
                      <input class="update" type="submit" value="Update">
                    </form>

                    <form action="admin-product-page.php?action=delete&product_ID=<?php echo $product_ID; ?>" method="post">
                      <input type="submit" value="Delete">
                    </form>
                  </td>
                  <td><?php echo $product_ID; ?></td>
                  <td><?php echo $product_name; ?></td>
                  <td><?php echo $product_description; ?></td>
                  <td><?php echo $product_price; ?></td>
                  <td><?php echo $product_stock; ?></td>
                  <td><?php echo $product_category; ?></td>
                  <td><?php echo $product_delivery; ?></td>
                  <td><?php echo $product_rating; ?></td>
                  <td><?php echo $product_type; ?></td>
                  <td><?php echo $product_image; ?></td>
                  <td><?php echo $product_specs; ?></td>
                  <td><?php echo $vendor_ID; ?></td>
                </tr>
          <?php
              }
            }
          ?>
        </table>
    </div>

    <div class="button" id="admin-button">
        <a href="admin-product-form.php?action=new&button=new">ADD NEW PRODUCT</a>
    </div>
  </div>
</body>
</html>

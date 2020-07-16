<?php
    session_start();
    require_once("config/database.php");
    $db = new Database();

    $vendor_ID = $vendor_name = $vendor_location = "";
    $nameErr = $locationErr = "";

    $valid = true;

    if (!empty($_GET["action"])) {
        switch ($_GET["action"]) {
            case "update":
                $vendor_ID = $_GET["vendor_ID"];
                $vendor_record = $db->runQuery("SELECT * FROM vendor WHERE vendor_ID = $vendor_ID");
                $vendor_name = $vendor_record[0]["vendor_name"];
                $vendor_location = $vendor_record[0]['vendor_location'];

                $vendor_name_string = "'".$vendor_record[0]["vendor_name"]."'";
                $vendor_location_string = "'".$vendor_record[0]['vendor_location']."'";
            break;

            case "data":
                $vendor_name = $_POST["vendor_name"];
                $vendor_location = $_POST['vendor_location'];

                $vendor_name_string = "'".$_POST["vendor_name"]."'";
                $vendor_location_string = "'". $_POST['vendor_location']."'";

                if (empty($vendor_name)) {
                    $nameErr = "* Vendor name is required";
                    $valid = false;
                }

                if (empty($vendor_location)) {
                    $locationErr = "* Vendor location is required";
                    $valid = false;
                }

                if ($valid) {
                    if ($_GET["data-action"] == "update") {
                        $vendor_ID = $_GET["vendor_ID"];
                        $sql = "UPDATE vendor SET
                        vendor_name = '$vendor_name',
                        vendor_location = '$vendor_location'
                        WHERE vendor_ID = '$vendor_ID'";

                        if ($db->insertQuery($sql)) {
                            header("Location: admin-vendor-page.php");
                        }
                    } else if ($_GET["data-action"] == "insert") {
                        $sql = "INSERT INTO vendor VALUES ( 'NULL', '$vendor_name', '$vendor_location')";
                        if ($db->insertQuery($sql)) {
                            header("Location: admin-vendor-page.php");
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
    <div class="vendor-change-box">
    <h1>Vendor Form</h1>

    <?php
        if (!empty($_GET["button"])) {
            if ($_GET["button"] == "update") {
    ?>
                <form action="admin-vendor-form.php?action=data&data-action=update&vendor_ID=<?php echo $vendor_ID; ?>&button=update" method="post">
    <?php
        } else if ($_GET["button"] == "new") {
    ?>
                <form action="admin-vendor-form.php?action=data&data-action=insert&button=new" method="post">
    <?php
            }
        }
    ?>

        <label for="">Name</label><p class="error"><?php echo $nameErr ?></p>
        <input type="text" class="" name="vendor_name" placeholder="Name" value=<?php if ($vendor_name != "") echo $vendor_name_string; ?>>


        <label for="">Location</label><p class="error"><?php echo $locationErr ?></p>
        <input type="text" class="" name="vendor_location" placeholder="Location" value=<?php if ($vendor_location != "") echo $vendor_location_string; ?>>


        <?php
            if (!empty($_GET["button"])) {
                if ($_GET["button"] == "update") {
        ?>
                    <input type="submit" value="Update Vendor">
        <?php
                } else if ($_GET["button"] == "new") {
        ?>
                    <input type="submit" value="Enter New Vendor">
        <?php
                }
            }
        ?>
    </form>
  </div>
</body>
</html>

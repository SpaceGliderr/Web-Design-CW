<?php
    session_start();
    require_once("config/database.php");
    $db = new Database();

    $admin_ID = $admin_email = $admin_name = $admin_password = "";
    $emailErr = $nameErr = $passwordErr = "";

    $passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";

    $valid = true;

    if (!empty($_GET["action"])) {
        switch ($_GET["action"]) {
            case "update":
                $admin_ID = $_GET["admin_ID"];
                $admin_record = $db->runQuery("SELECT * FROM admins WHERE admin_ID = $admin_ID");
                $admin_email = $admin_record[0]["admin_email"];
                $admin_name = $admin_record[0]['admin_name'];
                $admin_password = $admin_record[0]["admin_password"];

                $admin_name_string = "'".$admin_record[0]["admin_name"]."'";
            break;

            case "data":
                $admin_email = $_POST["admin_email"];
                $admin_name = $_POST['admin_name'];
                $admin_password = $_POST["admin_password"];

                $admin_name_string = "'".$_POST["admin_name"]."'";

                if (empty($admin_email)) {
                    $emailErr = "* Admin email is required";
                    $valid = false;
                } else if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "* Invalid email address";
                    $valid = false;
                }

                if (empty($admin_name)) {
                    $nameErr = "* Admin name is required";
                    $valid = false;
                }

                if (empty($admin_password)) {
                    $passwordErr = "* Admin password is required";
                    $valid = false;
                } else if (!preg_match($passwordRegex, $admin_password)) {
                    $passwordErr = "* Password must contain at least 8 characters, 1 uppercase, 1 lowercase and 1 number";
                    $valid = false;
                }

                if ($valid) {
                    if ($_GET["data-action"] == "update") {
                        $admin_ID = $_GET["admin_ID"];
                        $sql = "UPDATE admins SET
                        admin_email = '$admin_email',
                        admin_name = '$admin_name',
                        admin_password = '$admin_password'
                        WHERE admin_ID = '$admin_ID'";

                        if ($db->insertQuery($sql)) {
                            header("Location: admin-admins-page.php");
                        }
                    } else if ($_GET["data-action"] == "insert") {
                        $admin_exists = $db->runQuery("SELECT * FROM admins WHERE admin_email = '$admin_email'");

                        if (empty($admin_exists)) {
                            $sql = "INSERT INTO admins VALUES ( 'NULL', '$admin_email', '$admin_name', '$admin_password')";
                            if ($db->insertQuery($sql)) {
                                header("Location: admin-admins-page.php");
                            }
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
    <div class="admin-change">
    <h1>Admin Form</h1>

    <?php
        if (!empty($_GET["button"])) {
            if ($_GET["button"] == "update") {
    ?>
                <form action="admin-admins-form.php?action=data&data-action=update&admin_ID=<?php echo $admin_ID; ?>&button=udpate" method="post">
    <?php
        } else if ($_GET["button"] == "new") {
    ?>
                <form action="admin-admins-form.php?action=data&data-action=insert&button=new" method="post">
    <?php
            }
        }
    ?>

        <label for="">Email</label><p class="error"><?php echo $emailErr ?></p>
        <input type="email" class="" name="admin_email" placeholder="Email" value=<?php echo $admin_email; ?>>

        <label for="">Name</label><p class="error"><?php echo $nameErr ?></p>
        <input type="text" class="" name="admin_name" placeholder="Username" value=<?php if ($admin_name != "") echo $admin_name_string; ?>>

        <label for="">Password</label><p class="error"><?php echo $passwordErr ?></p>
        <input style="border-radius: 0px;" type="password" name="admin_password" placeholder="Password" value=<?php echo $admin_password; ?>>

        <?php
            if (!empty($_GET["button"])) {
                if ($_GET["button"] == "update") {
        ?>
                    <input type="submit" value="Update Admin Details">
        <?php
                } else if ($_GET["button"] == "new") {
        ?>
                    <input type="submit" value="Enter New Admin">
        <?php
                }
            }
        ?>
    </form>
  </div>
</body>
</html>

<?php
    session_start();
    require_once("config/database.php");
    $db = new Database();
    $admin_emailErr = $admin_passwordErr = "";
    $admin_email = $admin_password = "";

    $valid = true;

    $admin_login = false;
    $admin_login_status = "";

    if (!empty($_GET["action"])) {
      $admin_email = $_POST["admin_email"];
      $admin_password = $_POST["admin_password"];

      if (empty($admin_email)) {
        $admin_emailErr = "* Admin email is required";
        $valid = false;
      }

      if (empty($admin_password)) {
        $admin_passwordErr = "* Admin password is required";
        $valid = false;
      }

      if ($valid){
        $admin_email = test_input($admin_email);
        $admin_password = test_input($admin_password);

        $admin = $db->runQuery("SELECT * FROM admins WHERE admin_email = '$admin_email'");

        if (empty($admin)) {
          $admin_login_status = "An admin account does not exist with this email.";
        } else {
          if ($admin_password == $admin[0]["admin_password"]) {
            $admin_login = true;
            $admin_login_status = "Login Successful... Redirecting";
            $admin_email = $admin_password = "";
            $_SESSION["admin"] = $admin;
          } else {
            $admin_passwordErr = "* Password entered is incorrect";
          }
        }
      }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);

      return $data;
    }

    include 'includes/header.php';
?>

<body class="bg">

    <main class="adminlogin-change-box">
        <h1>Admin Login</h1>

        <?php
            if ($admin_login_status != "") {
                if ($admin_login) {
        ?>

                    <div class="">
                        <p><?php echo $admin_login_status; ?></p>
                    </div>

        <?php
                    header('Location: admin-product-page.php');
                } else {
        ?>

                    <div class="">
                        <p><?php echo $admin_login_status; ?></p>
                    </div>

        <?php
                }
            }
        ?>

        <form action="admin-login.php?action=submit" method="post">
            <label style="color:#ffff;">Email</label><p class="error"><?php echo $admin_emailErr; ?></p>
            <input class="adminlogin-email" style="border-radius: 5px; width: 100%;" type="email" name="admin_email" placeholder="Email" value=<?php if ($admin_email != "") echo $admin_email;?>>

            <label style="color:#ffff;">Password</label><p class="error"><?php echo $admin_passwordErr; ?></p>
            <input style="width: 100%;padding-left: 20px;border: none;background-color: #6e829d;height: 40px;color: #fff;font-size: 16px;" type="password" name="admin_password" placeholder="Password" value=<?php if ($admin_password != "") echo $admin_password;?>>

            <input type="submit" name="" value="Login">
        </form>
    </main>

</body>

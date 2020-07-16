<?php
  session_start();
  require_once("config/database.php");
  $db = new Database();

  $emailErr = $passwordErr = "";
  $email = $password = "";

  $valid = true;

  $account_login = false;
  $account_login_status = "";

  if (!empty($_GET["action"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email)) {
      $emailErr = "* Email is required";
      $valid = false;
    }

    if (empty($password)) {
      $passwordErr = "* Password is required";
      $valid = false;
    }

    if ($valid){
      $email = test_input($email);
      $password = test_input($password);

      $user = $db->runQuery("SELECT * FROM users WHERE email = '$email'");

      if (empty($user)) {
        $account_login_status = "An account does not exist with this email. Try <a href='signup.php'>signing up</a> instead.";
      } else {
        if ($password == $user[0]["password"]) {
          $account_login = true;
          $account_login_status = "Login Successful";
          $email = $password = "";
          $_SESSION["user"] = $user;
        } else {
          $passwordErr = "* Password entered is incorrect";
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
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="loginbox">
      <img src="images/user.png" class="avatar">
      <h1>Login Here</h1>

      <?php
        if ($account_login_status != "") {
          if ($account_login) {
      ?>

            <div class="login-success">
              <p><?php echo $account_login_status; ?></p>
            </div>

      <?php
          } else {
      ?>

            <div class="login-fail">
              <p><?php echo $account_login_status; ?></p>
            </div>

      <?php
          }
        }
      ?>

      <form action="login.php?action=submit" method="post">
          <label>Email</label><p class="error"><?php echo $emailErr; ?></p>
          <input type="Email" name="email" placeholder="" value=<?php if ($email != "") echo $email;?>>

          <label>Password</label><p class="error"><?php echo $passwordErr; ?></p>
          <input type="password" name="password" placeholder="" value=<?php if ($password != "") echo $password;?>>

          <input type="submit" name="" value="Login">
          <a href="signup.php">Don't have an account?</a>
      </form>
    </div>
</body>
</html>

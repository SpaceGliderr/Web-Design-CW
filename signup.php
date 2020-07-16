<?php
  session_start();
  require_once("config/database.php");
  $db = new Database();

  $usernameErr = $emailErr = $passwordErr = $confirm_passwordErr = $addressErr = $cityErr = $stateErr = $zipErr = "";
  $username = $email = $password = $confirm_password = $address = $city = $state = $zip = "";

  $passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";

  $valid = true;

  $account_creation = false;
  $account_creation_status = "";

  if (!empty($_GET["action"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip-code"];

    if (empty($username)) {
      $usernameErr = "* Username is required";
      $valid = false;
    } else if (!ctype_alnum($username)) {
      $usernameErr = "* Username must only consist of alphabets and numbers";
      $valid = false;
    }
    if (empty($email)) {
      $emailErr = "* Email is required";
      $valid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "* Invalid email address";
      $valid = false;
    }

    if (empty($password)) {
      $passwordErr = "* Password is required";
      $valid = false;
    } else if (!preg_match($passwordRegex, $password)) {
      $passwordErr = "* Password must contain at least 8 characters, 1 uppercase, 1 lowercase and 1 number";
      $valid = false;
    }

    if (empty($confirm_password)) {
      $confirm_passwordErr = "* Please re-enter your password";
      $valid = false;
    } else if ($confirm_password != $password) {
      $confirm_passwordErr = "* The re-entered password does not match";
      $valid = false;
    }

    if (empty($address)) {
      $addressErr = "* Address is required";
      $valid = false;
    }

    if (empty($city)) {
      $cityErr = "* City is required";
      $valid = false;
    }

    if (empty($state)) {
      $stateErr = "* State is required";
      $valid = false;
    }

    if (empty($zip)) {
      $zipErr = "* Zip Code is required";
      $valid = false;
    }

    if ($valid){
      $username = test_input($username);
      $email = test_input($email);
      $password = test_input($password);
      $confirm_password = test_input($confirm_password);
      $address = test_input($address);
      $city = test_input($city);
      $state = test_input($state);
      $zip = test_input($zip);

      $user_exists = $db->runQuery("SELECT * FROM users WHERE email = '$email'");

      if (empty($user_exists)) {
        $sql = "INSERT INTO users VALUES ( 'NULL', '$username', '$email', '$password', '$address', '$city', '$state', '$zip' );";
        if ($db->insertQuery($sql)) {
          $account_creation = true;
          $account_creation_status = "Congratulations! Your account has been created. Please try <a href='login.php'>logging in</a>.";
          $username = $email = $password = $confirm_password = $address = $city = $state = $zip = "";
        } else {
          $account_creation_status = "Error in creating your account. Please try again.";
        }
      } else {
        $account_creation_status = "An account already exists under this email. Please try <a href='login.php'>logging in</a> instead.";
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

  <div class="signupbox">
    <img src="images/user.png" class="avatar">
    <h1>Sign Up Here</h1>

    <?php
      if ($account_creation_status != "") {
        if ($account_creation) {
    ?>

          <div class="signup-success">
            <p><?php echo $account_creation_status; ?></p>
          </div>

    <?php
        } else {
    ?>

          <div class="signup-fail">
            <p><?php echo $account_creation_status; ?></p>
          </div>

    <?php
        }
      }
    ?>

    <form action="signup.php?action=submit" method="post">
      <label for="inputUsername">Username</label><p class="error"><?php echo $usernameErr; ?></p>
      <input type="text" class="form-control" name="username" placeholder="" value=<?php if ($username != "") echo $username;?>>

      <label for="inputEmail4">Email</label><p class="error"><?php echo $emailErr; ?></p>
      <input type="email" class="form-control" name="email" placeholder="" value=<?php if ($email != "") echo $email;?>>

      <label for="inputPassword4">Password</label><p class="error"><?php echo $passwordErr; ?></p>
      <input style="border-radius:0px;"type="password" class="form-control" name="password" placeholder="" value=<?php if ($password != "") echo $password;?>>

      <label for="inputPassword4">Re-enter Password</label><p class="error"><?php echo $confirm_passwordErr; ?></p>
      <input style="border-radius:0px;"type="password" class="form-control" name="confirm-password" placeholder="" value=<?php if ($confirm_password != "") echo $confirm_password;?>>

      <label for="inputAddress" >Address</label><p class="error"><?php echo $addressErr; ?></p>
      <input type="text" class="form-control" name="address" placeholder="Ex: 1234 Main St" value=<?php if ($address != "") echo $address_string;?>>

      <div class="city">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" name="city" placeholder="" value=<?php if ($city != "") echo $city_string;?>>
      <p><?php echo $cityErr; ?></p>
      </div>

      <div class="state">
      <label for="inputState">State</label>
      <input type="text" class="form-control" name="state" placeholder="" value=<?php if ($state != "") echo $state_string;?>>
      <p class="stateerr"><?php echo $stateErr; ?></p><br>
      </div>

      <div class="zip">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" name="zip-code" placeholder="" value=<?php if ($zip != "") echo $zip;?>>
      <p><?php echo $zipErr; ?></p><br>
      </div>

      <input type="submit" name="" value="Sign Up">
    </form>

  </div>
</body>
</html>

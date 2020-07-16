<?php
  session_start();
  require_once("config/database.php");
  $db = new Database();

  if (!empty($_GET["action"])) {
    $user_ID = $_GET["user_ID"];

    $sql = "DELETE FROM users WHERE user_ID = '$user_ID'";
    if ($db->insertQuery($sql)) {
      header("Location: admin-user-page.php");
    }
  }

  include 'includes/header.php';
?>
<body class="bg">

  <?php include 'includes/admin-nav.php'; ?>

  <div class="admin-product-container">
    <div class="admin-product-container-table">
      <h1>User List</h1>
        <table>
          <tr>
            <th></th>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
          </tr>

          <?php
            $user_records = $db->runQuery("SELECT * FROM users ORDER BY user_ID ASC");
            if (!empty($user_records)) {
              foreach ($user_records as $key=>$value) {
                $user_ID = $user_records[$key]['user_ID'];
                $username = $user_records[$key]["username"];
                $email = $user_records[$key]['email'];
                $password = $user_records[$key]["password"];
                $address = $user_records[$key]["address"];
                $city = $user_records[$key]["city"];
                $state = $user_records[$key]["state"];
                $zip = $user_records[$key]["zip"];
          ?>
                <tr>
                  <td>
                    <form action="admin-user-page.php?action=delete&user_ID=<?php echo $user_ID; ?>" method="post">
                      <input type="submit" value="Delete">
                    </form>
                  </td>
                  <td><?php echo $user_ID; ?></td>
                  <td><?php echo $username; ?></td>
                  <td><?php echo $email; ?></td>
                  <td><?php echo $password; ?></td>
                  <td><?php echo $address; ?></td>
                  <td><?php echo $city; ?></td>
                  <td><?php echo $state; ?></td>
                  <td><?php echo $zip; ?></td>
                </tr>
          <?php
              }
            }
          ?>
        </table>
    </div>
  </div>
</body>
</html>

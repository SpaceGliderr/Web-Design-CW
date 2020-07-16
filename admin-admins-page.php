<?php
  session_start();
  require_once("config/database.php");
  $db = new Database();

  if (!empty($_GET["action"])) {
    $admin_ID = $_GET["admin_ID"];

    $sql = "DELETE FROM admins WHERE admin_ID = '$admin_ID'";
    if ($db->insertQuery($sql)) {
      header("Location: admin-admins-page.php");
    }
  }

  include 'includes/header.php';
?>
<body class="bg">

  <?php include 'includes/admin-nav.php'; ?>

  <div class="admin-product-container">
    <div class="admin-product-container-table">
      <h1>Admins List</h1>
        <table>
          <tr>
            <th></th>
            <th>Admin ID</th>
            <th>Email</th>
            <th>Name</th>
            <th>Password</th>
          </tr>

          <?php
            $admin_records = $db->runQuery("SELECT * FROM admins ORDER BY admin_ID ASC");
            if (!empty($admin_records)) {
              foreach ($admin_records as $key=>$value) {
                $admin_ID = $admin_records[$key]['admin_ID'];
                $admin_name = $admin_records[$key]["admin_name"];
                $admin_email = $admin_records[$key]['admin_email'];
                $admin_password = $admin_records[$key]["admin_password"];
          ?>
                <tr>
                  <td>
                    <form action="admin-admins-form.php?action=update&admin_ID=<?php echo $admin_ID; ?>&button=update" method="post">
                      <input class="update" type="submit" value="Update">
                    </form>

                    <form action="admin-admins-page.php?action=delete&admin_ID=<?php echo $admin_ID; ?>" method="post">
                      <input type="submit" value="Delete">
                    </form>
                  </td>
                  <td><?php echo $admin_ID; ?></td>
                  <td><?php echo $admin_email; ?></td>
                  <td><?php echo $admin_name; ?></td>
                  <td><?php echo $admin_password; ?></td>
                </tr>
          <?php
              }
            }
          ?>
        </table>
    </div>

    <div class="button" id="admin-button">
        <a href="admin-admins-form.php?action=new&button=new">ADD NEW ADMIN</a>
    </div>
  </div>
</body>
</html>

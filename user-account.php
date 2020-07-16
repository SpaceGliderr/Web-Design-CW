<?php
    session_start();
    include 'includes/header.php';

    $user = $_SESSION["user"];
?>

<body>
    <?php include "includes/navbar.php"; ?>

    <main class="user-acc-main">
        <img src="images/user.png" class="avatar">
        <h1>User Profile</h1>

        <p>Username: <span><?php echo $user[0]["username"]; ?></span></p>
        <p>Email: <span><?php echo $user[0]["email"]; ?></span></p>
        <p>Address: <span><?php echo $user[0]["address"]; ?></span></p>
        <p>City: <span><?php echo $user[0]["city"]; ?></span></p>
        <p>State: <span><?php echo $user[0]["state"]; ?></span></p>
        <p>Zip: <span><?php echo $user[0]["zip"]; ?></span></p>

        <a href="home.php?action=logout">Log Out <i class="fas fa-sign-out-alt"></i></a>
    </main>

</body>
</html>

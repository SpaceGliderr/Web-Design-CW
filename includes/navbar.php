<nav class="navbar">
    <ul class="navbar-nav">
        <li class="logo nav-item">
            <a href="home.php" class="nav-link"><img src="images/logo-and-word.png" alt=""></a>
        </li>
        <li class="hvr-float-shadow">
            <a href="catalogue.php?product_category='pclaptop'" class="nav-link"><span class="link-text">PC & Laptops</span></a>
        </li>
        <li class="hvr-float-shadow">
            <a href="catalogue.php?product_category='smartphone'" class="nav-link"><span class="link-text">Smartphones</span></a>
        </li>
        <li class="hvr-float-shadow">
            <a href="catalogue.php?product_category='gaming'" class="nav-link"><span class="link-text">Gaming</span></a>
        </li>
        <li class="hvr-float-shadow">
            <a href="catalogue.php?product_category='accessories'" class="nav-link"><span class="link-text">Accessories</span></a>
        </li>
        <li class="hvr-float-shadow">
            <a href="catalogue.php?product_category='storage'" class="nav-link"><span class="link-text">Storage</span></a>
        </li>
    </ul>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="shopping-cart.php" class="nav-link"><span class="link-text"><i class="fas fa-shopping-cart"></i></span></a>
        </li>

        <?php 
            if (empty($_SESSION["user"])) {
        ?>
        
                <li class="hvr-float-shadow">
                    <a href="signup.php" class="nav-link"><span class="link-text">Sign Up</span></a>
                </li>
                <li class="hvr-float-shadow">
                    <a href="login.php" class="nav-link"><span class="link-text">Log In</span></a>
                </li>

        <?php 
            } else {
                $user = $_SESSION["user"];
        ?>

                <li class="hvr-float-shadow">
                    <a href="user-account.php" class="nav-link"><span class="link-text"><?php echo $user[0]["username"]; ?></span></a>
                </li>

        <?php 
            }
        ?>
    </ul>
</nav>

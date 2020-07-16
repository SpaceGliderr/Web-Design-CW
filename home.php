<?php
    if(!isset($_SESSION)) { session_start(); }

    if (!empty($_GET["action"])) {
        unset($_SESSION["user"]);
    }

    include 'includes/header.php';
?>

<body>
    <?php include 'includes/navbar.php'; ?>

    <main>
        <div class="featured-container">
            <div class="featured-item-container">
                <div class="featured-item">
                    <div class="featured-item-content">
                        <h1>Improve your workflow</h1>
                        <p>Discover all new laptops and PCs here</p>
                          <div class="shopnow-container">
                            <a href="catalogue.php?product_category='pclaptop'">
                                <div class="shopnow-container-wrap">
                                    <div class="first">Shop Now</div>
                                    <div class="second">FROM RM3699</div>
                                </div>
                            </a>
                          </div>
                    </div>
                </div>
                <div class="featured-item">
                    <div class="featured-item-content">
                        <img src="images/HP-Spectre.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="featured-container">
            <div class="featured-item-container">
                <div class="featured-item">
                    <div class="featured-item-content">
                        <img src="images/IPhone-11.png" alt="">
                    </div>
                </div>
                <div class="featured-item">
                    <div class="featured-item-content">
                        <h1>Purchase the newest smartphones now</h1>
                        <p>Discover the latest technologies here</p>
                          <div class="shopnow-container">
                            <a href="catalogue.php?product_category='smartphone'">
                                <div class="shopnow-container-wrap">
                                    <div class="first">Shop Now</div>
                                    <div class="second">FROM RM499</div>
                                </div>
                            </a>
                          </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="featured-container">
            <div class="featured-item-container">
                <div class="featured-title">
                    <h1>For Office.</h1>
                    <p>Here are our top picks for everyone this week.</p>
                      <div class="shopnow-container">
                        <div class="shopnow-container-wrap">
                          <a href="catalogue.php?product_category='gaming'">
                            <div class="first">Find Out More</div>
                          </a>
                        </div>
                      </div>
                </div>
                <div class="featured-card-container">
                    <div class="featured-item featured-card">
                        <img src="product_images/Dell XPS 13.png" alt="">
                        <div style="width: 250px;"class="featured-card-content">
                            <p class="product-name">Dell XPS 13</p>
                            <p class="product-price">Price: RM5999</p>
                            <p class="product-rating">Rating: 3.8/5</p>
                        </div>
                    </div>
                    <div class="featured-item featured-card">
                        <img src="product_images/HP Spectre.png" alt="">
                        <div style="width: 250px;"class="featured-card-content">
                            <p class="product-name">HP-Spectre</p>
                            <p class="product-price">Price: RM6499</p>
                            <p class="product-rating">Rating: 5/5</p>
                        </div>
                    </div>
                    <div class="featured-item featured-card">
                        <img src="product_images/MacBookAir.png" alt="">
                        <div style="width: 250px;"class="featured-card-content">
                            <p class="product-name">MacBook Air 2020</p>
                            <p class="product-price">Price: RM5599</p>
                            <p class="product-rating">Rating: 4.3/5</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="featured-container">
            <div class="featured-item-container">
                <div class="featured-item">
                    <h1>Accessories</h1>
                    <img src="images/accessories.png" alt="">
                      <div class="shopnow-container">
                        <a href="catalogue.php?product_category='accessories'">
                            <div class="shopnow-container-wrap">
                                <div class="first">Shop Now</div>
                            </div>
                        </a>
                      </div>
                </div>
                <div class="featured-item">
                    <h1>Storage</h1>
                    <img src="images/storage.png" alt="">
                      <div class="shopnow-container">
                        <a href="catalogue.php?product_category='storage'">
                            <div class="shopnow-container-wrap">
                                <div class="first">Shop Now</div>
                            </div>
                        </a>
                      </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>

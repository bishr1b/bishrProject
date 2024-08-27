<?php
require('configration.php');
$myQuery = "SELECT *  FROM products";
$res = mysqli_query($connectios, $myQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>food laver</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Font awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- header start -->
    <header>
        <div id="nabvar">
            <img src="img/logo.png" alt="food lover logo" />
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
        <div class="content">
            <h1>Welcome to <span class="primary-text">Bishr</span>
                restaurant</h1>
            <p>Here you can find most delicacies food in the world</p>
            <a href="#" class="btn btn-primary">Book a table</a>
        </div>
    </header>

    <!-- header end -->

    <main>
        <!-- About section start -->
        <section id="about">
            <div class="container">
                <div class="title">
                    <h2>
                        The<span class="primary-text"> Bishr</span>
                        restaurant history
                    </h2>
                    <p>More than 25+ years od experiance</p>
                </div>
                <div class="about-content">
                    <div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur
                            adipisicing elit.
                            Deleniti illo eius ducimus at qui culpa dolore,
                            modi laudantium,
                            quam, rem nobis dignissimos blanditiis?
                            Assumenda quae quisquam
                            nisi hic neque possimus.
                        </p>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur
                            adipisicing elit. Fugiat
                            tempora architecto similique, iste blanditiis
                            impedit quo, quae
                            perferendis ipsam, sed amet earum perspiciatis?
                            Blanditiis quo,
                            doloremque assumenda eum delectus maiores.
                        </p>
                        <a href="#" class="btn btn-secondry">LEARN MORE</a>
                    </div>
                    <img src="img/about_img.png" alt="Pizza" />
                </div>
            </div>
        </section>
    </main>

    <!-- About section end -->

    <!-- offers start -->
    <section id="offers">
        <div class="container">
            <div class="title">
                <h2>Our specail offers discount</h2>
                <p>More than 25+ years od experiance</p>
            </div>


            <div class="offers-item">
                <?php
                if ($res == true && mysqli_num_rows($res) > 0) {
                    for ($i = 0; $i < mysqli_num_rows($res); $i++) {
                        $ROW = mysqli_fetch_array($res);
                        if ($ROW['discount'] > 0) {

                ?>
                            <div class="item">
                                <img src="photo/prodect/<?php echo $ROW['image'] ?>" alt="<?php echo $ROW['image'] ?>" />
                                <div>
                                    <h3><?php echo $ROW['title']; ?></h3>
                                    <p>
                                        <?php echo $ROW['description']; ?>
                                    </p>
                                    <p><del><?php echo $ROW['price']; ?>$</del><span
                                            class="primary-text"><?php echo $ROW['discount']; ?>$</span></p>
                                </div>
                            </div>
                <?php
                        }
                    }
                } ?>
            </div>


        </div>


    </section>
    <!-- offers end -->

    <!-- Menu start -->
    <section id="menu">
        <div class="container">
            <div class="title">
                <h2>Our specail Menu</h2>
                <p>Oredr two and get third free</p>
            </div>
            <div class="menu-items">

                <?php if ($res == true && mysqli_num_rows($res) > 0) {
                    foreach ($res as $prodect) {
                        if ($prodect['discount'] == 0) {
                ?>


                            <div class="menu-item">
                                <img src="photo/prodect/<?php echo $prodect['image'] ?>" alt="<?php echo $prodect['image'] ?>" />
                                <div>
                                    <h3><?php echo $prodect['title'] ?><span
                                            class="primary-text"><br><?php echo $prodect['price'] ?></span></h3>
                                    <p>
                                        <?php echo $prodect['description'] ?>
                                    </p>
                                </div>
                            </div>


                <?php }
                    }
                } ?>
            </div>
            <button class="btn">EXPLORE FULL MENU</button>
        </div>
    </section>
    <!-- Menu end -->

    <!-- Daytime start -->
    <div id="daytime">
        <div class="container">
            <div class="daytime-items">
                <div class="daytime-item">
                    <img src="img/breckfastIcon.png" alt="breckfastIcon" />
                    <h3>Breakfast</h3>
                    <p>8:00 AM TO 10:00 AM</p>
                </div>
                <div class="daytime-item">
                    <img src="img/lunchIcon.png" alt="Lunchfast" />
                    <h3>Lunchfast</h3>
                    <p>12:00 PM TO 2:00 PM</p>
                </div>
                <div class="daytime-item">
                    <img src="img/dinnerIcon.png" alt="DinnerfastIcon" />
                    <h3>Dinner</h3>
                    <p>6:00 PM TO 8:00 PM</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Daytime end -->

    <!-- gallery start-->
    <section id="gallery">
        <div class="container">
            <h2>Our food gallery</h2>
            <div class="img-gallery">
                <?php if ($res == true && mysqli_num_rows($res) > 0) {
                    foreach ($res as $prodect) {
                        if ($prodect['image'] != '') {
                ?>
                            <img src="photo/prodect/<?php echo $prodect['image']; ?>" alt="<?php echo $prodect['image']; ?>">
                <?php }
                    }
                } ?>
            </div>
        </div>
    </section>
    <!-- gallery end-->

    <!-- contact start -->
    <div id="contact">
        <div class="container">
            <div class="contact-content">
                <div class="contact-info">
                    <div>
                        <h3>ADDRESS</h3>
                        <p><i class="fa-solid fa-location-dot"></i> AL-amyri al-mhamien 121.4</p>
                        <p><i class="fa-solid fa-phone"></i> Phone:077009091@#8</p>
                        <p><i class="fa-solid fa-envelope"></i> bishr@gmail.com</p>
                    </div>
                    <div>
                        <h3>WORKING HOURS</h3>
                        <p>8:00 AM to 2:00 PM on weekdays</p>
                        <p>11:00 AM to 1:00 PM on weekends</p>
                    </div>
                    <div>
                        <h3>FOLLOW US</h3>
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
                <form>
                    <input type="text" name="name" id="name" placeholder="Full Name" required>
                    <input type="email" name="email" id="email" placeholder="Your Email" required>
                    <input type="text" name="subject" id="subject" placeholder="Your Subject" required>
                    <textarea name="message" id="message" cols="30" rows="5" placeholder="Your Message"></textarea>
                    <button type="submit" class="btn">SEND MESSAGE</button>
                </form>
            </div>
        </div>
    </div>
    <!-- contact end -->

    <!-- Footer start -->
    <div id="footer">
        <p>
            this web create by <a href="https://web.telegram.org/k/#@XXXXX0" target="_blank"
                style="color:#e4b96b;">Bishr</a>
        </p>
    </div>
    <!-- Footer end -->
</body>

</html>
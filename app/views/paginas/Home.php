<?php require RUTA_APP.'\views\inc\header.php'; ?>
<!-- Outer Wrapper-->
<div id="outer-wrapper">
    <!-- Inner Wrapper -->
    <div id="inner-wrapper">
        
        <!-- Navigation-->
            <div class="header">
                <div class="wrapper">
                    <div class="brand">
                        <a href="vista/index-directory.php"><img src="vista/assets/img/logo.png" alt="logo"></a>
                    </div>
                    <nav class="navigation-items">
                        <div class="wrapper">
                            <ul class="main-navigation navigation-top-header"></ul>
                            <ul class="user-area">
                                <li><a href="sign-in.php">Sign In</a></li>
                                <li><a href="register.php"><strong>Register</strong></a></li>
                            </ul>
                            <a href="submit.php" class="submit-item">
                                <div class="content"><span>Submit Your Item</span></div>
                                <div class="icon">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </a>
                            <div class="toggle-navigation">
                                <div class="icon">
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        <!-- end Navigation-->

        <!-- Page Canvas-->
        <div id="page-canvas">

            <!--Off Canvas Navigation-->
            <nav class="off-canvas-navigation">
                <header><?php  echo NOMBRE; ?></header>
                <div class="main-navigation navigation-off-canvas"></div>
            </nav>

            <!--end Off Canvas Navigation-->

            
            <!--Page Content-->
            <div id="page-content">
            <!-- Map Canvas-->
            <div class="map-canvas list-width-30">
            <!-- Map -->
                <div class="map">
                        <div class="toggle-navigation">
                            <div class="icon">
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                        <!--/.toggle-navigation-->
                        <div id="map" class="has-parallax"></div>
                        <!--/#map-->
                        <div class="search-bar horizontal">
                            <form class="main-search border-less-inputs" role="form" method="post">
                                <div class="input-row">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="keyword" placeholder="Enter Keyword">
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <div class="input-group location">
                                            <input type="text" class="form-control" id="location" placeholder="Enter Location">
                                            <span class="input-group-addon"><i class="fa fa-map-marker geolocation" data-toggle="tooltip" data-placement="bottom" title="Find my position"></i></span>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <select name="category" multiple title="Select Category" data-live-search="true">
                                            <option value="1">Stores</option>
                                            <option value="2" class="sub-category">Apparel</option>
                                            <option value="3" class="sub-category">Computers</option>
                                            <option value="4" class="sub-category">Nature</option>
                                            <option value="5">Tourism</option>
                                            <option value="6">Restaurant & Bars</option>
                                            <option value="7" class="sub-category">Bars</option>
                                            <option value="8" class="sub-category">Vegetarian</option>
                                            <option value="9" class="sub-category">Steak & Grill</option>
                                            <option value="10">Sports</option>
                                            <option value="11" class="sub-category">Cycling</option>
                                            <option value="12" class="sub-category">Water Sports</option>
                                            <option value="13" class="sub-category">Winter Sports</option>
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.input-row -->
                            </form>
                            <!-- /.main-search -->
                        </div>
                        <!-- /.search-bar -->
                    </div>
                    <!-- end Map -->
                    <!--Items List-->
                    <div class="items-list">
                        <div class="inner">
                            <header>
                                <h3>Results</h3>
                            </header>
                            <ul class="results list">

                            </ul>
                        </div>
                        <!--results-->
                    </div>
                    <!--end Items List-->
                </div>
            <!-- end Map Canvas-->
                <!--Featured-->
                <section id="featured" class="block background-color-grey-dark equal-height">
                    <div class="container">
                        <header><h2>Featured</h2></header>
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <div class="item featured">
                                    <div class="image">
                                        <div class="quick-view" id="1"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                        <a href="item-detail.php">
                                            <div class="overlay">
                                                <div class="inner">
                                                    <div class="content">
                                                        <h4>Description</h4>
                                                        <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-specific">
                                                <span title="Bedrooms"><img src="assets/img/bedrooms.png" alt="">2</span>
                                                <span title="Bathrooms"><img src="assets/img/bathrooms.png" alt="">2</span>
                                                <span title="Area"><img src="assets/img/area.png" alt="">240m<sup>2</sup></span>
                                                <span title="Garages"><img src="assets/img/garages.png" alt="">1</span>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-thumbs-up"></i>
                                            </div>
                                            <img src="assets/img/items/1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <a href="item-detail.php"><h3>Steak House Restaurant</h3></a>
                                        <figure>63 Birch Street</figure>
                                        <div class="info">
                                            <div class="type">
                                                <i><img src="assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                <span>Restaurant</span>
                                            </div>
                                            <div class="rating" data-rating="4"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.item-->
                            </div>
                            <!--/.col-sm-4-->
                            <div class="col-md-3 col-sm-3">
                                <div class="item featured">
                                    <div class="image">
                                        <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                        <a href="item-detail.php">
                                            <div class="overlay">
                                                <div class="inner">
                                                    <div class="content">
                                                        <h4>Description</h4>
                                                        <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="assets/img/items/2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <a href="item-detail.php"><h3>Benny’s Cafeteria</h3></a>
                                        <figure>63 Birch Street</figure>
                                        <div class="info">
                                            <div class="type">
                                                <i><img src="assets/icons/restaurants-bars/restaurants/cafetaria.png" alt=""></i>
                                                <span>Cafeteria</span>
                                            </div>
                                            <div class="rating" data-rating="4"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.item-->
                            </div>
                            <!--/.col-sm-4-->
                            <div class="col-md-3 col-sm-3">
                                <div class="item featured">
                                    <div class="image">
                                        <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                        <a href="item-detail.php">
                                            <div class="overlay">
                                                <div class="inner">
                                                    <div class="content">
                                                        <h4>Description</h4>
                                                        <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-specific">
                                                <span>Daily menu from: $6</span>
                                            </div>
                                            <img src="assets/img/items/restaurant/9.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <a href="item-detail.php"><h3>Big Bamboo</h3></a>
                                        <figure>4662 Bruce Street</figure>
                                        <div class="info">
                                            <div class="type">
                                                <i><img src="assets/icons/restaurants-bars/restaurants/japanese-food.png" alt=""></i>
                                                <span>Sushi</span>
                                            </div>
                                            <div class="rating" data-rating="3"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.item-->
                            </div>
                            <!--/.col-sm-4-->
                            <div class="col-md-3 col-sm-3">
                                <div class="item featured">
                                    <div class="image">
                                        <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                        <a href="item-detail.php">
                                            <div class="overlay">
                                                <div class="inner">
                                                    <div class="content">
                                                        <h4>Description</h4>
                                                        <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-specific">
                                                <span>Daily menu from: $6</span>
                                            </div>
                                            <img src="assets/img/items/restaurant/10.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="wrapper">
                                        <a href="item-detail.php"><h3>Sushi Wooshi Bar</h3></a>
                                        <figure>357 Trainer Avenue</figure>
                                        <div class="info">
                                            <div class="type">
                                                <i><img src="assets/icons/restaurants-bars/restaurants/fishchips.png" alt=""></i>
                                                <span>Sushi Bar</span>
                                            </div>
                                            <div class="rating" data-rating="3"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.item-->
                            </div>
                            <!--/.col-sm-4-->
                        </div>
                        <!--/.row-->
                    </div>
                    <!--/.container-->
                </section>
                <!--end Featured-->
    
                <!--Popular-->
                <section id="popular" class="block background-color-white">
                    <div class="container">
                        <header><h2>Popular</h2></header>
                        <div class="owl-carousel wide carousel">
                            <div class="slide">
                                <div class="inner">
                                    <div class="image">
                                        <div class="item-specific">
                                            <div class="inner">
                                                <div class="content">
                                                    <dl>
                                                        <dt>Bedrooms</dt>
                                                        <dd>2</dd>
                                                        <dt>Bathrooms</dt>
                                                        <dd>2</dd>
                                                        <dt>Area</dt>
                                                        <dd>240m<sup>2</sup></dd>
                                                        <dt>Garages</dt>
                                                        <dd>1</dd>
                                                        <dt>Build Year</dt>
                                                        <dd>1990</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/img/items/restaurant/8.jpg" alt="">
                                    </div>
                                    <div class="wrapper">
                                        <a href="item-detail.php"><h3>Magma Bar and Grill</h3></a>
                                        <figure>
                                            <i class="fa fa-map-marker"></i>
                                            <span>970 Chapel Street, Rosenberg, TX 77471</span>
                                        </figure>
                                        <div class="info">
                                            <div class="rating" data-rating="4">
                                                <aside class="reviews">6 reviews</aside>
                                            </div>
                                            <div class="type">
                                                <i><img src="assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                <span>Restaurant</span>
                                            </div>
                                        </div>
                                        <!--/.info-->
                                        <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa, viverra interdum eros ut,
                                            imperdiet pellentesque mauris. Proin sit amet scelerisque risus. Donec semper semper erat ut mollis.
                                            Curabitur suscipit, justo eu dignissim lacinia, ante sapien pharetra dui...
                                        </p>
                                        <a href="item-detail.php" class="read-more icon">Read More</a>
                                    </div>
                                    <!--/.wrapper-->
                                </div>
                                <!--/.inner-->
                            </div>
                            <!--/.slide-->
                            <div class="slide">
                                <div class="inner">
                                    <div class="image">
                                        <div class="item-specific">
                                            <div class="inner">
                                                <div class="content">
                                                    <dl>
                                                        <dt>Bedrooms</dt>
                                                        <dd>2</dd>
                                                        <dt>Bathrooms</dt>
                                                        <dd>2</dd>
                                                        <dt>Area</dt>
                                                        <dd>240m<sup>2</sup></dd>
                                                        <dt>Garages</dt>
                                                        <dd>1</dd>
                                                        <dt>Build Year</dt>
                                                        <dd>1990</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/img/items/restaurant/9.jpg" alt="">
                                    </div>
                                    <div class="wrapper">
                                        <a href="item-detail.php"><h3>Saguaro Tavern</h3></a>
                                        <figure>
                                            <i class="fa fa-map-marker"></i>
                                            <span>2476 Whispering Pines Circle</span>
                                        </figure>
                                        <div class="info">
                                            <div class="rating" data-rating="4">
                                                <aside class="reviews">6 reviews</aside>
                                            </div>
                                            <div class="type">
                                                <i><img src="assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                <span>Restaurant</span>
                                            </div>
                                        </div>
                                        <!--/.info-->
                                        <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa, viverra interdum eros ut,
                                            imperdiet pellentesque mauris. Proin sit amet scelerisque risus. Donec semper semper erat ut mollis.
                                            Curabitur suscipit, justo eu dignissim lacinia, ante sapien pharetra dui...
                                        </p>
                                        <a href="item-detail.php" class="read-more icon">Read More</a>
                                    </div>
                                    <!--/.wrapper-->
                                </div>
                                <!--/.inner-->
                            </div>
                            <!--/.slide-->
                        </div>
                        <!--/.owl-carousel-->
                    </div>
                    <!--/.container-->
                </section>              
                <!--end Popular-->
                <!--bloque -->
                <section class="block equal-height">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <header><h2>Popular Listings</h2></header>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="item-detail.php">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-specific">
                                                        <span title="Bedrooms"><img src="assets/img/bedrooms.png" alt="">2</span>
                                                        <span title="Bathrooms"><img src="assets/img/bathrooms.png" alt="">2</span>
                                                        <span title="Area"><img src="assets/img/area.png" alt="">240m<sup>2</sup></span>
                                                        <span title="Garages"><img src="assets/img/garages.png" alt="">1</span>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </div>
                                                    <img src="assets/img/items/1.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="item-detail.php"><h3>Steak House Restaurant</h3></a>
                                                <figure>63 Birch Street</figure>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><img src="assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                        <span>Restaurant</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    <!--/.col-sm-4-->
                                    <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="item-detail.php">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <img src="assets/img/items/2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="item-detail.php"><h3>Benny’s Cafeteria</h3></a>
                                                <figure>63 Birch Street</figure>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><img src="assets/icons/restaurants-bars/restaurants/cafetaria.png" alt=""></i>
                                                        <span>Cafeteria</span>
                                                    </div>
                                                    <div class="rating" data-rating="4"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    <!--/.col-sm-4-->
                                    <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                            <div class="image">
                                                <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                                <a href="item-detail.php">
                                                    <div class="overlay">
                                                        <div class="inner">
                                                            <div class="content">
                                                                <h4>Description</h4>
                                                                <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-specific">
                                                        <span>Daily menu from: $6</span>
                                                    </div>
                                                    <img src="assets/img/items/restaurant/9.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="wrapper">
                                                <a href="item-detail.php"><h3>Big Bamboo</h3></a>
                                                <figure>4662 Bruce Street</figure>
                                                <div class="info">
                                                    <div class="type">
                                                        <i><img src="assets/icons/restaurants-bars/restaurants/japanese-food.png" alt=""></i>
                                                        <span>Sushi</span>
                                                    </div>
                                                    <div class="rating" data-rating="3"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.item-->
                                    </div>
                                    <!--/.col-sm-4-->
                                </div>
                                <!--/.row-->

                                <!--Recent-->
                                <section id="recent">
                                    <header><h2>Recent</h2></header>
                                        <div class="item list">
                                        <div class="image">
                                            <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                            <a href="item-detail.php">
                                                <div class="overlay">
                                                    <div class="inner">
                                                        <div class="content">
                                                            <h4>Description</h4>
                                                            <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-specific">
                                                    <span title="Bedrooms"><img src="assets/img/bedrooms.png" alt="">2</span>
                                                    <span title="Bathrooms"><img src="assets/img/bathrooms.png" alt="">2</span>
                                                    <span title="Area"><img src="assets/img/area.png" alt="">240m<sup>2</sup></span>
                                                    <span title="Garages"><img src="assets/img/garages.png" alt="">1</span>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-thumbs-up"></i>
                                                </div>
                                                <img src="assets/img/items/1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="wrapper">
                                            <a href="item-detail.php"><h3>Cash Cow Restaurante</h3></a>
                                            <figure>63 Birch Street</figure>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="assets/icons/restaurants-bars/restaurants/restaurant.png" alt=""></i>
                                                    <span>Restaurant</span>
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.item-->
                                    <div class="item list">
                                        <div class="image">
                                            <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                            <a href="item-detail.php">
                                                <div class="overlay">
                                                    <div class="inner">
                                                        <div class="content">
                                                            <h4>Description</h4>
                                                            <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img src="assets/img/items/2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="wrapper">
                                            <a href="item-detail.php"><h3>Benny’s Cafeteria</h3></a>
                                            <figure>63 Birch Street</figure>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="assets/icons/restaurants-bars/restaurants/cafetaria.png" alt=""></i>
                                                    <span>Cafeteria</span>
                                                </div>
                                                <div class="rating" data-rating="4"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.item-->
                                    <div class="item list">
                                        <div class="image">
                                            <div class="quick-view"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                            <a href="item-detail.php">
                                                <div class="overlay">
                                                    <div class="inner">
                                                        <div class="content">
                                                            <h4>Description</h4>
                                                            <p>Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque massa</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-specific">
                                                    <span>Daily menu from: $6</span>
                                                </div>
                                                <img src="assets/img/items/restaurant/9.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="wrapper">
                                            <a href="item-detail.php"><h3>Big Bamboo</h3></a>
                                            <figure>4662 Bruce Street</figure>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="assets/icons/restaurants-bars/restaurants/japanese-food.png" alt=""></i>
                                                    <span>Sushi</span>
                                                </div>
                                                <div class="rating" data-rating="3"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.item-->
                                </section>
                                <!--end Recent-->
                            </div>
                            <!--/.col-md-9-->
                        </div>
                        <!--/.row-->
                    </div>
                </section>
                
                <!--end bloque -->

            </div>
            <!-- end Page Content-->
        </div>
        <!-- end Page Canvas-->
    </div>
    <!-- end Inner Wrapper --
</div>
<!-- end Outer Wrapper-->




<script>
    var _latitude = 51.541216;
    var _longitude = -0.095678;
    var jsonPath = 'assets/json/items.json.txt';

    // Load JSON data and create Google Maps

    $.getJSON(jsonPath)
        .done(function(json) {
            createHomepageGoogleMap(_latitude,_longitude,json);
        })
        .fail(function( jqxhr, textStatus, error ) {
            console.log(error);
        })
    ;

    // Set if language is RTL and load Owl Carousel

    $(window).load(function(){
        var rtl = false; // Use RTL
        initializeOwl(rtl);
    });

    autoComplete();

</script>


<?php require RUTA_APP.'\views\inc\footer.php'; ?>
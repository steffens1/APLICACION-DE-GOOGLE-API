<!-- Outer Wrapper-->
<div id="outer-wrapper">
    <!-- Inner Wrapper -->
    <div id="inner-wrapper">
        <!-- Navigation-->
            <div class="header">
                <div class="wrapper">
                    <div class="brand">
                        <a href="vista/index-directory.php"><img src="img/logo.png" alt="logo"></a>
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
    var jsonPath = 'json/items.json.txt';
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
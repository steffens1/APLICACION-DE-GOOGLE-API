
<!-- Outer Wrapper-->
<div id="outer-wrapper">
    <!-- Inner Wrapper -->
    <div id="inner-wrapper">
        <!-- Navigation-->
            <div class="header">
                <div class="wrapper">
                    <div class="brand">
                        <a href="Home"><img src="<?php echo RUTA_URL ?>img/logo.png" alt="logo"></a>
                    </div>

                    <nav class="navigation-items">
                        <div class="wrapper">
                            <ul class="main-navigation navigation-top-header"></ul>
                            <ul class="user-area">
                                <li><a href="<?php  RUTA_URL?>Sesion/Login">
                            <?php

                                if($_SESSION['dni']){
                                    echo $dato;
                                }
                                else{
                                    echo "Iniciar Sesion";
                                }

                            ?>
                            </a></li>
                            </ul>
                            <a href="<?php echo RUTA_URL?>Publicar" class="submit-item">
                                <div class="content"><span>Alquilar</span></div>
                                <div class="icon">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </a>
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
                        <!--barra de busqueda-->

                        <div class="search-bar horizontal"  >
                                <div  class="main-search border-less-inputs" >
                                    <div class="row ">
                                            <div  class ="input-group location col-md-12">
                                                <input type="text" class="form-control" id="location-usr" placeholder="ingresa una direccion">
                                                <button  style = "position:relative ; top:0px; left:30px;" type="submit" class="btn btn-default"><i class="fa fa-search" id="search-location" ></i></button>
                                            </div>
                                            
                                    </div>
                                    <!-- /.input-row -->
                                </div>
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
    <!-- end Inner Wrapper -->
</div>
<!-- end Outer Wrapper-->

<script>
    
    
      $(document).ready(function(){
        var _latitude  = -15.832706;
        var _longitude =  -70.022922;
        var jsonPath   = '<?php  echo RUTA_URL?>Home/consulta';
        
        // Load JSON data and create Google Maps
        $.getJSON(jsonPath)     
            .done(function(json) {
                   console.log(json); 
                CrearPaginaInicioGoogleMap(_latitude,_longitude,json);
                
            })
            .fail(function( jqxhr, textStatus, error ){
                console.log(error);
            });

        // Set if language is RTL and load Owl Carousel
        $(window).load(function(){
            var rtl = false; // Use RTL
            initializeOwl(rtl);
        });
       
       // autoComplete();

      })
    
</script>

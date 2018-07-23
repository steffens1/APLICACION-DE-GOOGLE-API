<!-- Outer Wrapper-->
<div id="outer-wrapper">
    <!-- Inner Wrapper -->
    <div id="inner-wrapper">
        <!-- Navigation-->
        <div class="header">
            <div class="wrapper">
                <div class="brand">
                    <a href="index-directory.html"><img src="<?php echo RUTA_URL?>img/logo.png" alt="logo"></a>
                </div>
                <nav class="navigation-items">
                    <div class="wrapper">
                        <ul class="main-navigation navigation-top-header"></ul>
                        <ul class="user-area">
                            <li><a href="sign-in.html"><?php echo $dato->nombre ?></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- end Navigation-->
        <!-- Page Canvas-->
        <div id="page-canvas">
            <!--Page Content-->
            <div id="page-content">
                <section class="container">
                    <div class="row">
                        <!--Content-->
                        <div class="col-md-12">
                            <header>
                                <h1 class="page-title">Publicar</h1>
                            </header>

                            <form id="form-submit" role="form" method="post" action="<?php echo RUTA_URL?>Publicar/publicar_nuevo"  enctype="multipart/form-data">
                                
                                <section>
                                    <div class="form-group large">
                                        <label for="title">Nombre</label>
                                        <input type="text" class="form-control" id="title" REQUIRED name="titulo">
                                    </div>
                                </section>


                                <section>
                                    <h3>General</h3>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <label for="state">Precio</label>
                                                <input type="text" class="form-control" REQUIRED  id="precio" name="precio">
                                            </div>
                                        </div>
                                        <!--/.col-md-4-->
                                        <div class="col-md-4 col-sm-4">
                                            <div class="row">
                                                    <div class="form-group">
                                                        <label for="city">Categoria </label>
                                                        <input type="text" class="form-control"  REQUIRED id="categoria" name="categoria">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.col-md-4-->
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <label for="street">Fecha de construccion</label>
                                                <input type="text" class="form-control" REQUIRED  id="fecha_construct" name="fecha">
                                            </div>
                                        </div>
                                        <!--/.col-md-4-->
                                    </div>
                                    <!--/.row-->
                                </section>


                                <section>
                                    <h3>Direccion</h3>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <label for="state">Estado</label>
                                                <input type="text" class="form-control" REQUIRED  id="state" name="estado">
                                            </div>
                                        </div>
                                        <!--/.col-md-4-->
                                        <div class="col-md-4 col-sm-4">
                                            <div class="row">
                                                    <div class="form-group">
                                                        <label for="city">Ciudad </label>
                                                        <input type="text" class="form-control"  REQUIRED id="city" name="ciudad">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.col-md-4-->
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <label for="street">Direccion</label>
                                                <input type="text" class="form-control" REQUIRED  id="street" name="direccion">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <center>
                                                <button type = button onclick= "redibujar();"  class="btn btn-default pull-right" >buscar</button>
                                            </center>
                                        </div>
                                        <!--/.col-md-4-->
                                    </div>
                                    <!--/.row-->
                                </section>

                            
                                <section>
                                    <h3>Map</h3>
                                    <div id="map-simple" class="map-submit"></div>
                                </section>
                                
                                <section>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="latitud-ingresar" name="latitudx">
                                            </div>
                                        </div>
                                        <!--/.col-md-4-->

                                        <div class="col-md-4 col-sm-4">
                                            <div class="row">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="longitud-ingresar" name="longitudx">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.row-->
                                </section>

                                <section>
                                    <h3>Servicios</h3>
                                    <ul class="list-unstyled checkboxes">
                                        <li><div class="checkbox"><label><input type="checkbox" name="features[]" value="1">Cable</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox" name="features[]" value="2">Acepta tarjeta</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox" name="features[]" value="3">Wi-Fi</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox" name="features[]" value="4">Piscina</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox" name="features[]" value="5">Saloon</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox" name="features[]" value="6">Limpieza</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox" name="features[]" value="7">Terrazas</label></div></li>
                                        <li><div class="checkbox"><label><input type="checkbox" name="features[]" value="8">Comida</label></div></li>
                                    </ul>
                                
                                </section>
                                
                                <!--Gallery-->

                                <section>
                                    <h3>Galeria</h3>    
                                        <input name="fotos" REQUIRED type="file" >
                                </section>

                                <section>
                                    
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="state">Descripcion</label>
                                                <textarea class="form-control" id="about-me" REQUIRED rows="5" name="descripcion" > </textarea>
                                            </div>
                                        </div>

                                        <!--/.col-md-4-->
                                    </div>
                                    <!--/.row-->
                                </section>

                                <!--end Gallery-->
                                <hr>
                                <section>   
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default pull-right" id="submit">Publicar</button>
                                    </div>
                                    <!-- /.form-group -->
                                </section>
                            </form>
                            <!--/#form-submit-->
                        </div>
                        <!--/.col-md-9-->
                    </div>
                </section>
            </div>
            <!-- end Page Content-->
        </div>
        <!-- end Page Canvas-->
    </div>
    <!-- end Inner Wrapper -->
</div>
<!-- end Outer Wrapper-->


<script>

   $(window).load(function(){
        var direccion ; var resul;
        var dir;
            
            $.ajax({
                url: "Publicar/location",
                success: function(result){
                    direccion = result
                    console.log(result);
                    $.ajax({
                        url: "https://maps.googleapis.com/maps/api/geocode/json?address="+direccion+"&key=AIzaSyCVIDoPcGW-nEx3tPx4iH3VYETVgfMy-YU",
                        success: function(sa){
                            dir= sa.results[0].geometry.location; 
                            var _latitude = dir.lat;
                            var _longitude = dir.lng;
                            var draggableMarker = true;
                            simpleMap(_latitude, _longitude,draggableMarker);                   
                        }
                    });
                }
            });
      });

      function redibujar(){
            var direccion= $("#street").val() + " " + $("#city").val(); 
            console.log(direccion);
            var dir;

                    $.ajax({
                        url: "https://maps.googleapis.com/maps/api/geocode/json?address="+direccion+"&key=AIzaSyCVIDoPcGW-nEx3tPx4iH3VYETVgfMy-YU",
                        success: function(sa){
                            dir= sa.results[0].geometry.location; 
                            var _latitude = dir.lat;
                            var _longitude = dir.lng;
                            var draggableMarker = true;
                            simpleMap(_latitude, _longitude,draggableMarker);                   
                        }
                    });

        }
      autoComplete();

</script>
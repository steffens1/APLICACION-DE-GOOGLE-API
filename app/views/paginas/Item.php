<body onunload="" class="page-subpage page-item-detail " id="page-top">
<div id="outer-wrapper">
    <!-- Inner Wrapper -->
    <div id="inner-wrapper">
        <!-- Navigation-->
        <div class="header">
            <div class="wrapper">
                <div class="brand">
                        <a href="<?php echo RUTA_URL?>"><img src="<?php echo RUTA_URL?>img/logo.png" alt="logo"></a>
                </div>
                <nav class="navigation-items">
                    <div class="wrapper">
                        <ul class="main-navigation navigation-top-header"></ul>
                        <ul class="user-area">
                        <li><a href="
                        <?php
                                if(!empty($_SESSION['dni'])){
                                      echo RUTA_URL.'Sesion/Perfil">';
                                }
                                else{
                                    echo  RUTA_URL.'Sesion">';
                                } 

                                if(!empty($_SESSION['dni'])){
                                    echo $dato1->nombre;
                                    }
                                else{
                                    echo "Iniciar Sesion";
                                }
                        ?>
                      </a>
                    </li>
                      </ul>
                        <a href="<?php echo RUTA_URL?>Publicar" class="submit-item">
                            <div class="content"><span>Publicar</span></div>
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


            <!--Page Content-->
            <div id="page-content">

                <div id="map-detail"></div>
                <section class="container">
                    <div class="row">
                        <!--Item Detail Content-->
                        <div class="col-md-9">

                            <section class="block" id="main-content">
                                <header class="page-title">
                                    <div class="title">
                                        <h1><?php echo $dato2->nombre; ?></h1>
                                        <figure><?php echo $dato2->location; ?></figure>
                                    </div>
                                    <div class="info">
                                        <div class="type">
                                            <i><img src="<?php echo RUTA_URL?>icons/store/apparel/umbrella-2.png" alt=""></i>
                                            <span><?php echo $dato2->category; ?></span>
                                        </div>
                                    </div>
                                </header>


                                <div class="row">
                                    <!--Detail Sidebar-->
                                    <aside class="col-md-4 col-sm-4" id="detail-sidebar">
                                        <!--Contact-->
                                        <section>
                                            <header><h3>Contacto</h3></header>
                                            <address>
                                                <div><?php echo $dato1->nombre ?></div>
                                                <div><?php echo $dato1->direccion ?></div>
                                                <div><?php echo $dato1->estado . " , ".$dato1->ciudad ; ?></div>
                                                <figure>

                                                    <div class="info">
                                                        <i class="fa fa-phone"></i>
                                                        <span><?php echo $dato1->telefono ?></span>
                                                    </div>
                                                    <div class="info">
                                                        <i class="fa fa-globe"></i>
                                                        <a href="#"> <?php echo $dato1->correo ?> </a>
                                                    </div>
                                                </figure>
                                            </address>
                                        </section>
                                        <!--end Contact-->

                                    </aside>
                                    <!--end Detail Sidebar-->
                                    <!--Content-->
                                    <div class="col-md-8 col-sm-8">
                                        <section>
                                        <div class="title">
                                            <center>
                                                <h1 class="h1" ><?php echo $dato2->nombre; ?></h1>
                                            </center>
                                            
                                        </div>

                                            <article class="item-gallery">
                                                        <div class="owl-carousel item-slider">
                                                        <?php 
                                                            $counter =0;
                                                            foreach( $dato as $aux) { 
                                                        ?>
                                                            <div class="owl-item <?php if($counter<=1) echo "active" ?>"><img src="<?php echo RUTA_URL.$aux->path; ?>" data-hash="<?php echo $aux->id; ?>" alt=""></div>
                                                        <?php 
                                                            $counter++;
                                                        }?>
                                                    
                                                        </div>
                                                        <!-- /.item-slider -->
                                                        <div class="thumbnails">
                                                            <span class="expand-content btn framed icon" data-expand="#gallery-thumbnails" >Mas<i class="fa fa-plus"></i></span>
                                                            <div class="expandable-content height collapsed show-150" id="gallery-thumbnails">
                                                                <div class="content">
                                                                    <?php 
                                                                        $counter =0;
                                                                        foreach( $dato as $aux) {
                                                                    ?>
                                                                    <a href="#<?php echo $aux->id ?>"  class ="<?php if($counter<=1) echo "active" ?>" id="thumbnail-<?php echo $aux->id; ?>" ><img src="<?php echo RUTA_URL.$aux->path; ?>" alt=""></a>
                                                                    <?php 
                                                                        $counter++;
                                                                    }?> 
                                                                </div>
                                                            </div>
                                                        </div>
                                            </article>

                                            <!-- /.item-gallery -->
                                            <article class="block">
                                                <header><h2>Descripcion </h2></header>
                                                <p>
                                                        <?php echo $dato2->descripcion; ?>
                                                </p>
                                            </article>

                                            <article class="block">
                                                <header><h2>Servicios</h2></header>
                                                <ul class="bullets">
                                                        <?php foreach( $dato3 as $aux) { ?>
                                                            <li> <?php echo $aux->nombre; ?></li>
                                                        <?php }  ?>
                                                </ul>
                                            </article>
                                        </section>
                                    </div>
                                    <!-- /.col-md-8-->
                                </div>
                                <!-- /.row -->
                            </section>
                            <!-- /#main-content-->
                        </div>
                        <!-- /.col-md-8-->
                    </div><!-- /.row-->
                </section>
                <!-- /.container-->
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
        var itemID = <?php echo $dato2->id;?>;
        var urls  = '<?php echo RUTA_URL;?>';
        var urls = urls +'Item/ajaxDetalle/'+ itemID;
        console.log(itemID);
      $.getJSON(urls)
            .done(function(json) {
                    //console.log(json);
                    $.each(json, function(a) {
                        if( json[a].id == itemID) {
                            console.log(json[a]);
                            itemDetailMap(json[a]);
                        }
                    });
            })
            .fail(function( jqxhr, textStatus, error ) {
                console.log(error);
            });

        var rtl = false; //
        initializeOwl(rtl);
    });

</script>
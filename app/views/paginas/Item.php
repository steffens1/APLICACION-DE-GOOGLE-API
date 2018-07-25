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
                            <li><a href="<?php echo RUTA_URL?>Login">Iniciar Sesion</a></li>
                            <li><a href="<?php echo RUTA_URL?>Registrar"><strong>Registrar</strong></a></li>
                        </ul>
                        <a href="submit.html" class="submit-item">
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
                                        <h1></h1>
                                        <figure><?php echo $dato2->nombre; ?></figure>
                                    </div>
                                    <div class="info">
                                        <div class="type">
                                            <span><?php echo $dato2->category; ?> </span>
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

                                        <!--Contact Form-->
                                        <section>   
                                            <header><h3>Formulario de Contacto</h3></header>
                                            <figure>
                                                <form id="item-detail-form" role="form" method="post" action="?">
                                                    <div class="form-group">
                                                        <label for="item-detail-name">Nombre</label>
                                                        <input type="text" class="form-control framed" id="item-detail-name" name="item-detail-name" required="">
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label for="item-detail-email">Correo</label>
                                                        <input type="email" class="form-control framed" id="item-detail-email" name="item-detail-email" required="">
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label for="item-detail-message">Mensaje</label>
                                                        <textarea class="form-control framed" id="item-detail-message" name="item-detail-message"  rows="3" required=""></textarea>
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <button type="submit" class="btn framed icon">Enviar<i class="fa fa-angle-right"></i></button>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </form>
                                            </figure>
                                        </section>
                                        <!--end Contact Form-->
                                    </aside>
                                    <!--end Detail Sidebar-->
                                    <!--Content-->
                                    <div class="col-md-8 col-sm-8">
                                        <section>
                                            <article class="item-gallery">
                                                <div class="owl-carousel item-slider">
                                                     <?php foreach( $dato as $aux) { ?>
                                                    <div class="slide"><img src="<?php echo RUTA_URL.$aux->path; ?>" data-hash="1" alt=""></div>
                                                    <?php }  ?>
                                               </div>
                                                <!-- /.item-slider -->
                                                <div class="thumbnails">
                                                    <span class="expand-content btn framed icon" data-expand="#gallery-thumbnails" >More<i class="fa fa-plus"></i></span>
                                                    <div class="expandable-content height collapsed show-70" id="gallery-thumbnails">
                                                        <div class="content">
                                                        <?php foreach( $dato as $aux) { ?>
                                                        <a href="#1" id="thumbnail-1" class="active"><img src="<?php echo RUTA_URL.$aux->path; ?>" alt=""></a>
                                                        <?php }  ?> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <!-- /.item-gallery -->
                                            <article class="block">
                                                <header><h2>Descripcion</h2></header>
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

                                        <!--Review Form-->
                                        <section id="write-review">
                                            <header>
                                                <h2>Write a Review</h2>
                                            </header>
                                            <form id="form-review" role="form" method="post" action="?" class="background-color-white">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="form-review-name">Nombre</label>
                                                            <input type="text" class="form-control" id="form-review-name" name="form-review-name" required="">
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label for="form-review-email">Correo</label>
                                                            <input type="email" class="form-control" id="form-review-email" name="form-review-email" required="">
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label for="form-review-message">Mensaje</label>
                                                            <textarea class="form-control" id="form-review-message" name="form-review-message"  rows="3" required=""></textarea>
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-default">Submit Review</button>
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <div class="col-md-4">
                                                        <aside class="user-rating">
                                                            <label>Value</label>
                                                            <figure class="rating active" data-name="value"></figure>
                                                        </aside>
                                                        <aside class="user-rating">
                                                            <label>Service</label>
                                                            <figure class="rating active" data-name="score"></figure>
                                                        </aside>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- /.main-search -->
                                        </section>
                                        <!--end Review Form-->
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
        console.log(itemID);

        $.getJSON('Item/ajaxDetalle/'+itemID)
            .done(function(json) {
                    $.each(json, function(a) {
                        if( json[a].id == itemID ) {
                            console.log(json[a]);
                            itemDetailMap(json[a]);
                        }
                    });
            })
            .fail(function( jqxhr, textStatus, error ) {
                console.log(error);
            })
        ;
        $(window).load(function(){
            var rtl = false; // Use RTL
            initializeOwl(rtl);
        });
    });
    
</script>
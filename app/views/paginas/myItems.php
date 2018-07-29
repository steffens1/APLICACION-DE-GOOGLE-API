<body onunload="" class="page-subpage page-my-items " id="page-top">
<div id="outer-wrapper">
    <!-- Inner Wrapper -->
    <div id="inner-wrapper">
        <!-- Navigation-->
        <div class="header">
            <div class="wrapper">
                <div class="brand">
                    <a href="<?php echo RUTA_URL?>"><img src="<?php echo RUTA_URL?>img/logo.png" alt="logo"></a>
                </div>
                <div class="navigation-items">
                    <div class="wrapper">
                        <ul class="user-area">
                            <li><a href="<?php echo RUTA_URL?>Sesion/Perfil"><strong> <?php echo $dato->nombre ?></strong></a></li>
                            <li><a href="<?php echo RUTA_URL?>Sesion/myItems">Mis Items</a></li>
                        </ul>
                        <a href="<?php echo RUTA_URL?>Publicar" class="submit-item">
                            <div class="content"><span>Publicar</span></div>
                            <div class="icon">
                                <i class="fa fa-plus"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Navigation-->
        <!-- Page Canvas-->
        <div id="page-canvas">
            <!--Off Canvas Navigation-->
            <nav class="off-canvas-navigation">
                <header>Navigation</header>
                <div class="main-navigation navigation-off-canvas"></div>
            </nav>
            <!--end Off Canvas Navigation-->

            <!--Page Content-->
            <div id="page-content">
                <section class="container">
                <header>
                        <ul class="nav nav-pills">
                            <li> <a href="<?php echo RUTA_URL?>Sesion/Perfil/"><h1 class="page-title"><?php echo $dato->nombre ?></h1></a></li>
                            <li class="active"><a href="<?php echo RUTA_URL?>Sesion/myItems"><h1 class="page-title">Mis Items</h1></a></li>
                        </ul>
                </header>

                    <div class="row"></div>
                        <div class="col-md-9 col-sm-9">
                            <section id="items">
                                <?php foreach($dato1 as $aux){ ?>
                                    <div class="item list admin-view">
                                        <div class="image">
                                            <div class="quick-view" data-toggle="modal" data-target="#modal-bar"><i class="fa fa-eye"></i><span>Quick View</span></div>
                                            <a href="<?php echo RUTA_URL.'Item/detalle/'.$aux->id ?>">
                                                <div class="icon">
                                                    <i class="fa fa-thumbs-up"></i>
                                                </div>
                                                <img src="<?php echo RUTA_URL.$aux->path; ?>" alt="">
                                            </a>
                                        </div>

                                        <div class="wrapper">
                                            <a href="<?php echo RUTA_URL.'Item/detalle/'.$aux->id ?>"><h3><?php echo $aux->nombre; ?></h3></a>
                                            <figure><?php echo $aux->location ?></figure>
                                            <div class="info">
                                                <div class="type">
                                                    <i><img src="<?php echo RUTA_URL.$aux->type_icon; ?>" alt=""></i>
                                                    <span><?php echo $aux->type ;?></span>
                                                </div>
                                                <div class="rating" data-rating="<?php echo $aux->rainting ;?>"></div>
                                            </div>
                                        </div>

                                        <div class="ribbon approved">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                <?php }?>
                                <!-- /.item-->
                            </section>
                        </div>
                    </div>
                </section>
            </div>
            <!-- end Page Content-->
        </div>
        <!-- end Page Canvas-->
    </div>
    <!-- end Inner Wrapper -->
</div>
<body onunload="" class="page-subpage page-sign-in " id="page-top"><!-- Outer Wrapper-->
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
                            <li><a href="<?php  echo RUTA_URL?>Registrar"><strong>Registrar</strong></a></li>
                        </ul>
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
                <section class="container">
                    <div class="block">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                                <header>
                                    <h1 class="page-title">Iniciar Sesion</h1>
                                </header>
                                <hr>
                                <form role="form" id="form-sign-in-account" method="post" action="<?php echo RUTA_URL ?>Sesion/validar">
                                    <div class="form-group">
                                        <label for="form-sign-in-email">Email:</label>
                                        <input type="email" class="form-control" id="form-sign-in-email" name="email" required>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="form-sign-in-password">Contraseña:</label>
                                        <input type="password" class="form-control" id="form-sign-in-password" name="contra" required>
                                    </div><!-- /.form-group -->
                                    <div class="form-group clearfix">
                                        <button type="submit" class="btn pull-right btn-default" id="account-submit">Ingresar</button>
                                    </div><!-- /.form-group -->
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.block-->
            </div>
            <!-- end Page Content-->
        </div>
        <!-- end Page Canvas-->
    </div>
    <!-- end Inner Wrapper -->
</div>
<!-- end Outer Wrapper-->
<!-- Outer Wrapper-->
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
            <!--Page Content-->
            <div id="page-content">
                <section class="container">
                    <header>
                        <ul class="nav nav-pills">
                            <li class="active"> <a href="<?php echo RUTA_URL?>Sesion/Perfil/"><h1 class="page-title"><?php echo $dato->nombre ?></h1></a></li>
                            <li><a href="<?php echo RUTA_URL?>Sesion/myItems"><h1 class="page-title">Mis Items</h1></a></li>
                        </ul>
                    </header>

                    <div class="row">
                        <div class="col-md-9">
                            <form id="form-profile" role="form" method="post" action="<?php echo RUTA_URL?>Sesion/Actualiza" enctype="multipart/form-data">
                                <div class="row">
                                    <!--Profile Picture-->
                                    <div class="col-md-3 col-sm-3">
                                        <section>
                                            <h3><i class="fa fa-image"></i>Foto Perfil</h3>
                                            <div id="profile-picture" class="profile-picture ">
                                                  <img src="<?php echo RUTA_URL.$dato->foto ?>" alt="">
                                            </div>
                                        </section>
                                    </div>
                                    <!--/.col-md-3-->

                                    <!--Contact Info-->
                                    <div class="col-md-9 col-sm-9">
                                        <section>
                                            <h3><i class="fa fa-user"></i>Informacion Personal</h3>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group">
                                                        <label for="name">Nombre</label>
                                                        <input type="text" class="form-control" id="name" name="nombre" value="<?php echo $dato->nombre ?>">
                                                    </div>
                                                    <!--/.form-group-->
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group">
                                                        <label for="name">Apellido</label>
                                                        <input type="text" class="form-control" id="name" name="apellido" value="<?php echo $dato->apellido ?>">
                                                    </div>
                                                    <!--/.form-group-->
                                                </div>
                                                <!--/.col-md-3-->
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email" name="correo" value="<?php echo $dato->correo ?>">
                                                    </div>
                                                    <!--/.form-group-->
                                                </div>


                                                <!--/.col-md-3-->
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="mobile">Telefono</label>
                                                        <input type="text" class="form-control" id="mobile" name="telefono" pattern="\d*" value="<?php echo $dato->telefono ?>">
                                                    </div>
                                                    <!--/.form-group-->
                                                </div>
                                            </div>
                                        </section>
                                        <section>
                                            <h3><i class="fa fa-map-marker"></i>Direccion</h3>
                                            <div class="form-group">
                                                <label for="state">Estado</label>
                                                <input type="text" class="form-control" id="state" name="estado" value="<?php echo $dato->estado ?>">
                                            </div>
                                            <!--/.form-group-->
                                            <div class="form-group">
                                                <label for="city">Ciudad</label>
                                                <input type="text" class="form-control" id="city" name="ciudad" value="<?php echo $dato->ciudad ?>">
                                            </div>
                                            <!--/.form-group-->
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="form-group">
                                                        <label for="street">Direccion</label>
                                                        <input type="text" class="form-control" id="street" name="direccion" value="<?php echo $dato->direccion ?>">
                                                    </div>
                                                    <!--/.form-group-->
                                                </div>
                                            </div>
                                        </section>
                                        <section>
                                            <h3><i class="fa fa-info-circle"></i>Acerca de mi</h3>
                                            <div class="form-group">
            
                                                <div class="form-group">
                                                    <textarea class="form-control" id="about-me" rows="3" name="acerca_yo" required>
                                                    <?php echo $dato->acerca_yo ?>
                                                    </textarea>
                                                </div>
                                                <!--/.form-group-->
                                            </div>
                                            <!--/.form-group-->
                                        </section>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-large btn-default" id="submit">Guardar Cambios</button>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!--/.col-md-6-->
                                </div>
                            </form>
                        </div>
                        <!--Password-->
                        <div class="col-md-3 col-sm-9">
                            <h3><i class="fa fa-asterisk"></i>Cambiar Contraseña</h3>
                            <form class="framed" id="form-password" role="form" method="post" action="<?php echo RUTA_URL?>Sesion/ActualizaContrasena" >
                                <div class="form-group">
                                    <label for="current-password">Contraseña actual</label>
                                    <input type="password" class="form-control" id="current-password" name="current-password">
                                </div>
                                <!--/.form-group-->
                                <div class="form-group">
                                    <label for="new-password">Nueva Contraseñ4</label>
                                    <input type="password" class="form-control" id="new-password" name="new-password">
                                </div>
                                <!--/.form-group-->
                                <div class="form-group">
                                    <label for="confirm-new-password">Confirma Nueva Contraseña</label>
                                    <input type="password" class="form-control" id="confirm-new-password" name="confirm-new-password">
                                </div>
                                <!--/.form-group-->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Cambia Contraseña</button>
                                </div>
                                <!-- /.form-group -->
                            </form>
                        </div>
                        <!-- /.col-md-3-->
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
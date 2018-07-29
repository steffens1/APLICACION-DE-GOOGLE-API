<body onunload="" class="page-subpage page-register " id="page-top">
<div id="outer-wrapper">
    <!-- Inner Wrapper -->
    <div id="inner-wrapper">
        <!-- Navigation-->
        <div class="header">
            <div class="wrapper">
                <div class="brand">
                    <a href="<?php echo RUTA_URL ?>"><img src="<?php echo RUTA_URL ?>img/logo.png" alt="logo"></a>
                </div>
            </div>
        </div>
        <!-- end Navigation-->
        <!-- Page Canvas-->
        <div id="page-canvas">
            <!--Off Canvas Navigation-->

            <!--end Off Canvas Navigation-->

            <!--Page Content-->
            <div id="page-content">
                <section class="container">
                    <div class="block">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                                <header>
                                    <h1 class="page-title">Registrar</h1>
                                </header>

                                <hr>
                                <form role="form" id="form-register" method="post" action="<?php echo RUTA_URL ?>Registrar/registrar" onSubmit="return validar_x()">
                                    <div class="form-group">
                                        <label for="form-register-full-name">Nombre</label>
                                        <input type="text" class="form-control" id="form-register-full-name" name="Nombre" required>
                                        <label for="form-register-full-name">Apellido</label>
                                        <input type="text" class="form-control" id="form-register-full-name" name="Apellido" required>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="form-register-email">Dni</label>
                                        <input type="email" class="form-control" id="form-register-email" name="dni" required>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="form-register-email">Correo</label>
                                        <input type="email" class="form-control" id="form-register-email" name="Correo" required>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="form-register-password">Contraseña</label>
                                        <input type="password" class="form-control" id="con1" name="Contrasena" required>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="form-register-confirm-password">Confirma Contraseña</label>                                     
                                        <input type="password" class="form-control" id="con2" name="c-Contrasena" required>
                                        <label id ="mensaje"> </label>
                                    </div><!-- /.form-group -->
                                    <div class="form-group clearfix">
                                        <button type="submit" class="btn pull-right btn-default" id="account-submit">Crear cuenta</button>
                                    </div><!-- /.form-group -->
                                </form>

                            </div>d
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

<script>
    function validar_x(){
        var x   =  $("#con1").val();
        var y   = $("#con2").val();

        if(x != y){
            alert("Las contraseñas no coinciden")
            return false;
        }
        else 
        {
            return true;
        }
    }
</script>
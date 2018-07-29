<html>
<head>
    <title></title>
</head>
<body>

<div class="modal-window fade_in">
    <div class="modal-wrapper"><h2> <?php echo $dato2->nombre ?></h2>
        <figure> <?php echo $dato2->location ?></figure>
        <div class="rating" data-rating="<?php echo $dato2->rainting ?>"></div>
        <div class="modal-body">
            <div class="gallery">
                <div class="image">
                    <div class="price"><?php echo $dato2->precio ?></div>
                    <div class="type"><i><img src="<?php echo RUTA_URL.$dato2->type_icon ?>" alt=""></i><span><?php echo $dato2->category ?></span></div>
                    <div class="owl-carousel gallery">
                        <?php   foreach( $dato as $aux){  ?>
                            <img src=" <?php echo RUTA_URL.$aux->path; ?>" >
                        <?php }?>
                    </div>
                </div>
                <div class="features"><h3>Servicios</h3>
                    <ul class="bullets">
                        <?php foreach( $dato3 as $aux){  ?>
                            <li><?php echo  $aux->nombre; ?></li>
                        <?php }?>
                    </ul>
                </div>
            </div>
            <div class="modal-content">
                <section><h3>Descripcion</h3>
                    <p>
                         <?php echo  $dato2->descripcion; ?>
                    </p>
                </section>
                <section><h3>Habitaciones</h3>
                    <dl>
                    <?php   foreach( $dato1 as $aux){  ?>
                            <dt><?php echo  $aux->nombre; ?></dt>
                            <dd><?php echo  $aux->cantidad; ?></dd>
                    <?php }?>
                    </dl>
                </section>
                <a href="<?php echo RUTA_URL.'Item/detalle/'.$dato2->id; ?>" class="btn btn-default btn-large">ver mas detalles</a></div>
        </div>
        <div class="modal-close"><img src="img/close.png"></div>
    </div>
    <div class="modal-background fade_in"></div>
</div>

<script>
    var _rtl = false;
    drawOwlCarousel(_rtl);
    //rating('.modal-window');
    $('.modal-window .modal-background, .modal-close').live('click',  function(e){
        $('.modal-window').addClass('fade_out');
        setTimeout(function() {
            $('.modal-window').remove();
        }, 300);
    });
</script>

</body>
</html>
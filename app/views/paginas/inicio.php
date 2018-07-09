<?php require RUTA_APP.'/views/inc/header_test.php'; ?>
<div  id="mapas-del-mundo">
</div>

<script> 
    $.ajax({
	url:"inicio/consulta",
	method:"get",
	success: function(result){
    	console.log(JSON.parse(result));
	}
})
</script>
<?php require RUTA_APP.'/views/inc/footer_test.php'; ?>
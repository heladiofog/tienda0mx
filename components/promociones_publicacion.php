<?php
echo "<link type='text/css' href='".TIENDA."css/viewlet-slide-idc.css' rel='stylesheet' />";
?>		
<div id='contenedor_slide'>	
	<div class='list_carousel responsive'>
		<ul id='slider'>
<?php	
	/**
	 * Despliega las promociones de una publicación cuando se tienen más de un formato para dicha publicación
	 * $ofertas_publicacion: trae la descripción de la promoción y el detalle de la misma, lo cual incluye
	 * el precio y el order code type del primer produecto de la promoción, además del texto de la oferta
	 * y posibles descuentos de la promoción -esta información se trae del primer artículo de la promoción-,
	 * de aqu[i se mostrará el detalle final del contenido de la promoción. 
	 */
	/* 
	 echo "<pre>";
	 print_r($ofertas_publicacion->promociones);
	 echo "<pre>";
	*/
	//echo "get: " . $_GET['page'];
	//Para probar solo le coloque 3
	
	
	/*echo "<pre>";	######ordenamientos
			print_r($recorrer[0]);
		echo "</pre>";*/

	//for ($i = $desde; $i < $limite ; $i++) {
	foreach($ofertas_publicacion->promociones as $p){
		/*
		echo "<pre>";
		print_r($p->detalle);
		echo "</pre>";	
		*/
		//echo "<br />->".$i."<-";
		
		/*echo "<pre>";
			print_r($recorrer[$i]);
		echo "</pre>";*/
		
		//$p = $recorrer[$i];	 		
		// $p trae la información general de la promoción,
		// $p->detalle trae información más granular 
		
	/*
	 * //también se pueden ver los detalles por separado, es posible que esto cambie de acuerdo al funcionamiento final...
	 * foreach ($detalles_promociones as $detalle) {
		echo "<pre>";
		print_r((object)$detalle[0]);
		echo "</pre>";
		echo $detalle[0]->id_sitio."<br/>";
	}
	*/
		//creación de la URL para mostrar el detalle final de la promoción
		$url_detalle_promo = '';
		//los ids se recuperan desde el front controller: "publicaciones.php"
		$url_detalle_promo = site_url((isset($id_categoria) ? 'categoria/' . $id_categoria.'/' : '') . (isset($id_publicacion) ? 'publicacion/' . $id_publicacion. '/' : '') .'promocion/' . $p->detalle->id_promocion);
				
		//para pasar a pagar en la plataforma de pagos, es la acción por defecto:
		$action_pagos = ECOMMERCE."api/". $p->detalle->id_sitio . "/" . $p->detalle->id_canal . "/" . $p->detalle->id_promocion . "/pago";
		
		//para agregar la promoción al carrito:
		$carrito='';
		$carrito = "'comprar_promocion', ".$p->detalle->id_sitio.", ".$p->detalle->id_canal.", ".$p->detalle->id_promocion;
		
		$descripcion_promocion = !empty($p->detalle->descripcion_issue) ? $p->detalle->descripcion_issue : $p->detalle->descripcion_promocion; 
		//$action_carrito = TIENDA . "carrito.php?id_sitio=" . $p->detalle->id_sitio . "&id_canal=" . $p->detalle->id_canal . "&id_promocion=" . $p->detalle->id_promocion;
		//$onclick_action = "document.comprar_promocion" . $p->detalle->id_promocion . ".action='" . $action_carrito . "'; ";
		//$onclick_event = "document.comprar_promocion".$p->detalle->id_promocion.".submit()";
		
		//formulario para la promoción
		//revisar que exista la imagen en caso contrario ponemos el cuadro negro				
		if (file_exists("./ico_images/".$p->detalle->url_imagen)){
			$src = TIENDA ."ico_images/".$p->detalle->url_imagen;
		} else {
			//$src = TIENDA ."p_images/css_sprite_PortadaCaja.jpg";
			$src = TIENDA ."p_images/".$p->detalle->url_imagen;
		}
		//carga el primer valor en la columna derecha
		$inides=$descripcion_promocion;
		$initit=$p->detalle->nombre_publicacion;
		
		echo "		
			<li>
				<form id='comprar_promocion".$p->detalle->id_promocion."' name='comprar_promocion".$p->detalle->id_promocion."' action='". $action_pagos ."' method='post'>
				<input type='hidden' name='guidx' value='".API::GUIDX."' />
			    <input type='hidden' name='guidz' value='".API::guid()."' />
			    <input type='hidden' name='imagen' value='".$src."' />
			    <input type='hidden' name='descripcion' value='".$descripcion_promocion."' />
			    <input type='hidden' name='precio' value='".$p->detalle->costo."'/>
			    <input type='hidden' name='moneda' value='".$p->detalle->moneda."'/>
			    <input type='hidden' name='iva' value='".$p->detalle->taxable."' />
			    <input type='hidden' name='cantidad' value='1' />			    		    
		    		<a href='". $url_detalle_promo . "'>
		    			<div style=\"background-image: url('".$src."')\" class='roll' onmouseover=\"cambia_img(".$p->detalle->id_promocion.")\"></div>		    			
		    		</a>
		    	<div id='descripcion".$p->detalle->id_promocion."' style='display: none'>			    			    	
		      		".$descripcion_promocion."		      						
				</div>									
				<div id='titulo".$p->detalle->id_promocion."'>".$p->detalle->nombre_publicacion."</div>
	          		<input type='submit' name='btn_comprar_ahora' value=' ' style='display: none'  />";
		 ?>		      	
		      		<input type="button" id="btn_agregar_carrito" name="btn_agregar_carrito" value=" " onclick="anadir_carrito(<?php echo $carrito ;?>)" style='display: none' />
		 <?php     	
	      echo "		      	
		    </form>  
		    	
	  		</li>
	  	";
		 
		 
		 
	}
	echo "</ul>
	      <a id='prev' class='prev' href='#'></a>
		  <a id='next' class='next' href='#'></a>	
	  </div>";
?>
</div>
<?php
if (isset($initit) && isset($inides)){
?>
<div id='cuadro_der'>
	<div id="titulo_pub"><?php  echo $initit;?></div>
	<div id='temp'><?php  echo $inides?></div>	
</div>
<?php
}
?>
<div id='contenedor_slide'>		
<?php
	/*Despliega las publicaciones de una categoría*/
	/*
	echo "<pre>";
		print_r($categoria->publicaciones);
	echo "</pre>";
	*/
	
echo "		
			<div class='list_carousel responsive'>
				<ul id='slider'>";
								
				/*	<li><img src='images/cDIN.jpg'     id='1' onmouseover=\"cambia_img(this.id)\" onmouseout=\"cambia_img(this.id)\"></li>*/
				/*echo "<li>
				          <div id='69' style=\"background: url('".TIENDA."p_images/cDIN.png') no-repeat; background-color: #000; background-position: 0px -175px; background-position: 0px 0px;\" class='back_image1' onmouseover=\"cambia_img(69)\"></div>
				          <div id='o69' style=\"background: url('".TIENDA."p_images/cDIN.png') no-repeat; background-color: #000; background-position: 0px -175px; \" class='back_image2' onmouseout=\"cambia_img2(69)\"></div>				      	
				      </li>"; */
				$ini= 0;	  
				foreach ($categoria->publicaciones as $p) {
					//url de la publicación
					$url_p = '';
					if($p->formatos > 1) {
						//URL para que se vaya a la lista de promociones y se pueda filtrar por formatos y precios
						$url_p = site_url('categoria/'.$p->id_categoria.'/publicacion/ofertas/') . $p->id_publicacion;
					} else {
						//Si no trae más de un formato, ir al detalle de la promoción: suscripción / producto / PDF
						$url_p = site_url('categoria/'.$p->id_categoria.'/publicacion/detalle/') . $p->id_publicacion;
					}
					
					//revisar que exista la imagen en caso contrario ponemos el cuadro negro				
					//if(file_exists("./r_images/".$p->url_imagen)){
						$src = TIENDA ."r_images/".$p->url_imagen;
					//}
					//else{
						//$src = TIENDA ."p_images/css_sprite_PortadaCaja.jpg";
						//$src = TIENDA ."p_images/".$p->url_imagen;
					//}
					echo "	<li>
								<a href='". $url_p . "'>
									<img id='".$p->id_publicacion."' src='$src' alt='".$p->url_imagen."' onmouseover=\" cambia_img(id)\" width='179px' height='217px'>
									<div id='descripcion".$p->id_publicacion."' style='display: none'>".$p->desc_publicacion."</div>
									<div id='titulo".$p->id_publicacion."' style='display: none'>".$p->nombre_publicacion."</div>";								    
								    //<div id='".$p->id_publicacion."' style=\"background-image: url('".$src."')\" class='back_image1'></div>";																
									//echo "<img id='".$p->id_publicacion."' src='" . $src. "' class='imagen1' onmouseover=\" cambia_img(id)\" onmouseout=\" cambia_img(id)\" />";																
					echo "		</a>													
							</li>";	
					if($ini==0){
						echo "<script>cambia_img(".$p->id_publicacion.")</script>";
						$ini=1;
					}			
				}				
				
												
echo  " 		</ul>				
				<a id='prev' class='prev' href='#'></a>
				<a id='next' class='next' href='#'></a>				
			</div>";						
?>
</div>
<div id='cuadro_der'>
	<div id="titulo_pub" >titulo</div>
	<div id='temp'>nombre_publicacion</div>	
</div>
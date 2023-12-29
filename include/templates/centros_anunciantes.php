<?php
$thumbID = get_post_thumbnail_id( $post->ID );
$imgDestacada = wp_get_attachment_url( $thumbID );
$title= get_the_title();

if($imgDestacada === false){$imgDestacada = WPS_DIRECTORY_URL . 'images/escuelas.png';}
echo '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 mb-2 text-center">
<div class="card h-100 anunciante" >';
 if(get_field('asociado')== true){ 
	echo '<div class="acep"><img width="50" height="40"  src="'. WPS_DIRECTORY_URL .'/images/acep.png"  /></div>';
	 }
$image = get_field('logo_centro');  //if(get_field('anunciante')== true){
	echo  	'<div class="card-img-top mt-1"><img class="logo_centro"  src="'. $imgDestacada .'"/></div>';
	echo 	'<div class="card-body mt-0 pt-1">';
			echo 	'<h2 class="card-title"><a href="'. get_the_permalink($post->ID).'"">'.$title.'</a></h2>';
					if(get_field('niveles_centro')){
						echo '<h3 class="card-title">'.get_field('niveles_centro').'</h3>';
					}
					if(get_field('direcci')){
						echo '<p class="direccion">  <i class="bi bi-geo-alt-fill "></i>'.get_field('direcci').'<span style="font-size:8px"> '.get_field('prioridad').'</span></p>';
					}
					// if(get_field('anunciante')==true){
					if(get_field('telefono')){
						echo '<p class="tel"><a class="bi bi-telephone-fill" href="tel:'.get_field('telefono').'"> '.get_field('telefono').'</a></p>';
							}
						if(get_field('email')){
							echo '<p class="email" ><a class="bi bi-envelope-fill" href="mailto:'.get_field('email').'"> '.get_field('email').'</a></p>';
							}// }//	}				
						echo	'<div class="product-bottom-details">';
										echo '<div class="product-price">';
										if(get_field('link')){
										echo '<a href="'.get_field('link').'?utm_source=pauta_pagada&utm_medium=ActualidadEducativa" target="_blank" class="sitioweb"><span class="bi bi-link-45deg"></span> Ir al sitio web</a>';
											}
										echo '</div>';
											echo	'<div class="product-links">
													<!--<a href=""><i class="fa fa-heart"></i></a>
													<a href=""><i class="fa fa-shopping-cart"></i></a>--!>
													</div>
								</div>	
			</div>
</div></div>';



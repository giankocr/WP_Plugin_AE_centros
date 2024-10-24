<?php
$title= get_the_title();
// Convertir a minúsculas (opcional) y reemplazar los espacios por guiones
$titulo_sin_espacios = strtolower(str_replace(' ', '_', $title));
?>
<div class="no_anunciantes col-xs-12 col-sm-6 col-md-4 col-lg-2 text-center na" id="no_anunciante_<?php echo $titulo_sin_espacios; ?>">
        <h3 class="titulocentros text-center na" id="no_anunciante_<?php echo $titulo_sin_espacios; ?>"><?php the_title(); ?></h3>
		<p class="na" id="no_anunciante_<?php echo $titulo_sin_espacios; ?>"><?php 
			if(get_field('niveles_centro')){
			echo '<p class="top niveles text-center na" id="no_anunciante_'.$titulo_sin_espacios.'"><b>'.get_field('niveles_centro').'</b></p>';
			}
             if(get_field('telefono')){
                echo '<p class="padding na" id="no_anunciante_'.$titulo_sin_espacios.'"><i class="bi bi-telephone-fill tel"></i><a class="tel" id="tel_'.$title.'"  href="tel:'.get_field('telefono').'"> '.get_field('telefono').'</a></p>';
                    }
			if(get_field('direcci')){
        echo '<p class="top direccion na" id="no_anunciante_'.$titulo_sin_espacios.'"> <i class="bi bi-geo-alt-fill tel"></i>'.get_field('direcci').'</p>';
	 }?></p>
</div>

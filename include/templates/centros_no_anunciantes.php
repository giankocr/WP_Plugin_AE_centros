<div class="no_anunciantes col-xs-12 col-sm-6 col-md-4 col-lg-2 text-center">
        <h3 class="titulocentros text-center"><?php the_title(); ?></h3>
		<p class=""><?php 
			if(get_field('niveles_centro')){
			echo '<p class="top niveles text-center"><b>'.get_field('niveles_centro').'</b></p>';
			}
             if(get_field('telefono')){
                echo '<p class="padding"><i class="bi bi-telephone-fill tel"></i><a class="tel" href="tel:'.get_field('telefono').'"> '.get_field('telefono').'</a></p>';
                    }
			if(get_field('direcci')){
        echo '<p class="top direccion"> <i class="bi bi-geo-alt-fill tel"></i>'.get_field('direcci').'</p>';
	 }?></p>
</div>




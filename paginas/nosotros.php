<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';



$titulo = "Acerca de ".$nombreEmpresa;
$descripcionPagina = $descripcionNegocio;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/suscribete-a-newsletter-m.webp";



include_once 'seccion/cabecera-inicio.inc.php';
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>



<?php //body ?>

<div class="container-fluid">
		<div style="padding-top: 10em;"></div>
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6 sobreponer">
				<h1>Nuestra Historia</h1>
				<br>
				<p class="textoParrafo" style="letter-spacing: .05em;line-height: 1.25em;">
					Desde los comienzos de la humanidad, la mujer ha desempeñado un papel fundamental que nos permitió evolucionar y alcanzar hitos inimaginables a lo largo de la historia.
				</p>
				<br><br>
				<div class="imagen-background">
		            <img loading="lazy" itemprop="image" alt="imagen de portada de SYLVI" src="<?php echo RUTA_IMG_OPTIMIZADA;?>fondo/portada-inicio-pc.webp" class="imagen">
		        </div>
				<br><br>
				<p class="textoParrafo">
					Todas las mujeres tuvieron y tienen algo en común, enfrentarse a una sociedad que las infravalora y no las tiene en cuenta en la toma de decisiones, por supuesto, gracias a su lucha constante y grandes sacrificios que revolucionaron el pensamiento humano hemos visto los cambios y avances que nos han permitido conocer el mundo en el que vivimos hoy.
				</p>
				<br><br>
				<p class="textoParrafo">
					Científicas, inventoras, matemáticas, artistas, deportistas, defensoras de la libertad y hasta piratas, nos dejaron su legado para que juntos hagamos del planeta un lugar de equidad y armonía.
					<br><br>
					Inspirados por mujeres como la bióloga marina Sylvia Earle (pionera en la exploración submarina quien desde hace más de cuatro décadas ha tenido como misión descubrir, estudiar y proteger los océanos), nos interesamos por el rol elemental que todas las mujeres desempeñamos para hacer de este un mejor mundo.
					<br><br>
					Y mientras cada mujer se ocupa de enfrentar sus propios miedos y limitaciones para llevar a cabo todo lo que se propone, en SYLVI nuestras diseñadoras encontraron la mejor forma de brindar en las prendas un gran balance en el diseño, la horma, la atención al detalle en la confección y desde luego la calidad de los materiales.
					<br><br>
					Queremos que las mujeres puedan contar con prendas básicas, cómodas, con un toque de exclusividad y muchísima versatilidad. Haciendo uso del concepto "fondo de armario" para mujeres que quieren conservar un estilo sobrio y atractivo en sus outfits del trabajo, las tardes de café o cenar en una noche bohemia.
				</p>
			</div>
			<div class="col-3"></div>
		</div>
		<?php
		include_once 'seccion/copyright.inc.php';
		?>
</div>

<?php //body ?>



<?php

include_once 'seccion/doc-terminacion.inc.php';

?>
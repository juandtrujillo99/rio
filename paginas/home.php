<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/usuario/ControlSesion.inc.php';
include_once 'app/admin/ControlSesionAdmin.inc.php';
include_once 'app/blog/EscritorEntradas.inc.php';
include_once 'app/entrenamiento/EscritorEntradas.inc.php';
include_once 'app/tienda/EscritorEntradas.inc.php';

if(!ControlSesion::sesion_iniciada()) {
    Redireccion :: redirigir(RUTA_LOGIN);
} else {
	if (ControlSesion::sesion_iniciada()) {
        Conexion :: abrir_conexion();
        $id = $_SESSION['id_usuario'];
        $usuario = RepositorioUsuario :: obtener_usuario_por_id(Conexion::obtener_conexion(), $id);
    }
}

$titulo = "Inicio ".$nombreEmpresa;
$navbar = "position: relative;";

include_once 'seccion/cabecera-inicio.inc.php';
?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>sobreponer.css">
<?php
include_once 'seccion/cabecera-cierre.inc.php';
?>



<?php //body ?>

<div class="container-fluid">	

	<div class="row">


		<?php//barra de navegación moviles ?>
		<div class="barra-navegacion-m row d-block d-sm-none" style="background-color: white;<?php echo $navbar;?>">
			<div class="row">
				<div class="col-1"></div>
				<div class="col-8">
					<img loading="lazy" class="imagen" src="<?php echo RUTA_IMG_OPTIMIZADA;?>logo/horizontal.webp">
				</div>
				<div class="col-1"></div>
				<div class="col-2 barras">
					<div class="contenedor-menu">
						<div class="menu-burger"></div>
					</div>
				</div>
			</div>
			<div class="row" style="background-color:#A60303;color: white;font-size: 2em;">
				<a class="col-3 white-text waves-effect waves-light" href="<?php echo RUTA_PERFIL; ?>"><div align="center" style="padding: .5em 0;"><i class="fa-solid fa-circle-user"></i></div></a>
				<a class="col-3 white-text waves-effect waves-light" href="<?php echo RUTA_GUIA_EJERCICIOS; ?>"><div align="center" style="padding: .5em 0;"><i class="fa-solid fa-dumbbell"></i></div></a>
				<a class="col-3 white-text waves-effect waves-light" href="<?php echo RUTA_GUIA_ALIMENTACION; ?>"><div align="center" style="padding: .5em 0;"><i class="fa-solid fa-carrot"></i></div></a>
				<a class="col-3 white-text waves-effect waves-light" href="<?php echo RUTA_GUIA_SUPLEMENTACION; ?>"><div align="center" style="padding: .5em 0;"><i class="fa-solid fa-bolt"></i></div></a>				
			</div>
		</div>

		<?php
		//barra de navegación lateral izquierda ?>
		<div class="transparente"></div>
		<div class="menu row">
			<div class="row">
				<div class="col-2"></div>
				<div class="col-8">
					<img src="<?php echo RUTA_IMG_OPTIMIZADA;?>logo/cuadrado.webp" class="imagen">
				</div>
			</div>
			<div class="row">
				<br><br>
			</div>
			<a class="waves-effect waves-light" href="<?php echo RUTA_INICIO_USUARIO;?>">
				<div>
					Inicio
				</div>
			</a>
			<a class="waves-effect waves-light" href="<?php echo RUTA_BLOG;?>">
				<div>
					Newsletter
				</div>
			</a>
			<a class="waves-effect waves-light" href="<?php echo RUTA_ENTRENAR;?>">
				<div>
					Guías de ejercicio
				</div>
			</a>
			<a class="waves-effect waves-light" href="#">
				<div>
					Tienda
				</div>
			</a>
			<a class="waves-effect waves-light" href="<?php echo RUTA_LOGOUT;?>">
				<div>
					Cerrar sesión
				</div>
			</a>
			<div class="social-m" align="center">
			<p class="mayusculas">Contacto</p>
				<?php include 'seccion/social.inc.php'; ?>
			</div>
		</div>
		<?php //moviles ?>

		<?php //barra de navegacion lateral para pc ?>
		<ul id="slide-out" class="sidenav sidenav-fixed col-md-3 textoBlack">
			<li>
				<div class="user-view">
					<div class="background">
						<img class="imagen" src="<?php echo RUTA_IMG_OPTIMIZADA;?>fondo/profile-cover.webp">
					</div>
					<a href="<?php echo RUTA_PERFIL; ?>">
						<?php 
						if(file_exists(DIRECTORIO_RAIZ."/assets/fotos-perfil/usuario/".$usuario->obtener_email()."foto")) {
                        ?>
						<div class="bg-cover circle center-align" style="background-position: center center;background-color: black;background-image:url(<?php echo SERVIDOR.'/assets/fotos-perfil/usuario/'.$usuario->obtener_email()."foto"; ?>);"></div>
						<?php
					    }else{
				    	?>
						<i class="fa-solid fa-circle-user textoTitulo white-text"></i>
						<?php
				        }
				        ?>
					</a>
					<a href="<?php echo RUTA_PERFIL; ?>"><span class="white-text textoBookBold name" style="margin-top: 0;"><?php echo $usuario -> obtener_nombre(); ?> <i class="fa-solid fa-pen"></i></span></a>
					<a class="textoBook minusculas"><span class="white-text email"><?php echo $usuario -> obtener_email(); ?></span></a>
				</div>
			</li>
			<li><a class="waves-effect" href="<?php echo RUTA_GUIA_EJERCICIOS; ?>"><i class="fa-solid fa-dumbbell"></i>Mi rutina de ejercicios</a></li>
			<li><a class="waves-effect" href="<?php echo RUTA_GUIA_ALIMENTACION; ?>"><i class="fa-solid fa-carrot"></i>Mi guía de alimentación saludable</a></li>
			<li><a class="waves-effect" href="<?php echo RUTA_GUIA_SUPLEMENTACION; ?>"><i class="fa-solid fa-bolt"></i>Mi guía de suplementación</a></li>

			<li style="bottom: 10%;position: fixed;"><a href="<?php echo RUTA_LOGOUT; ?>"><i class="fa-solid fa-arrow-right-to-bracket"></i>Cerrar sesión</a></li>
		</ul>
		<?php //barra de navegacion lateral para pc ?>




		<div class="col-md-12 row">
			<div class="col-md-3 d-none d-sm-block">.</div>
			<div class="col-md-9 col-12 row" style="margin-top: 3em;">
				<div class="col-1"></div>
				<div class="col-10 row">
					<div class="col-md-6 col-12">
						<p class="textoBlack textoTitulo">newsletter</p>
					</div>
					<div class="col-md-5 col-12">
						<form role="form" id="busqueda-blog" method="post" action="<?php echo RUTA_BUSCAR_ENTRADA_BLOG; ?>">
							<div class="input-field" style="margin-top: 0;">
								<i class="material-icons prefix">search</i>
								<input type="text" id="autocomplete-input-blog" name="termino-buscar-blog" required>
								<label for="autocomplete-input-blog">¿Buscas un tema en específico?</label>					
								<input type="hidden" name="buscar-blog">
							</div>
				        </form>	
					</div>
				</div>
				<div class="col-1"></div>
				<div class="col-1"></div>
				<div class="col-10 row">					
					<div class="col-12 row">
						<?php EscritorEntradasBlog::escribir_cuatro_entradas(); ?>
					</div>
					<div class="row d-block d-sm-none center-align">
						<br>
					    <a class="btn btn-secundario-animado" href="<?php echo RUTA_BLOG; ?>"><p class="textoBold">Ver más</p></a>
					    <br><br>
					</div>
				</div>
				<div class="col-1 d-block d-sm-none"></div>
				<div class="col-1 d-none d-sm-block">
					<a href="<?php echo RUTA_BLOG; ?>">
						<i class="fa-solid fa-angle-right textoSubtitulo" style="background-color: #A60303;padding: .5em .7em;border-radius: 1em;margin-top: 4.5em;margin-left: -.5em; color: white;"></i>
					</a>
				</div>
			</div>
		</div>


		<div class="col-md-12 row">
			<div class="col-md-3 d-none d-sm-block">.</div>
			<div class="col-md-9 col-12 row" style="margin-top: 3em;">
				<div class="col-1"></div>
				<div class="col-10 row">
					<div class="col-md-6 col-12">
						<p class="textoBlack textoTitulo">Tienda Online</p>
					</div>
					<div class="col-md-5 col-12">
						<form role="form" id="busqueda-tienda" method="post" action="<?php echo RUTA_BUSCAR_ENTRADA_TIENDA; ?>">
							<div class="input-field" style="margin-top: 0;">
								<i class="material-icons prefix">search</i>
								<input type="text" id="autocomplete-input-tienda" name="termino-buscar-tienda" required>
								<label for="autocomplete-input-tienda">Busca el producto que necesites aquí</label>					
								<input type="hidden" name="buscar-tienda">
							</div>
				        </form>	
					</div>
				</div>
				<div class="col-1"></div>
				<div class="col-1"></div>
				<div class="col-10 row">					
					<div class="col-12 row">
						<?php EscritorEntradasTienda::escribir_cuatro_entradas(); ?>
					</div>
					<div class="row d-block d-sm-none center-align">
						<br>
					    <a class="btn btn-secundario-animado" href="<?php echo RUTA_TIENDA; ?>"><p class="textoBold">Ver más</p></a>
					    <br><br>
					</div>
				</div>
				<div class="col-1 d-block d-sm-none"></div>
				<div class="col-1 d-none d-sm-block">
					<a href="<?php echo RUTA_TIENDA; ?>">
						<i class="fa-solid fa-angle-right textoSubtitulo" style="background-color: #A60303;padding: .5em .7em;border-radius: 1em;margin-top: 4.5em;margin-left: -.5em; color: white;"></i>
					</a>
				</div>
			</div>
		</div>

		<div class="col-md-12 row">
			<div class="col-md-3 d-none d-sm-block">.</div>
			<div class="col-md-9 col-12 row" style="margin-top: 3em;">
				<div class="col-1"></div>
				<div class="col-10 row">
					<div class="col-md-6 col-12">
						<p class="textoBlack textoTitulo">Guía de ejercicios</p>
					</div>
					<div class="col-md-5 col-12">
						<form role="form" id="busqueda-entrenamiento" method="post" action="<?php echo RUTA_BUSCAR_ENTRADA_ENTRENAMIENTO; ?>">
							<div class="input-field" style="margin-top: 0;">
								<i class="material-icons prefix">search</i>
								<input type="text" id="autocomplete-input-entrenamiento" name="termino-buscar-entrenamiento" required>
								<label for="autocomplete-input-entrenamiento">Busca el ejercicio que necesites aquí</label>					
								<input type="hidden" name="buscar-entrenamiento">
							</div>
				        </form>	
					</div>
				</div>
				<div class="col-1"></div>
				<div class="col-1"></div>
				<div class="col-10 row">					
					<div class="col-12 row">
						<?php EscritorEntradas::escribir_cuatro_entradas(); ?>
					</div>
					<div class="row d-block d-sm-none center-align">
						<br>
					    <a class="btn btn-secundario-animado" href="<?php echo RUTA_ENTRENAR; ?>"><p class="textoBold">Ver más</p></a>
					    <br><br>
					</div>
				</div>
				<div class="col-1 d-block d-sm-none"></div>
				<div class="col-1 d-none d-sm-block">
					<a href="<?php echo RUTA_ENTRENAR; ?>">
						<i class="fa-solid fa-angle-right textoSubtitulo" style="background-color: #A60303;padding: .5em .7em;border-radius: 1em;margin-top: 4.5em;margin-left: -.5em; color: white;"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php //body ?>

<?php
include_once 'seccion/doc-terminacion.inc.php';
?>
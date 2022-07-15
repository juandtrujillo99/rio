<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';


$titulo = "Aviso legal ".$nombreEmpresa;
$navbar = "position: absolute;";
$descripcionPagina = $descripcionNegocio;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";



include_once 'seccion/cabecera-inicio.inc.php';
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';

?>



<?php //body ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-1 col-md-3"></div>
		<div class="col-10 col-md-6" style="margin-top: 4em;">
			<br><br>
			<p class="textoParrafo mayusculas" style="font-size: 3em;"><b>Términos y condiciones</b></p>
			<p class="textoParrafo1">Última actualización: 23/05/2022</p>
			<br><br>	
			<p class="textoParrafo"><b>TRATAMIENTO DE DATOS PERSONALES</b></p>		
			<p class="textoParrafo1">
				<br>
				En <?php echo $nombreEmpresa;?> implementaremos todas las acciones para el cumplimiento de la protección y tratamiento de datos personales de los que sea responsable, para proteger los derechos a la privacidad, intimidad y el buen nombre, además podemos actualizar y verificar los datos de los titulares que se encuentran en la base de datos, por esto hemos adoptado La Política de Tratamientos de Datos Personales, que serán expresadas en los siguientes términos:
				<br><br>
				<b>• Autorización:</b> previo consentimiento del titular para llevar a cabo el tratamiento de datos personales.
				<br><br>
				<b>• Base de datos:</b> conjunto de datos personales que sea objeto de tratamiento.
				<br><br>
				<b>• Datos personales:</b> cualquier información que pueda asociarse a una o varias personas naturales.
				<br><br>
				<b>• Datos sensibles:</b> cualquier información que afecta la intimidad del titular o cuyo uso indebido puede generar consecuencias negativas a este.
				<br><br>
				<b>• Encargado del tratamiento:</b> persona natural o jurídica, pública o privada, que por sí misma o en conjunto con otros, realice el tratamiento de datos personales por cuenta del responsable del tratamiento.
				<br><br>
				<b>• Responsable del tratamiento:</b> persona natural o jurídica, pública o privada, que por sí misma o en conjunto con otros, decida sobre la base de datos y/o el tratamiento de los mismos.
				<br><br>
				<b>• Titular:</b> persona natural cuyos datos personales sean objeto de tratamiento.
				<br><br>
				<b>• Tratamiento:</b> cualquier operación o conjunto de operaciones que se le realicen a los datos personales.
				<br><br>
				En <?php echo $nombreEmpresa;?> respetamos el derecho a la intimidad y a la privacidad, es por esto que nuestra política es cumplir con la legislación relacionada con el tema. Procuraremos la debida protección de los derechos de los usuarios que visitan el sitio web, en materia de privacidad y uso de los datos suministrados.
				<br><br>
				Si no estás de acuerdo con alguna política o con cualquiera de las condiciones de su uso por favor no uses ni visites nuestro sitio web.
				<br><br><br>				
			</p>
			<p class="textoParrafo"><b>ASPECTOS GENERALES</b></p>
			<p class="textoParrafo1">
				<br>
				Los siguientes son los aspectos generales que orientan la política de privacidad del sitio web www.<?php echo $urlEmpresa;?>
				<br><br>
				• Este sitio web, su información y contenido son de conocimiento público, por lo tanto la aceptación de esta política de privacidad es una condición obligatoria e indispensable para que el usuario los utilice.
				<br><br>
				• La aceptación de la presente política de privacidad por el usuario de este sitio web tendrá lugar cuando se presente lo siguiente:
				<br><br>
				<b>1.</b> Suministro de datos en los formularios de registro del sitio web.
				<br><br>
				<b>2.</b> El empleo de los mecanismos de aceptación, seguridad y acceso al sitio web que establezca <?php echo $nombreEmpresa;?>.
				<br><br>
				<b>3.</b> La consulta de cualquier contenido incorporado en el sitio web.
				<br><br>
				<b>4.</b> La utilización de cualquiera de los servicios disponibles en el sitio web.
				<br><br>
				• El usuario y visitante del sitio web acepta conocer, acatar y cumplir todas las leyes, normas y usos nacionales e internacionales relacionadas con sus obligaciones y deberes bajo la presente política de privacidad.
				<br><br><br>				
			</p>
			<p class="textoParrafo"><b>AUTORIZACIÓN</b></p>
			<p class="textoParrafo1">
				<br>
				Al usar el sitio web www.<?php echo $urlEmpresa;?> o al proporcionar información personal, nos estás autorizando a obtener, usar y divulgar tu información personal en la forma descrita en esta política.
				<br><br><br>				
			</p>
			<p class="textoParrafo"><b>SEGURIDAD DE INFORMACIÓN PERSONAL</b></p>
			<p class="textoParrafo1">
				<br>
				Tu información personal será almacenada en las bases de datos de <?php echo $nombreEmpresa;?>, en la cual mantenemos protecciones razonables para garantizar la confidencialidad, seguridad e integridad de tu información personal.
				<br><br>
				Tenemos el compromiso de proteger la totalidad de la información que almacena en sus bases de datos mediante herramientas aceptadas por la industria, con el objetivo de evitar su uso no autorizado por parte de terceros. Los equipos de almacenamiento de esta información están ubicados en lugares seguros y con acceso restringido. No nos hacemos responsables de ninguna consecuencia acerca del ingreso indebido, ilegal y fraudulento a sus bases de datos, de cualquier falla que presenten los sistemas de almacenamiento de información ni tampoco el hurto de estos.
				<br><br>
				En <?php echo $nombreEmpresa;?> sabemos que ninguna transmisión de información a través de Internet es absolutamente segura y confidencial; igualmente, se implementarán todas las herramientas de seguridad razonables aceptadas por la industria.
				<br><br><br>				
			</p>
			<p class="textoParrafo"><b>DERECHO DE ACCESO Y CORRECCIÓN</b></p>
			<p class="textoParrafo1">
				<br>
				Tienes el derecho a revisar y modificar cualquier información personal almacenada en nuestro sistema y bases de datos. Si consideras que esta información está desactualizada o es incorrecta, puedes comunicarte con nosotros a través del correo electrónico <?php echo $emailEmpresa;?>.
				<br><br><br>				
			</p>
			<p class="textoParrafo"><b>DERECHO DE CANCELACIÓN</b></p>
			<p class="textoParrafo1">
				<br>
				Tienes el derecho, en cualquier momento, de retirar tu información personal en el futuro. En dicho caso, puedes comunicarte con nosotros a través del correo electrónico <?php echo $emailEmpresa;?>
				<br id="cookies"><br><br>				
			</p>
			<p class="textoParrafo"><b>USO DE COOKIES</b></p>
			<p class="textoParrafo1">
				<br>
				Las cookies son ficheros de información que nos permiten comparar y entender cómo nuestros usuarios navegan a través de nuestro sitio, mejorando así la experiencia de compra online.
				<br><br><br>				
			</p>
			<p class="textoParrafo"><b>INFORMACIÓN DE REGISTRO</b></p>
			<p class="textoParrafo1">
				<br>
				Los siguientes son los lineamientos de nuestra política de privacidad en cuanto al recaudo, acceso y uso de la información de registro que suministra el usuario a través del sitio web www.<?php echo $urlEmpresa;?>
				<br><br>
				• Los datos o información personal o general que <?php echo $nombreEmpresa;?> recolecta de los usuarios en su sitio web, se utilizarán exclusivamente para cumplir con los propósitos del sitio web y su uso es el establecido de acuerdo a la política de privacidad.
				<br><br>
				• El usuario del sitio web, con la aceptación de esta política de privacidad, autoriza a <?php echo $nombreEmpresa;?> a realizar un tratamiento autorizado a todos los datos personales y generales suministrados a través del sitio web.
				<br><br>
				• La información de registro que se le solicita al usuario es la mínima para dar cumplimiento a las normas legales en Colombia y a los usos internacionales sobre privacidad y protección de datos en Internet.
				<br><br>
				• El usuario del sitio autoriza a <?php echo $nombreEmpresa;?> a tratar de forma automatizada la información solicitada con el fin de ofrecer un servicio más eficiente y personalizado. Así mismo, el usuario autoriza a <?php echo $nombreEmpresa;?> a divulgar, ceder o transferir sus datos personales y la información suministrada a otras organizaciones vinculadas o asociadas con <?php echo $nombreEmpresa;?>.
				<br><br>
				• La información suministrada por los usuarios en ningún caso se compartirá con terceros, exceptuando organizaciones vinculadas con <?php echo $nombreEmpresa;?>.
				<br><br>
				• <?php echo $nombreEmpresa;?> podrá realizar en cualquier momento encuestas para evaluar el tráfico del sitio y la calidad percibida.
				<br><br><br>				
			</p>
			<p class="textoParrafo"><b>Obligaciones y deberes del usuario</b></p>
			<p class="textoParrafo1">
				<br>
				Los siguientes son las obligaciones, deberes, prácticas mínimas y advertencias que deben orientar la conducta del usuario en sujeción a la presente política de privacidad:
				<br><br>
				• El usuario está de acuerdo en proporcionar a <?php echo $nombreEmpresa;?> información verdadera y completa acerca de sí mismo. Adicionalmente, el usuario se compromete en mantener actualizada esta información.
				<br><br>
				• <?php echo $nombreEmpresa;?> se reserva el derecho a retirar sin previa notificación al usuario si la información se considera nociva o perjudicial.
				<br><br>
				• <?php echo $nombreEmpresa;?> no se hace responsable por el uso que los terceros puedan hacer con la información indebidamente asegurada y protegida por el usuario
				<br><br>
				• El usuario no recaudará ni divulgará, los datos personales o la información de los demás usuarios del sitio web de <?php echo $nombreEmpresa;?>.
				<br><br>
				• El suministro de información falsa o la omisión de cualquier obligación, le da el derecho a <?php echo $nombreEmpresa;?> a terminar automáticamente, sin previo aviso y de forma definitiva, la provisión de servicios al usuario.
				<br><br><br>				
			</p>
			<p class="textoParrafo"><b>Derechos del titular de datos personales</b></p>
			<p class="textoParrafo1">
				<br>
				De acuerdo con el Art.8 de la Ley 1581 de 2012 en Colombia, la persona natural cuyos datos personales sean objeto de tratamiento tendrá los siguientes derechos:
				<br><br>
				• Conocer, actualizar y rectificar sus datos personales frente a los responsables o encargados del tratamiento.
				<br><br>
				• Ser informado con previa solicitud por el responsable o encargado del tratamiento, respecto al uso que le ha dado a sus datos personales.
				<br><br>
				• Presentar ante la Superintendencia de Industria y Comercio quejas por infracciones que se le hagan a la Ley las demás normas.
				<br><br>
				• Anular la autorización del dato cuando en el tratamiento no se respeten los principios, derechos y garantías constitucionales y legales. La supresión ocurrirá cuando la Superintendencia de Industria y Comercio haya determinado que en el tratamiento el responsable haya incurrido en conductas contrarias.
				<br><br><br>				
			</p>
			<p class="textoParrafo"><b>ATENCIÓN A PETICIONES Y RECLAMOS</b></p>
			<p class="textoParrafo1">
				<br>
				Todas las inquietudes y dudas te las responderé a través de correo electrónico, telegram o whatsapp en un período máximo de 48 horas (Lunes a Viernes). Para gestiones de quejas, peticiones y reclamos o para ejercer tus derechos, podrás comunicarte al correo electrónico <?php echo $emailEmpresa;?>
				<br><br>
				En <?php echo $nombreEmpresa;?> daremos respuesta a la persona que haga la petición, queja o reclamo dentro de los términos establecidos por la Ley 1581 de 2012, la solicitud debe contener todos los datos necesarios garantizando así una respuesta oportuna y efectiva. La solicitud para ser tramitada, debe ser presentada por el titular de los datos, o en su defecto por el representante legal; por lo tanto tenemos el derecho a verificar la identidad de la persona que realice la queja, petición o reclamo. Independientemente del mecanismo utilizado para la radicación de quejas, peticiones y reclamos, serán atendidas en un término máximo de quince días hábiles contados a partir de la fecha de su recibo. Si por algún motivo no es posible atender la consulta dentro de dicho término, se informará a la persona antes de su vencimiento, expresando los motivos de la demora y señalando la fecha en que se hará y atenderá la consulta, la cual no podrá superar los cinco días hábiles siguientes al vencimiento del primer plazo.
				<br><br>
				Las solicitudes que tengan que ver con actualización corrección, rectificación o supresión de los datos serán contestados dentro de los quince días hábiles siguientes, contados a partir del día siguiente a la fecha de su recibo. Si por algún motivo no es posible atender la solicitud dentro de dicho término, se informará a la persona antes de su vencimiento, expresando los motivos de demora y señalando la fecha en que se hará y atenderá la consulta, el cual no podrá superar los 8 días hábiles siguientes al vencimiento del primer término.
				<br id="politica-envio"><br><br>				
			</p>
			<p class="textoParrafo"><b>POLÍTICAS DE ENVÍO</b></p>
			<p class="textoParrafo1">
				<br>
				...
				<br id="politica-devolucion"><br><br>
			</p>
			<p class="textoParrafo"><b>POLÍTICAS DE DEVOLUCIÓN</b></p>
			<p class="textoParrafo1">
				<br>
				...
				<br><br><br>
			</p>
			<p class="textoParrafo"><b>CAMBIOS EN ESTA POLÍTICA O EN NUESTRAS DECLARACIONES SOBRE PRIVACIDAD</b></p>
			<p class="textoParrafo1">
				<br>
				En <?php echo $nombreEmpresa;?> nos reservamos el derecho de actualizar o modificar esta política en cualquier momento y sin ningún aviso previo. En caso de modificación de esta política o de cualquier declaración sobre privacidad, la modificación solo se aplicará a la información personal que obtengamos después de publicar la política modificada en el sitio correspondiente.
				<br><br><br>
			</p>
			<p class="textoParrafo"><b>VIGENCIA</b></p>
			<p class="textoParrafo1">
				<br>
				La política para el tratamiento de datos personales rige a partir del 23 de mayo de 2022 y tendrán una duración indefinida.
				<br><br><br>
			</p>
		</div>
		<div class="col-1"></div>
	</div>


</div>

<?php //body ?>



<?php

include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';

?>
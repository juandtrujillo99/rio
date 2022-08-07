<?php



//RepositorioAdmin: Es la clase donde se almacenan todo tipo de datos del admin, esta encargada de saber cuales y cuantos administradores hay registrados en la base de datos 

class RepositorioAdmin{

	public static function obtener_todos($conexion){
		$administradores = array();
		if (isset($conexion)){
			try{
				include_once 'Admin.inc.php';
				$sql = "SELECT * FROM administradores";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();


				if (count($resultado)){
					foreach ($resultado as $fila) {
						$administradores[] = new Admin(
							$fila['id'], $fila['nombre'], $fila['email'], $fila['password'], $fila['fecha_registro'], $fila['activo']
						);
					}
				} else{
					print 'No hay administradores';
				}
			} catch(PDOException $ex){
				print "ERROR" . $ex -> getMessage();
			}
		}
		return $administradores;
	}


	//obtener_numero_administradores: esta encargada de contar cuantos administradores hay registrados en la base de datos 

	public static function obtener_numero_administradores($conexion){
		$total_administradores = null;
		if (isset($conexion)){
			try{
				$sql = "SELECT COUNT(*) as total FROM administradores";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetch();
				$total_administradores = $resultado['total'];
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $total_administradores;
	}



	//insertar_admin: esta encargada de agregar nuevos administradores a la base de datos

	public static function insertar_admin($conexion, $admin){
		$admin_insertado = false;
		if (isset($conexion)) {
			try{
				$sql = "INSERT INTO administradores(nombre, email, password, fecha_registro, activo) VALUES(:nombre, :email, :password, NOW(), 0)";

				$sentencia = $conexion -> prepare($sql);

				$sentencia->bindParam(':nombre', $admin -> obtener_nombre(), PDO::PARAM_STR);
				$sentencia->bindParam(':email', $admin -> obtener_email(), PDO::PARAM_STR);
				$sentencia->bindParam(':password', $admin -> obtener_password(), PDO::PARAM_STR);

				$admin_insertado = $sentencia -> execute();
			}

			catch(PDOException $ex){
				print 'ERROR' . $ex->getMessage();
			}
		}
		return $admin_insertado;
	}



	//nombre_existe: esta funcion se encargara de verificar que los nombres de admin no se repitan en la base de datos

	public static function nombre_existe($conexion, $nombre){
		$nombre_existe = true;

		if (isset($conexion)) {
			try{
				$sql = "SELECT * FROM administradores WHERE nombre = :nombre";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
				$sentencia -> execute();

				$resultado = $sentencia -> fetchAll();

				if(count($resultado)){
					$nombre_existe = true;
				}
				else{
					$nombre_existe = false;
				}
			}

			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $nombre_existe;
	}



	//email_existe: esta encargada de verificar que los correos no se repitan en la base de datos (un email puede ser utilizado solo una vez por admin)
	public static function email_existe($conexion, $email){
		$email_existe = true;

		if (isset($conexion)) {
			try{
				$sql = "SELECT * FROM administradores WHERE email = :email";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':email', $email, PDO::PARAM_STR);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if(count($resultado)){
					$email_existe = true;
				}
				else{
					$email_existe = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $email_existe;
	}



	//obtener_admin_por_email: ayuda a identificar a cada admin con su email
	public static function obtener_admin_por_email($conexion, $email){
		$admin = null;

		if (isset($conexion)){
			try{
				include_once 'Admin.inc.php';

				$sql = "SELECT * FROM administradores WHERE email = :email";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':email', $email, PDO::PARAM_STR);
				$sentencia -> execute();

				$resultado = $sentencia -> fetch();

				if (!empty($resultado)) {
					$admin = new Admin($resultado['id'],
						$resultado['nombre'],
						$resultado['email'],
						$resultado['password'],
						$resultado['fecha_registro'],
						$resultado['activo']);
				}
			}

			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $admin;
	}



	//obtener_admin_por_id: ayuda a identificar a cada admin con su id
	public static function obtener_admin_por_id($conexion, $id){
		$admin = null;

		if (isset($conexion)){
			try{
				include_once 'Admin.inc.php';

				$sql = "SELECT * FROM administradores WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':id', $id, PDO::PARAM_STR);
				$sentencia -> execute();

				$resultado = $sentencia -> fetch();

				if (!empty($resultado)) {
					$admin = new Admin($resultado['id'],
						$resultado['nombre'],
						$resultado['email'],
						$resultado['password'],
						$resultado['fecha_registro'],
						$resultado['activo']);
				}
			}

			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $admin;
	}



	//actualizar_password: ayuda a actualizar las contraseñas de cada admin
	public static function actualizar_password($conexion, $id_admin, $nueva_clave){
		$actualizacion_correcta = false;

		if (isset($conexion)) {
			try{
				$sql = "UPDATE administradores SET password = :password WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':password', $nueva_clave, PDO::PARAM_STR);
				$sentencia -> bindParam(':id', $id_admin, PDO::PARAM_STR);
				$sentencia -> execute();

				$resultado = $sentencia -> rowCount();

				if (count(array($resultado))) {
					$actualizacion_correcta = true;
				}
				else{
					$actualizacion_correcta = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR'.$ex -> getMessage();
			}
		}
		return $actualizacion_correcta;
	}
}






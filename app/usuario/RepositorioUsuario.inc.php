<?php



//RepositorioUsuario: Es la clase donde se almacenan todas las funciones para el tratamiento de datos del usuario en la base de datos 

class RepositorioUsuario{

	public static function obtener_todos($conexion){//esta funcion se encarga de saber cuales y cuantos usuarios hay registrados
		$usuarios = array();
		if (isset($conexion)){
			try{
				include_once 'Usuario.inc.php';
				$sql = "SELECT * FROM usuarios";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();


				if (count($resultado)){
					foreach ($resultado as $fila) {
						$usuarios[] = new Usuario(
							$fila['id'], $fila['nombre'], $fila['email'],$fila['fecha_registro'], $fila['activo']
						);
					}
				} else{
					print 'No hay usuarios';
				}
			} catch(PDOException $ex){
				print "ERROR" . $ex -> getMessage();
			}
		}
		return $usuarios;
	}


	//obtener_numero_usuarios: esta encargada de contar cuantos usuarios hay registrados en la base de datos 

	public static function obtener_numero_usuarios($conexion){
		$total_usuarios = null;
		if (isset($conexion)){
			try{
				$sql = "SELECT COUNT(*) as total FROM usuarios";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetch();
				$total_usuarios = $resultado['total'];
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $total_usuarios;
	}



	//insertar_usuario: esta encargada de agregar nuevos usuarios a la base de datos

	public static function insertar_usuario($conexion, $usuario){
		$usuario_insertado = false;
		if (isset($conexion)) {
			try{
				$sql = "INSERT INTO usuarios(nombre, email, fecha_registro, activo) VALUES(:nombre, :email, NOW(), 0)";

				$sentencia = $conexion -> prepare($sql);

				$sentencia->bindParam(':nombre', $usuario -> obtener_nombre(), PDO::PARAM_STR);
				$sentencia->bindParam(':email', $usuario -> obtener_email(), PDO::PARAM_STR);

				$usuario_insertado = $sentencia -> execute();
			}

			catch(PDOException $ex){
				print 'ERROR' . $ex->getMessage();
			}
		}
		return $usuario_insertado;
	}


	public static function eliminar_usuario($conexion, $usuario_id) {
        if (isset($conexion)) {
            try {
                $conexion -> beginTransaction();

                $sql = "DELETE FROM usuarios WHERE id=:usuario_id";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':usuario_id', $usuario_id, PDO::PARAM_STR);
                $sentencia -> execute();

                $conexion -> commit();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
                $conexion -> rollBack();
            }
        }
    }



	//email_existe: esta encargada de verificar que los correos no se repitan en la base de datos (un email puede ser utilizado solo una vez por usuario)
	public static function email_existe($conexion, $email){
		$email_existe = true;

		if (isset($conexion)) {
			try{
				$sql = "SELECT * FROM usuarios WHERE email = :email";

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



	//obtener_usuario_por_email: ayuda a identificar a cada usuario con su email
	public static function obtener_usuario_por_email($conexion, $email){
		$usuario = null;

		if (isset($conexion)){
			try{
				include_once 'Usuario.inc.php';

				$sql = "SELECT * FROM usuarios WHERE email = :email";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':email', $email, PDO::PARAM_STR);
				$sentencia -> execute();

				$resultado = $sentencia -> fetch();

				if (!empty($resultado)) {
					$usuario = new Usuario($resultado['id'],
						$resultado['nombre'],
						$resultado['email'],
						$resultado['fecha_registro'],
						$resultado['activo']);
				}
			}

			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $usuario;
	}



	//obtener_usuario_por_id: ayuda a identificar a cada usuario con su id
	public static function obtener_usuario_por_id($conexion, $id){
		$usuario = null;

		if (isset($conexion)){
			try{
				include_once 'Usuario.inc.php';

				$sql = "SELECT * FROM usuarios WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':id', $id, PDO::PARAM_STR);
				$sentencia -> execute();

				$resultado = $sentencia -> fetch();

				if (!empty($resultado)) {
					$usuario = new Usuario($resultado['id'],
						$resultado['nombre'],
						$resultado['email'],
						$resultado['fecha_registro'],
						$resultado['activo']);
				}
			}

			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $usuario;
	}

}






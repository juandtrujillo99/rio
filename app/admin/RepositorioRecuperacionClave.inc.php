<?php



class RepositorioRecuperacionClave{
	public static function generar_peticion($conexion, $id_admin, $url_secreta){
		$peticion_generada = false;

		if (isset($conexion)) {
			try{
				$sql = "INSERT INTO recuperacion_clave_admin(admin_id, url_secreta, fecha) VALUES (:admin_id, :url_secreta, NOW())";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':admin_id', $id_admin, PDO :: PARAM_STR);
				$sentencia -> bindParam(':url_secreta', $url_secreta, PDO :: PARAM_STR);
				$peticion_generada = $sentencia -> execute();
			}

			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $peticion_generada;
	}



	public static function url_secreta_existe($conexion, $url_secreta){
		$url_existe = false;

		if (isset($conexion)) {
			try{
				$sql = "SELECT * FROM recuperacion_clave_admin WHERE url_secreta = :url_secreta";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':url_secreta', $url_secreta, PDO::PARAM_STR);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if(count($resultado)){
					$url_existe = true;
				}
				else{
					$url_existe = false;
				}
			}

			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $url_existe;
	}



	public static function obtener_id_admin_mediante_url_secreta($conexion, $url_secreta){
		$id_admin = null;

		if (isset($conexion)) {
			try{
				include_once 'RecuperacionClave.inc.php';

				$sql = "SELECT * FROM recuperacion_clave_admin WHERE url_secreta = :url_secreta";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':url_secreta', $url_secreta, PDO::PARAM_STR);
				$sentencia -> execute();
				$resultado = $sentencia -> fetch();

				if(!empty($resultado)){
					$id_admin = $resultado['admin_id'];
				}
			}

			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $id_admin;
	}
}


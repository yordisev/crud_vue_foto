<?php

	class ApptivaDB {

		private $host = "localhost";
		private $usuario = "root";
		private $clave = "";
		private $db = "zvuefoto";
		public $conexion;

		public function __construct(){
			try {
				$this->conexion = new PDO('mysql:host='.$this->host.';dbname='.$this->db.'', $this->usuario, $this->clave);
			} catch (PDOException $ex) {
				echo "Error al conectar a la base de datos: " . $ex->getMessage() . "\n";
				exit;
			}
		}

		public function buscar(){
			$sql = "SELECT * FROM alumno ORDER BY dni ASC";
			$sentencia = $this->conexion->query($sql);
			if($sentencia){
				return $sentencia->fetchAll(PDO::FETCH_OBJ);
			} else {
				return false;
			}
		}

		public function insertar($dni,$nombres,$appaterno,$apmaterno,$celular,$correo,$foto){
			$sql = 'INSERT INTO  alumno(dni,nombres,paterno,materno,celular,correo,foto)VALUES(:dni,:nombres,:paterno,:materno,:celular,:correo,:foto)';
			$ejecutar = $this->conexion->prepare($sql);
			$ejecutar->bindValue(':dni', $dni, PDO::PARAM_STR);
			$ejecutar->bindValue(':nombres', $nombres, PDO::PARAM_STR);
			$ejecutar->bindValue(':paterno', $appaterno, PDO::PARAM_STR);
			$ejecutar->bindValue(':materno', $apmaterno, PDO::PARAM_STR);
			$ejecutar->bindValue(':celular', $celular, PDO::PARAM_INT);
			$ejecutar->bindValue(':correo', $correo, PDO::PARAM_STR);
			$ejecutar->bindValue(':foto', $foto, PDO::PARAM_STR);

			if($ejecutar->execute()){
				return true;
			} else {
				return false;
			}
		}

		public function editar($dni,$nombres,$appaterno,$apmaterno,$celular,$correo,$foto){
			$sql = 'UPDATE alumno SET nombres = :nombres, paterno = :paterno, materno = :materno, celular = :celular, correo = :correo, foto = :foto WHERE dni = :dni';
			if ($foto == ""){
				$sql = 'UPDATE alumno SET nombres = :nombres, paterno = :paterno, materno = :materno, celular = :celular, correo = :correo WHERE dni = :dni';
			}
			$ejecutar = $this->conexion->prepare($sql);
			$ejecutar->bindValue(':nombres', $nombres, PDO::PARAM_STR);
			$ejecutar->bindValue(':paterno', $appaterno, PDO::PARAM_STR);
			$ejecutar->bindValue(':materno', $apmaterno, PDO::PARAM_STR);
			$ejecutar->bindValue(':celular', $celular, PDO::PARAM_INT);
			$ejecutar->bindValue(':correo', $correo, PDO::PARAM_STR);
			if ($foto != ""){
				$ejecutar->bindValue(':foto', $foto, PDO::PARAM_STR);
			}
			$ejecutar->bindValue(':dni', $dni, PDO::PARAM_STR);
			if($ejecutar->execute()){
				return true;
			} else {
				return false;
			}
		}
		public function eliminar($dni){
			$sql = 'DELETE FROM alumno  WHERE dni = :dni';
			$ejecutar = $this->conexion->prepare($sql);
			$ejecutar->bindValue(':dni', $dni, PDO::PARAM_STR);
			if($ejecutar->execute()){
				return true;
			} else {
				return false;
			}
		}

	}

?>
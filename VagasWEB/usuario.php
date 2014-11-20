<?php 
		include_once "classeBD.php";

	class Usuario{
		private $idUsuario;
		
		public function testUsuario(){
			$bd = new FuncoesBD();
			$bd -> conectar();
			$consulta = "SELECT idUsuarios FROM usuarios";
			$resultado = mysqli_query($bd -> conectar(), $consulta) or die ("Não foi possível encontrar seus dados");
			if(mysqli_num_rows($resultado) > 0){
					return true;
				}
			$bd -> fecharConexao();
			}

		public function getId(){
			return $this->idUsuario;
		}

		public function checkIdUsuario($id){
			if($id > 0){
				return true;
			}
			return false;
		}

		public function setId($id){
			if(self::checkIdUsuario($id)){
				$this->idUsuario = $id;
			}else{
				$this->idUsuario = 0;
			}
		}	
	}

?>
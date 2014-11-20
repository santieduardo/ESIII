<?php 
include_once "classeBD.php";
	class Vaga{
		private $idVaga;
		
		public function testVaga(){
			$bd = new FuncoesBD();
			$bd -> conectar();
			$consulta = "SELECT idVaga FROM vagas";
			$resultado = mysqli_query($bd -> conectar(), $consulta) or die ("Não foi possível encontrar seus dados");
			if(mysqli_num_rows($resultado) > 0){
					return true;
				}
			$bd -> fecharConexao();
			}

		public function getId(){
			return $this->idVaga;
		}

		public function checkIdVaga($id){
			if($id > 0){
				return true;
			}
			return false;
		}

		public function setId($id){
			if(self::checkIdVaga($id)){
				$this->idVaga = $id;
			}else{
				$this->idVaga = 0;
			}
		}	

	}

?>
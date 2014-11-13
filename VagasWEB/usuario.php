<?php 

	class Usuario{
		private $idUsuario;

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
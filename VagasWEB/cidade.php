<?php 
	
	class Cidade{
		private $idCidade;

		public function getId(){
			return $this->idCidade;
		}

		public function setId($id){
			if(checkIdCurso($id)){
				$this->idCidade = $id;
			}else{
				$this->idCidade = 0;
			}
		}

		public function checkIdCurso($id){
			if($id > 0){
				return true;
			}
			return false;
		}
	}
?>
<?php 
	
	class Cidade{
		private $idCidade;

		public function getId(){
			return $this->idCidade;
		}

		public function setId($id){

			self::checkIdCurso($id);
			$this->idCidade = $id;
			
		}

		public function checkIdCurso($id)
		{
			if($id <= 0){
				throw new Exception("Codigo inválido", 1);
				
			}
			
		}
	}
?>
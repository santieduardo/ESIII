<?php 

	class Curso{

		private $idCurso;

		public function getId(){
			return $this->idCurso;
		}


		

		public function checkIdCurso($id){
			if($id > 0){
				return true;
			}
			return false;
		}

		public function setId($id){
			if(self::checkIdCurso($id)){
				$this->idCurso = $id;
			}else{
				$this->idCurso = 0;
			}
		}
	}

?>
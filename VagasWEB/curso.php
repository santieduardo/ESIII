<?php 

	class Curso{
		private $idCurso;

		public function getId(){
			return $idCurso;
		}

		public function setId($id){
			if(checkIdCurso($id)){
				$idCurso = $id;
			}else{
				$idCurso = 0;
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
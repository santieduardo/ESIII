<?php 
	
	class Cidade{
		private $idCidade;
		private $municipio;

		public function __construct($idCidade = "", $municipio = ""){
			$this->idCidade = $idCidade;
			$this->municipio = $municipio;
		}	

		public function getId(){
			return $this->idCidade;
		}

		public function getMunicipio(){
			return $this->municipio;
		}
	}
?>
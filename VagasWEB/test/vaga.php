<?php 

	class Vaga{
	
	private $idVaga;
	private $nome;
	private $descricao;
	private $status;
	private $turno;
	private $publico;

		function __construct($idVaga="",$nome="",$descricao="", $status="", $turno="", $publico="") {
			$this->idVaga=$idVaga;
			$this->nome=$nome;
			$this->descricao=$descricao;
			$this->status=$status;
			$this->turno=$turno;
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

		public function getStatus() {
			return $this->status;
		}
		
		public function setStatus($novoStatus) {
			$this->status=$novoStatus;
		}
		
		public function checkStatus($status){
			if($status == 1){
				return true;
			}
			return false;
		}
	}

?>
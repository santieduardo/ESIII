<?php 

	class Vagas{
	
	private $idVaga;
	private $nome;
	private $descricao;


	function __construct($idVaga = "", $nome="", $descricao="") {
		$this->idVaga = $idVaga;
		$this->nome = $nome;
		$this->descricao = $descricao;
	}
		
	public function getId(){
		return $this->idVaga;
	}

	}
?>
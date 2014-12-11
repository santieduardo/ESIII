<?php 

	class Usuario{
	
	private $idUsuario;
	private $nome;
	private $endereco;
	private $email;
	private $senha;
	private $idade;
	private $cidade;
	private $curso;

	public function __construct($idUsuario = "",$nome="",$endereco="", $email="", $senha="", $idade="", $cidade = "", $curso = "") {
		$this->idUsuario=$idUsuario;
		$this->nome=$nome;
		$this->endereco=$endereco;
		$this->email=$email;
		$this->senha=$senha;
		$this->idade=$idade;
		$this->cidade=$cidade;
		$this->curso=$curso;
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

		public function getEndereco() {
			return $this->endereco;
		}
		
		public function getNome() {
			return $this->nome;
		}
		
		public function getEmail() {
			return $this->email;
		}
		
		public function getSenha() {
			return $this->senha;
		}
		
		public function getIdade() {
			return $this->idade;
		}

		public function getCidade(){
			return $this->cidade;
		}

		public function getCurso(){
			return $this->curso;
		}

	}

?>
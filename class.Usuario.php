<?php
		  /**
	 	  *  Iniciando a classe usuario
	 	  */
	class Usuario {
		   /**
			 *Declarando os atributos da classe
			 */
	 
		private $idusuario;
		private $nome;
		private $usuario;
		private $senha;
			
			/**
			  * Chamando o método Construtor
			  * Inicializando os atributos
			  */
		
		public function __Construct(){
			$this->idusuario = 0;
			$this->nome = "";	
			$this->usuario = "";
			$this->senha = "";
		}
		
			/**
			  * Fim do metodo construtor
			  * Inicio dos Metodos gets
			  */
		public function getIdusuario(){
			return $this->idusuario;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function getSenha(){
			return $this->senha;
		}
	
			/**
			  * Fim dos metodos gets
		  	  * Inicio dos Metodos Sets
		  	  */
		  
		public function setIdusuario($value){
			$this->idusuario= $value;
		} 
		public function setNome($value){
			$this->nome = $value;		
		}
		public function setUsuario($value){
			$this->usuario = $value;		
		}
		public function setSenha($value){
			$this->senha = md5($value);		
		}
		/* Carrega usuarios */	
		public function Carrega($id){
			$id= (int) $id;
			$query= "SELECT * FROM usuarios
		   			WHERE idusuario = {$id}";
					
			$db= new DB();
			$db->Sql($query);
			if($db->NumRows() == 0){
				throw new Exception('usuario inválido');
			}

			$dado= $db->Fetch();
		   
			$this->setIdusuario($dado->idusuario);
			$this->setNome($dado->nome);
			$this->setUsuario($dado->usuario);
			$this->setSenha($dado->senha);
		}
		
        public function Cadastra(){
            $db= new DB();
            $query= "INSERT INTO usuarios (
                      nome,
					  usuario,
					  senha
                     )VALUES(
                      '{$this->getNome()}',
                      '{$this->getUsuario()}',
                      '{$this->getSenha()}'
					  )";
            if(!$db->Sql($query)){
                throw new Exception('Falha ao cadastrar o usuario');
            }
            $this->setIdusuario($db->LastInsertId());
        }
		
        public function Edita(){
            $db= new DB();
            $query= "UPDATE usuarios SET
                      nome= '{$this->getNome()}',
                      usuario= '{$this->getUsuario()}'
                     WHERE idusuario = {$this->getIdusuario()}";
            if(!$db->Sql($query)){
                throw new Exception('Falha ao editar os dados do usuario');
            }
		}
		
		public function EditaSenha(){
            $db= new DB();
            $query= "UPDATE usuarios SET 
						senha= '{$this->getSenha()}'
		                WHERE idusuario = {$this->getIdusuario()}";
			if(!$db->Sql($query)){
                throw new Exception('Falha ao editar a senha do usuario');
            }
		}
		
        public function Remove(){
            $db= new DB();
            $query= "DELETE FROM usuarios 
                     WHERE idusuario = {$this->getIdusuario()}
                     LIMIT 1";
            if(!$db->Sql($query)){
                throw new Exception('Falha ao remover os dados do usuario');
            }
        }
	}
?>
<?php
		  /**
	 	  *  Iniciando a classe sala
	 	  */
	class Sala {
		   /**
			 *Declarando os atributos da classe
			 */
	 
		private $idsala;
		private $nome;
			
			/**
			  * Chamando o método Construtor
			  * Inicializando os atributos
			  */
		
		public function __Construct(){
			$this->idsala = 0;
			$this->nome = "";	
		}
		
			/**
			  * Fim do metodo construtor
			  * Inicio dos Metodos gets
			  */
		public function getIdsala(){
			return $this->idsala;
		}
		public function getNome(){
			return $this->nome;
		}
	
			/**
			  * Fim dos metodos gets
		  	  * Inicio dos Metodos Sets
		  	  */
		  
		public function setIdsala($value){
			$this->idsala= $value;
		} 
		public function setNome($value){
			$this->nome = $value;		
		}
		/* Carrega usuarios */	
		public function Carrega($id){
			$id= (int) $id;
			$query= "SELECT * FROM salas
		   			WHERE idsala = {$id}";
					
			$db= new DB();
			$db->Sql($query);
			if($db->NumRows() == 0){
				throw new Exception('sala inválida');
			}

			$dado= $db->Fetch();
		   
			$this->setIdsala($dado->idsala);
			$this->setNome($dado->nome);
		}
		
        public function Cadastra(){
            $db= new DB();
            $query= "INSERT INTO salas (
                      nome
                     )VALUES(
                      '{$this->getNome()}'
					  )";
            if(!$db->Sql($query)){
                throw new Exception('Falha ao cadastrar a sala');
            }
            $this->setIdsala($db->LastInsertId());
        }
		
        public function Edita(){
            $db= new DB();
            $query= "UPDATE salas SET
                      nome= '{$this->getNome()}' 
                     WHERE idsala = {$this->getIdsala()}";
            if(!$db->Sql($query)){
                throw new Exception('Falha ao editar os dados da sala');
            }
		}
		
        public function Remove(){
            $db= new DB();
            $query= "DELETE FROM salas 
                     WHERE idsala = {$this->getIdsala()}
                     LIMIT 1";
            if(!$db->Sql($query)){
                throw new Exception('Falha ao remover os dados da sala');
            }
        }
	}
?>
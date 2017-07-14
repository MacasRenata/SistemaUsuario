<?php    
    /**
     * Classe para manipula��o do banco de dados MySQL
     * Aqui voc� faz a conex�o ao banco de dados e pode 
     * fazer suas consultas e fun��es adicionais que podem
     * ser vistas abaixo
     */
    class DB{

        //declarando as vari�veis usadas na classe DB

        private $conn;
        private $result;
        
        /**
         * REABRE a conex�o ao banco de dados
         *
         */
        /*
        public function __construct(){
            if(!$this->conn= mysql_connect('mysql.spartafutebol.com.br','spartafutebol','inventa82')){
                throw new Exception('Erro ao conectar a base de dados');
            }
            if(!mysql_select_db('spartafutebol',$this->conn)){
                throw new Exception('Erro ao selecionar a base de dados para uso');
            }
        }*/

        //Essa fun��o constroi a classe aonde for necess�rio. e � usada da seguinte maneira
        //$db = new DB();
        //$variavel = new NomeDaClasse();

        public function __construct(){
            
            //vari�vel conn recebe a fun��o de conex�o com o banco mysql_connect('endere�o de cone��o mysql','usuario','senha');

            if(!$this->conn= mysql_connect('mysql.joycesantos.com.br','joycesantos','inventa82')){
                throw new Exception('Erro ao conectar a base de dados');
            }

            //aqui � selecionada o banco de dados com a fun��o mysql_select_db('nome do bd','fun��o de conex�o')

            if(!mysql_select_db('joycesantos',$this->conn)){
                throw new Exception('Erro ao selecionar a base de dados para uso');
            }
        }
        
        /**
         * Retorna esta conex�o ao banco de dados
         *
         * @return resource
         */
        public function Conn(){
            return $this->conn;
        }
        
        /**
         * Fecha a conex�o ao mysql
         *
         * @return bool
         */
        public function Close(){
            return mysql_close($this->conn);
        }
        
        /**
         * Inicia uma transa��o de banco de dados
         *
         */
        public function StartTransaction(){
            if(!mysql_query('START TRANSACTION',$this->Conn())){
                throw new Exception('Erro ao iniciar a transa��o');
            }
        }
        
        /**
         * Executa o ROLLBACK na transa��o atual
         *
         */
        public function Rollback(){
            if(!mysql_query('ROLLBACK',$this->Conn())){
                throw new Exception('Erro ao executar o cancelamento da transa��o');
            }
        }
        
        /**
         * Executa o COMMIT da transa��o atual
         *
         */
        public function Commit(){
            if(!mysql_query('COMMIT',$this->Conn())){
                throw new Exception('Erro ao salvar os dados da transa��o');
            }
        }
        
        /**
         * Executa um comando SQL no banco de dados pode ser qualquer comando de SQL (select, include, alter, update e etc.)
         *
         * @param string $query
         * @return resource
         * a vari�vel $query deve conter o comando SQL que quer fazer
         * ex: $query = "SELECT * FROM tabela WHERE id='1'";
         */
        public function Sql($query){

            //a fun��o recebe a vari�vel com o comando SQL e tenta executar o comando

            if(!$this->result = mysql_query($query,$this->Conn())){

                //se o comando tiver errado ele vai retornar falso
                
                return false;
            }else{

                //se o comando funcionar ele retornar o resultado pra vari�vel result

                return $this->result;
            }
        }
        
        /**
         * Retorna uma linha de resultado por chamada
         *
         * @return object
         */
        public function Fetch(){
            return mysql_fetch_object($this->result);
        }
        
        /**
         * Retorna o n�mero de linhas retornadas pela consulta SQL ou n�mero de linhas modificadas por comandos como UPDATE e DELETE
         *
         * @return int
         */
        public function NumRows(){
            return mysql_num_rows($this->result);
        }
        
        /**
         * Retorna a mensagem de erro do mysql
         *
         * @return string
         */
        public function Error(){
            return mysql_error($this->Conn());
        }
        
        /**
         * Retorna o �ltimo autoincrement gerado
         *
         * @return int
         */
        public function LastInsertId(){
            return mysql_insert_id($this->conn);
        }
    }
?>
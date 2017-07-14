<?php    
    /**
     * Classe para manipulaчуo do banco de dados MySQL
     * Aqui vocъ faz a conexуo ao banco de dados e pode 
     * fazer suas consultas e funчѕes adicionais que podem
     * ser vistas abaixo
     */
    class DB{

        //declarando as variсveis usadas na classe DB

        private $conn;
        private $result;
        
        /**
         * REABRE a conexуo ao banco de dados
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

        //Essa funчуo constroi a classe aonde for necessсrio. e щ usada da seguinte maneira
        //$db = new DB();
        //$variavel = new NomeDaClasse();

        public function __construct(){
            
            //variсvel conn recebe a funчуo de conexуo com o banco mysql_connect('endereчo de coneчуo mysql','usuario','senha');

            if(!$this->conn= mysql_connect('mysql.joycesantos.com.br','joycesantos','inventa82')){
                throw new Exception('Erro ao conectar a base de dados');
            }

            //aqui щ selecionada o banco de dados com a funчуo mysql_select_db('nome do bd','funчуo de conexуo')

            if(!mysql_select_db('joycesantos',$this->conn)){
                throw new Exception('Erro ao selecionar a base de dados para uso');
            }
        }
        
        /**
         * Retorna esta conexуo ao banco de dados
         *
         * @return resource
         */
        public function Conn(){
            return $this->conn;
        }
        
        /**
         * Fecha a conexуo ao mysql
         *
         * @return bool
         */
        public function Close(){
            return mysql_close($this->conn);
        }
        
        /**
         * Inicia uma transaчуo de banco de dados
         *
         */
        public function StartTransaction(){
            if(!mysql_query('START TRANSACTION',$this->Conn())){
                throw new Exception('Erro ao iniciar a transaчуo');
            }
        }
        
        /**
         * Executa o ROLLBACK na transaчуo atual
         *
         */
        public function Rollback(){
            if(!mysql_query('ROLLBACK',$this->Conn())){
                throw new Exception('Erro ao executar o cancelamento da transaчуo');
            }
        }
        
        /**
         * Executa o COMMIT da transaчуo atual
         *
         */
        public function Commit(){
            if(!mysql_query('COMMIT',$this->Conn())){
                throw new Exception('Erro ao salvar os dados da transaчуo');
            }
        }
        
        /**
         * Executa um comando SQL no banco de dados pode ser qualquer comando de SQL (select, include, alter, update e etc.)
         *
         * @param string $query
         * @return resource
         * a variсvel $query deve conter o comando SQL que quer fazer
         * ex: $query = "SELECT * FROM tabela WHERE id='1'";
         */
        public function Sql($query){

            //a funчуo recebe a variсvel com o comando SQL e tenta executar o comando

            if(!$this->result = mysql_query($query,$this->Conn())){

                //se o comando tiver errado ele vai retornar falso
                
                return false;
            }else{

                //se o comando funcionar ele retornar o resultado pra variсvel result

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
         * Retorna o nњmero de linhas retornadas pela consulta SQL ou nњmero de linhas modificadas por comandos como UPDATE e DELETE
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
         * Retorna o њltimo autoincrement gerado
         *
         * @return int
         */
        public function LastInsertId(){
            return mysql_insert_id($this->conn);
        }
    }
?>
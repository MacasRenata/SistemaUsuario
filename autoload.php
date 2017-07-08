<?php
	/*
	A função __autoload() do PHP tenta carregar os arquivos fazendo o require*

	*require (aqui no caso o require_once) é uma função que faz um requerimento 
	do arquivo conforme o caminho que for indicado no parâmetro. 
	ex: require_once("caminho do arquivo");
	Assim o arquivo é carregado aonde for necessário seu uso.

	*/
    function __autoload($classe){
        require_once("classes/class.{$classe}.php");
    }
?>
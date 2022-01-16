<?php
	
	session_start();

	//o fopen espera dois parametros
		 //nome do arquivo / parametro: 'a' -> abri o arquivo para a escrita, posso consultar outros parametros na documentação php

	//str_replace = ele vai subtituir o primeiro item(#) "caso ele encontre" que coloquei como parametro e vai colocar o segundo item(-), fazer uma troca....

	$titulo = str_replace('#', '-', $_POST['titulo']);
	$categoria = str_replace('#', '-', $_POST['categoria']);
	$descricao = str_replace('#', '-',  $_POST['descricao']);

	//desafio em inves de utilizar o str_replace / utilizar o implode
	
			//colocando session[id] apos aplicar o controle de perfil
	$texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;
	//PHP_EOL = faz uma quebra de linha, de acordo com o texto que nesse caso vai ser dentro do arquivo de texto que vai ficar os dados..


	//fopen: abrindo arquivo para guardar os dados recebidos do formularios, como nao estamos usando o bd..
	$arquivo = fopen('arquivo.txt', 'a');

	//escrevendo texto (por isso a utilização do 'a' pois o arquivo vai apenas escrever os dados que estao vindo do forms!)
	fwrite($arquivo, $texto);

	//fechando o arquivo
	fclose($arquivo);

	//echo $texto;

	header('Location: abrir_chamado.php');

?>
<?php
	
	//sempre é importante colocar 'session_start()' para trabalhar com session
	session_start();

	/*echo '<pre>';
		print_r($_SESSION);
	echo '</pre>';

	//temos duas opções para encerrar a variavel de sessão:

	//1 - remover indices do array de sessão
	//utilizando o 'unset() -> serve para remover indices do array individualmente, tambem removendo indices do get / post'

	unset($_SESSION['x']); //para remover o indice apenas se ele existir

	echo '<pre>';
		print_r($_SESSION);
	echo '</pre>';

	//2 - destruir a variavel de sessão
	//utilizando o 'session_destroy() -> remove todos os indices contidos dentro da global session'

	session_destroy();//sera destruida
	// forçar um redirecionamento, para fazer o acesso novamente e a variavel da nova sessao nao vai estar la ( variaveis não vai estar mais lá )

	echo '<pre>';
		print_r($_SESSION);
	echo '</pre>';*/



	session_destroy(); //vai destrui e quando for destruir colocar o redirecionamento para a pagina de login
	header('Location: index.php');


?>
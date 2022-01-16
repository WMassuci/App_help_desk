
<?php

	//importante para iniciar o session é utilizar o 'session_start()' mas antes de qualquer tag que imita 'impressão para o browser' tipo o echo.
	session_start(); 

	 
	 //variavel que verifica se a autentificação foi realizada
	$usuario_autentificado = false;
	$usuario_id = null; //controle de perfils
	$usuario_perfil_id = null; //controle de perfils

	//controle de perfils
	$perfil = array(1 => 'administrativo', 2 => 'usuario');

	

	// usuarios do sistema

	$usuarios_app = array(
		//recebendo o id para cada usuario ter acesso de acordo com seu perfil, seja adm ou usuario..											  //controle de perfil -> perfil_id
		array('id' => 1, 'email' => 'teste@gmail.com', 'senha' => '1234', 'perfil_id' => 1),
		array('id' => 2, 'email' => 'adm@gmail.com', 'senha' => '1234', 'perfil_id' => 1),
		array('id' => 3, 'email' => 'jose@gmail.com', 'senha' => '1234', 'perfil_id' => 2),
		array('id' => 4, 'email' => 'gabriel@gmail.com', 'senha' => '1234', 'perfil_id' => 2),
	);

	//verificar se o dados do usuarios colocados no forms bate com os do já cadastrados no sistema

	foreach($usuarios_app as $user){

		if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){

			$usuario_autentificado = true;
			$usuario_id = $user['id']; //controle de perfil
			$usuario_perfil_id = $user['perfil_id'];
		}

	};


	if($usuario_autentificado == true){

		echo "Usuario autentificado!";
		$_SESSION['autentificado'] = 'SIM';
		$_SESSION['id'] = $usuario_id; //controle de perfil
		$_SESSION['perfil_id'] = $usuario_perfil_id; //controle de perfil
		header('Location: home.php'); //em caso de login correto força para a pagina home.php

	} else{

		$_SESSION['autentificado'] = 'NAO';
		header('Location: index.php?login=erro'); // local aonde vai a mensagem de erro , no caso na pagina de formulário, que é o destino 'Location' que coloquei
	}


	/*echo '<pre>';
		print_r($usuarios_app);
	echo '</pre>';

	echo '<br>';

	echo '<pre>';
		print_r($_POST);
	echo '</pre>'; */

?>
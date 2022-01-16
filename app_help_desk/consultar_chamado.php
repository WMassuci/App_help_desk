<?php
  
  require_once "validador_acesso.php";

?>


<?php
    

    //abrir o aqrquivo.txt
    $arquivo = fopen('arquivo.txt', 'r');


    $chamados = array(); //array para que os dados da variavel $registro fiquem armazenados
    
    //utilizar o while para percorer o arquivo.txt enquanto tiver registro...
    //funcao feof(nome do arquivo) -> percorre toda linha do arquivo, ate não achar nada

    //coloquei o sinal de 'negação !' pois a função feof retorna true, caso encontre o final do arquivo, mais como quero ficar fazendo um laço de repetição é necessario colocar o negação (para ficar false), para acontecer o laço de repetição... 
    while(!feof($arquivo)){ 

      $registro = fgets($arquivo); //colocar ma variavel para que guarde os dados contidos no arquivo
      $chamados[] = $registro; //recupera os dados do arquivo.txt
    };


    //sempre quando abrir um arquivo é importante fecha-lo com a função 'fclose'
    fclose($arquivo);

    
?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>

      <ul class="navbar-nav">
          <li class="nav-item">
              <a href="logoff.php" class="nav-link">SAIR</a>
          </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <!--recuperando dados do array $chamados, para ter um visual melhor no browser -->  

              <? foreach($chamados as $chamado) { ?>

                <?php
                    //separa dos dados de acordo com o primeiro item que coloquei no explode ou seja o '#'
                    $chamado_dados = explode('#', $chamado);

                    //controle de perfil - implementando cada perfil vai ver algo diferente

                    if($_SESSION['perfil_id'] == 2){
                      //so vai exibir o chamado se ele foi criado pelo usuario
                      if($_SESSION['id'] != $chamado_dados[0]){

                          continue;

                      }
                    }

                    //fazer isso para que o ultimo item(card) não fique vazio
                    if(count($chamado_dados) < 3 ){

                      continue;
                    };
                  
                ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">           <!--ANTES ERA 0, 1, 2: FAZER A MUDANÇA LOGO APOS COLOCAR CONTROLE DE PERFIL-->
                  <h5 class="card-title"><?= $chamado_dados[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
                  <p class="card-text"><?= $chamado_dados[3] ?></p>

                </div>
              </div>             

              <? } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
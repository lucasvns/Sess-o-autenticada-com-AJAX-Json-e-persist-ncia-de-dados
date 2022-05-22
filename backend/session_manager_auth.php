<?php 
	session_start();	
	date_default_timezone_set('America/Sao_Paulo');
	
  $json = file_get_contents('../dados/dados.json');
  $dadosJson = json_decode($json,true);

	if ($_POST["operation"] == 'load') {
		
		if (isset($_SESSION["login"])) {
      echo json_encode($dadosJson);

		} else {
			echo '{ "nome" : "undefined" }';
		}
		
	} else if ($_POST["operation"] == 'login') {
		if(!(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))){
		   echo '{ "status" : "nao_logado" }';
		   header('HTTP/1.0 401 Unauthorized');
		} else {
			$login = $_SERVER['PHP_AUTH_USER'];
			$senha = $_SERVER['PHP_AUTH_PW'];
			
			if ($login == $dadosJson["login"] &&
				$senha == $dadosJson["senha"]) {
				$_SESSION["nome"] = $dadosJson["nome"];
				$_SESSION["login"] = $dadosJson["login"];
				
        echo json_encode($dadosJson);

			} else {
         echo '{ "status" : 400, "mensagem" : "nao_logado" }';
				 header('HTTP/1.0 401 Unauthorized');
			 }
		}

	} else if ($_POST["operation"] == 'logout') {
		
		session_destroy();
		echo '{ "nome" : "undefined" }';
		
	} else if ($_POST["operation"] == 'insert') {

		if (isset($_SESSION["login"])) {
      if (isset($_POST["atividade"]) && $_POST["atividade"] != ""){
        
        $atividade = $_POST["atividade"];

        $dadosJson["atividades"][] = array(
          "index" => count($dadosJson["atividades"]) + 1,
          "atividade" => $atividade,
          "date" => date("d/m/Y").' - '. date("H:i:s"),
          "status" => "open"
        );
          
        atualizarJson($dadosJson);
      }else{
        echo '{ "status" : 400, "mensagem" : "Erro ao Inserir Atividade" }';
      }

    }else{
      echo '{ "status" : "nao_logado" }';
      header('HTTP/1.0 401 Unauthorized');
    }

  } else if ($_POST["operation"] == 'remove') {

		if (isset($_SESSION["login"])) {
      if (isset($_POST["index"]) && $_POST["index"] != ""){
        
        $index = $_POST["index"];

        $dadosJson["atividades"] = array_filter($dadosJson["atividades"], function($atividade) use ($index) {
          return $atividade["index"] != $index;
        });
        $dadosJson['atividades'] = array_values($dadosJson['atividades']);

        atualizarJson($dadosJson);

      } else {
        echo '{ "status" : 400, "mensagem" : "Erro ao Remover" }';
      }

    } else {
      echo '{ "status" : "nao_logado" }';
      header('HTTP/1.0 401 Unauthorized');
    }

  } else if ($_POST["operation"] == 'update'){

		if (isset($_SESSION["login"])) {
      if (isset($_POST["index"]) && $_POST["index"] != "" && isset($_POST["atividade"]) && $_POST["atividade"] != "" ){
        $index = $_POST["index"];
        $atividadeUpdate = $_POST["atividade"];
      
        $dadosJson["atividades"] = array_map(function($atividade) use ($index, $atividadeUpdate) {
          if ($atividade["index"] == $index) {
            $atividade["atividade"] = $atividadeUpdate;
            $atividade["date"] = date("d/m/Y").' - '. date("H:i:s");
          }
          return $atividade;
        }, $dadosJson["atividades"]);

        atualizarJson($dadosJson);

      } else {
        echo '{ "status" : 400, "mensagem" : "Erro ao Atualizar" }';
      }

    }else{
      echo '{ "status" : "nao_logado" }';
      header('HTTP/1.0 401 Unauthorized');
    }

  } else if ($_POST["operation"] == 'markDone') {

		if (isset($_SESSION["login"])) {
      if (isset($_POST["index"]) && $_POST["index"] != "") {
        $index = $_POST["index"];

        $dadosJson["atividades"] = array_map(function($atividade) use ($index) {
          if ($atividade["index"] == $index) {
            $atividade["status"] = "done";
          }
          return $atividade;
        }, $dadosJson["atividades"]);
    
        atualizarJson($dadosJson);

      }else{
        echo '{ "status" : 400, "mensagem" : "Erro ao Marcar como Concluído" }';
      }

    }else{
      echo '{ "status" : "nao_logado" }';
      header('HTTP/1.0 401 Unauthorized');
    }
  
  }else {
		
		echo '{ "invalid_operation" : "' . $_POST["operation"] . '" }';
		
	}

  function atualizarJson($dadosJson) {
    if(file_put_contents('../dados/dados.json', json_encode($dadosJson))){
      echo json_encode($dadosJson);
    } else {
      echo '{ "status" : 400, "mensagem" : "Erro ao Salvar Arquivo" }';
    }
  }

?>
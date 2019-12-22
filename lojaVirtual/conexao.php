
<?php
	
	$ambiente = false;
	
	if ($ambiente){
		//ambiente de Produção

		$dns    = "";
		$dbuser = "";
		$dbpass = "";

		try{

			$pdo = new PDO($dns,$dbuser,$dbpass);

		}catch(PDOException $e){

			echo "ERRO: ".$e->getMessage();
			exit;
		}


	}else{
		//ambiente de desenvovimento

		$dns    = "mysql:dbname=loja6;host=localhost";
		$dbuser = "root";
		$dbpass = "";

		try{

			$pdo = new PDO($dns,$dbuser,$dbpass);

		}catch(PDOException $e){

			echo "ERRO: ".$e->getMessage();
			exit;
		}
	}


?>

<?php
 session_start();
require "conexao.php";
if(isset($_POST['login']) && !empty($_POST['login'])){
	$login   = addslashes($_POST['login']);
	$senha   = addslashes($_POST['senha']);
	$sql = $pdo->prepare("SELECT * FROM cliente WHERE login = :login AND senha = :senha");
	$sql->bindValue(":login", $login);
	$sql->bindValue(":senha", md5($senha));
	$sql->execute();
		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			$_SESSION['login'] = $sql['id_Cliente']; 
	        $nome = $_SESSION['nome'] = $sql['nome'];
			echo "<script>alert('Bem vindo a loja virtua  $nome ')  </script>";
		}else{
			echo "<script> alert(' login errado ') </script>";
		}
}else{
	//echo "<script> alert('Faça o login') </script>"; 	
}

?>
<script>
	location='index.php';
</script>

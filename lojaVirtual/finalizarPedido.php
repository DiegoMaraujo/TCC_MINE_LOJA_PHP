
<?php
 session_start();
require "conexao.php";
if(isset($_SESSION['login']) ) {

	echo "<script> alert('Compra finalizado com sucesso: ') </script>";
try{
	foreach($_SESSION['dados'] as $produto ){
		$totalCompra = $_SESSION['total'];
		$conexao = new PDO('mysql:host=localhost;dbname=loja6',"root","");
		if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
		  	$id = $_SESSION['login'];

		  $sql = $pdo->prepare("SELECT * FROM cliente WHERE id_Cliente = :id_Cliente");
		  $sql->bindValue(":id_Cliente", $id);
		  $sql->execute();
		  $info = $sql->fetch();
		  $info['id_Cliente'];

     		if($sql->rowCount() > 0){
				$insert =$conexao->prepare("INSERT INTO pedidos () VALUES (NULL,?,?,?,?,?,?,NOW())");
				$insert->bindParam(1,$produto['fk_id_produto']);
				$insert->bindParam(2,$produto['quantidade']);
				$insert->bindParam(3,$produto['preco']);
				$insert->bindParam(4,$produto['total']);
				$insert->bindParam(5,$info['id_Cliente']);
				$insert->bindParam(6,$totalCompra);
				$insert->execute();
			}
		}
	}



	unset ($_SESSION['itens']);	

}catch(PDOException $e){

		echo "ERRO: ".$e->getMessage();
		exit;
	}
    
}else {
	echo "<script> alert('faça seu login para realizar a compra ') </script>"; 
}

?>
<script>
	location='index.php';
</script>
<?php




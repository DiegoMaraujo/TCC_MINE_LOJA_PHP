<?php
session_start();
if(!isset($_SESSION['sair'])){	
	unset ($_SESSION['dados']);
	unset ($_SESSION['itens']);
	unset ($_SESSION['login']);		
	unset ($_SESSION['cadastrar']);	
}
?>
<script>
	location='index.php';
</script>
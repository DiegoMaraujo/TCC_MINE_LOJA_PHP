<?php
session_start();
require 'conexao.php';

?>
<!-------------------------------------------------------------------------------------------->
 
<!DOCTYPE html>

<html lang="br">
<!--------------head-------------------------------------------------------------------------->
<?php require_once("home/head.php") ?>
<!--------------fim head--------------------------------------------------------------------->
    <body>
    	<div class="conterner" >
		<!--------------inicio------------------------------------------------------------------------->     
		    <?php 

	
			    //inicio
			    require_once("home/inicio.php"); 
			    //modal
			    require( 'home/modal.php'); 
			  ?>
			<div style="background-color:#DCDCDC;border-radius: 15px 15px 17px ;">
			  	<?php
			    //Carrocel
			    require_once("home/carrocel.php");
			    //Produtos
			    require( 'produtos.php');
			    ?> 
			</div>
			    <?php
			    //footer
			    require_once('home/footer.php');  
		    ?>
<!-----------------------------------------fim  chamando fim o da pagina----------------------->
	</div>
  </body>


</html>
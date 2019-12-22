<?php 
require_once("home/head.php");
require_once("home/inicio.php");
 ?>
<div class="container clearfix" >
     <div class="row">
        <?php
        require "conexao.php";	
    //puchando do banco
    	$select = $pdo->prepare("SELECT * FROM produto");
    	$select->execute();
    	$fetch = $select->fetchAll();

        ?>
        <?php foreach($fetch as $produto) : ?>
            <div class="col-4">
                <div class="card " style="margin: 5px; box-shadow: 5px 5px 8px #9e9c9c;border-radius: 12px 12px 13px">
                    <div class="card-body rounded">

            <td> 
            <?php echo'<img src="img/'.$produto['imagem'].'"/><br/>'?>;
            </td>
                         <h4 class="card-title"><?php echo $produto['nome_pro']?></h4>
                         <h6 class="card-subtitle mb-2 text-muted">
                            R$<?php echo number_format($produto['preco'], 2, ',', '.')?>
                         </h6>
                    <form method="POST" name="carrinho" action="carrinho.php">
                       <a class="btn btn-primary" href="carrinho.php?add=carrinho&id=<?php echo $produto['id_produto']?>" >Comprar</a>
                       </form>
                    </div>
                </div>
            </div>

        <?php endforeach;?>
    
    </div>
</div>                     
<!-------------------------------Footer------------------------------------>
 
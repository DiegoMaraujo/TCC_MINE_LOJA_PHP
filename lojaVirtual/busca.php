<?php 
session_start();   
require "conexao.php"; 
require_once("home/head.php");
require_once("home/modal.php");
require_once("home/inicio.php");


?>
<div class="container">
   
    <div class="row">
        <?php
         

        $nome = $_POST['busca'];
         
        //puchando do banco
            $select = $pdo->prepare("SELECT * FROM produto WHERE nome_pro LIKE '%".$nome."%'");
            $select->execute();
            $fetch = $select->fetchAll();

        if($fetch >= 1){
             
        }  


        ?>
    </div>
</div>


</div>
         
    <h2 style="margin-left: 500px">Produtos</h2>
        <div class="container">
            <div class="row">
               
                <?php foreach($fetch as $produto) : ?>
                    <div class="col-4">
                        <div class="card" style="margin: 5px; box-shadow: 1px 1px 2px #9e9c9c;border-radius: 12px 12px 13px">
                            <div class="card-body">
                                
                    <td> 
                    <?php echo'<img src="img/'.$produto['imagem'].'"/><br/>'?>;
                    </td>
                                 <h4 class="card-title"><?php echo $produto['nome_pro']?></h4>
                                 <h6 class="card-subtitle mb-2 text-muted">
                                    R$<?php echo number_format($produto['preco'], 2, ',', '.')?>
                                 </h6>

                               <a class="btn btn-primary" href="carrinho.php?add=carrinho&id=<?php echo $produto['id_produto']?>" class="card-link">Comprar</a>
                            </div>
                        </div>
                    </div>

                <?php endforeach;?>
            
            </div>
        </div>
<?php require_once("home/footer.php") ?>
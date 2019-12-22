
<?php 
session_start();
require_once("home/head.php");
require_once("home/inicio.php");
require_once("home/modal.php");

if(!isset($_SESSION['itens'])){
    $_SESSION['itens'] = array();
}

if(isset($_GET['add'])  == "carrinho"){
        //Adiciona ao carrinho
        $idProduto = intval($_GET['id']);
    if(!isset($_SESSION['itens'][$idProduto]) ){
        $_SESSION['itens'][$idProduto] = 1;
        ?>
        <script>
            location='carrinho.php';
        </script>
        <?php
       
    }else{
        $_SESSION['itens'][$idProduto] += 1;
        ?>
        <script>
            location='carrinho.php';
        </script>
        <?php
    }
}

   //exibe o carrinho

if(count($_SESSION['itens']) == 0){
        echo"<script> alert('Carrinho vazio')  </script>";
        //echo'Carrinho vazio<br><a class="btn btn-info" href="produtos.php">Adicionar itens</a>';

}else{
    $totalFinal = 0;
    //fazendo um array de dados
    $_SESSION['dados'] = array();

    foreach($_SESSION['itens'] as $idProduto => $quantidade){
    //puchando do banco
    $conexao = new PDO('mysql:host=localhost;dbname=loja6',"root","");
    $select = $conexao->prepare("SELECT * FROM produto WHERE id_produto=? ");
    $select->bindParam(1,$idProduto);
    $select->execute();
    $produtos = $select->fetchAll();
    $total = $quantidade * $produtos[0]["preco"];
    $totalFinal += $total; 
    $_SESSION['total'] = $totalFinal;

    //fazendo um array dos pedidos para inserir no banco
       array_push(

        $_SESSION['dados'],
            array(
            'fk_id_produto'=>$idProduto,
            'quantidade'=> $quantidade,
            'preco'=> $produtos[0]['preco'],
            'total'=>$total,
        ));
 
    }
}
?>

<div class="container">
    <div class="row">                
            <form action="carrinho.php?" method="post" name="carrinho">
                <table class="table table-strip">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Subtotal</th>
                            <th>Ação</th>
                        </tr>               
                    </thead>
                        <?php 
                        $totalFinal = 0;
                        foreach($_SESSION['itens'] as $idProduto => $quantidade){
                        //puchando do banco
                        $conexao = new PDO('mysql:host=localhost;dbname=loja6',"root","");

                        $select = $conexao->prepare("SELECT * FROM produto WHERE id_produto=?");
                        $select->bindParam(1,$idProduto);
                        $select->execute();
                        $produtos = $select->fetchAll();
                        $total = $quantidade * $produtos[0]["preco"];
                        $totalFinal += $total ;  
                        ?>
                <tbody>
                    <tr>
                        <td><?php echo $produtos[0]["nome_pro"]?></td>
                        <td> <input type="text"  value="<?php echo''.$quantidade.''?>" size="1"/></td>     
                        <td>R$<?php echo number_format($produtos[0]["preco"],2,",",".")?></td>
                        <td>R$<?php echo number_format($total,2,",",".")?></td>  
                        <td><?php echo'<a class="btn btn-info" href="remover.php?remover=carrinho&id='.$idProduto.'">Remover<a/><hr/>'; ?></td>
                    </tr>
                </tbody>
                            <?php } ?> 
                                <td colspan="3" class="text-right"><br>Total: </br></td>
                                <td>R$<?php echo number_format($totalFinal, 2, ',', '.')?>
                                    <div class="table table-strip">
                                        <td><button type="button"  class="btn btn-primary" id="btn" name="click" >Pagar</button></td>
                                    </div>
                                </td>
                </table>
                        <td> 
                            <?php echo '<a class="btn btn-info" href="produtos.php" ncurses_refresh(ch)>Add mais itens<a/>'?>       
                        </td>  

            </form> 
                <div style="margin-left: 700px ;background-color: #afeeee; width: 300px; padding: 15px;border-radius: 5px;">
                    <form method="POST" class="form ">
                        <h4 style="text-align: left;">Calculo Frete mais Entrega</h4>
                        <h5 style="text-align: left;">CEP:</h5>
                    <input type="text" class="form-control" name="cep" /></br>
                    <input type="submit" class="form-control" >
                        <?php
                        require'calculaFrete.php';
                            if($_POST == true){
                                 $cep   = $_POST['cep'];
                                 $cep1  ='37500410';
                                 $pac   = '04510';
                                 $sedex ='40010';
                                
                            $val = (calcular_frete($cep,$cep1,2,200,$pac));
                                
                                echo'<br>'; 
                                echo "<h4>Valor PAC: R$ ".$val->Valor.'  </br>';
                                echo 'Entrega em '.$val->PrazoEntrega.' Dias </br>';
                            }
                           echo'<br><br>';
                            if($_POST == true){
                                        $valorFrete = $val->Valor;
                                        $totalFinal += $valorFrete ;
                        ?>
                                <td colspan="3" class="text-right"><b>Total mais Frete: </td>
                                <td>R$<?php echo number_format($totalFinal, 2, ',', '.')?></td> 
                        <?php
                            }
         
                        ?>
               
                </form> 
                </div>  
                 
         </div>  
   
  <footer style="background-color: #B0E0E6; height: 100px; box-shadow: 1px 1px 2px #9e9c9c;border-radius: 15px 15px 17px ">
      <div style="text-align: center;">
           <h2>Loja<span> Virtual </span></h2>
            <p>Nossa loja tem todos os produtos para os usuarios que gostam, de eletronicos des de celulares ate computaores, como elterodomesticos!</p> 
            <p>&copy; 2019 E-commerce. Todos os direitos reservados. </p>

      </div>

</footer>


  <script type="text/javascript">
  var botao = document.getElementById("btn");
  botao.addEventListener('click', function(){   
      location='pagamento.php';
  })
  </script>

<?php
session_start();
require_once("home/head.php");
require "conexao.php"; 

  if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
    $id = $_SESSION['login'];

    $sql = $pdo->prepare("SELECT * FROM cliente WHERE id_Cliente = :id_Cliente");
    $sql->bindValue(":id_Cliente", $id);
    $sql->execute();
    $info = $sql->fetch();
    $_SESSION['clientePro'] = $info['id_Cliente'];

      if($sql->rowCount() > 0){
      $select = $pdo->prepare("SELECT cliente.nome, cliente.cpf ,cliente.numero, cliente.email,cliente.telefone, cliente.cidade , cliente.bairro , cliente.cep ,pedidos.preco,pedidos.quantidade,pedidos.fk_id_produto,pedidos.total,pedidos.data_pedido, pedidos.totalCompra  FROM cliente INNER JOIN pedidos ON cliente.id_Cliente=pedidos.fk_id_cliente WHERE id_Cliente = :id_Cliente");
      $select->bindValue(":id_Cliente", $id);
      $select->execute();
      $fetch = $select->fetchAll();
          }else{
          echo"<script>alert('Nenhuma compra encontrada')</script>";  
      }                  
         
  }   

  ?>
  <!--<pre>
      <?php print_r($fetch);?>         
  </pre>-->
  <div style="background-color: #87CEFA ; height: 2000px">
    <div class="jumbotron jumbotron-fluid row form-group col-md-8 container clearfix" style="margin-left: 150px; border: 2px solid #888;border-radius: 10px; box-shadow: 10px 10px 20px #696969 ; margin-top: 5px;padding: 10px">
      <div class="container">
          <div class="row">                
              <form>
                <?php echo "<br/><h3><a href='aCliente.php'>Voltar</a></h3>"?>
                <table class="table table-strip">
                  <thead>
                    <tr>
                      <th>Comprador</th>
                      <th>Cpf</th>
                      <th>Celular</th>
                      <th>Email</th>
                      <th>Cep</th>
                      <th>Numero</th>
                   
                    </tr>
                </thead>
                    <tbody>  
                      <tr>                        
                        <td><?php echo$info['nome']?></td>
                        <td><?php echo$info['cpf']?></td>
                        <td><?php echo$info['telefone']?></td>
                        <td><?php echo$info['email']?></td>
                        <td><?php echo$info['cep']?></td> 
                        <td><?php echo$info['numero']?></td>  

                      </tr>
                    </tbody>  
                </table>
            </form>
          </div>
        </div>
    <?php foreach($fetch as $produto) : ?> 
      <div class="container">
          <div class="row">                
              <form>
                <table class="table table-strip">
                  <thead>
                    <tr>
                      <th>Data/Hora</th>
                      <th>Preço</th>
                      <th>Quantidade</th>
                      <th>Total</th>
                      <th>Valor total dos itens comprados</th>
                    </tr>               
                  </thead>
                    <tbody>  
                      <tr>   
                        <td><?php echo date('d/m/Y H:i', strtotime($produto['data_pedido'])); ?></td>                       
                        <td>R$<?php echo number_format($produto["preco"],2,",",".")?></td>
                        <td> <input type="text" readonly="true" value="<?php echo $produto['quantidade']?>" size="1" /></td>
                        <td>R$<?php echo number_format($produto['total'],2,",","."); ?></td> 
                        <td>R$<?php echo number_format($produto['totalCompra'],2,",","."); ?></td>       
                      </tr>
                    </tbody>  

                </table>
            </form>
            
      <?php endforeach;?>
    </div>
  </div>
                  

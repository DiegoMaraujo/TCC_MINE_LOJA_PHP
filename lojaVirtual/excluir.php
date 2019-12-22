  
<?php
session_start();
require_once("conexao.php");


if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
    $id = $_SESSION['login'];
      
    $sql =$pdo->prepare( "DELETE FROM cliente WHERE id_Cliente = :id_Cliente ");  
    $sql->bindValue(':id_Cliente', $id);
    $sql->execute();

        if($sql->rowCount() > 0){

              echo"<script>alert('Dados Deletado com Sucesso')</script>";
           
           
            unset ($_SESSION['itens']);
            unset ($_SESSION['login']); 
            unset ($_SESSION['cadastrar']); 

          }else{
            echo "<script>alert('Erro ao Deletar')</script>";
      }                 
              
}
  
 ?>     
<script>
location='index.php';
</script>
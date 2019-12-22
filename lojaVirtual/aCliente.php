<?php
session_start();
require 'conexao.php';
#verificar se a pessoa esta logada e se a sessao nao esta em branco.

if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
  $id = $_SESSION['login'];

    
  $sql = $pdo->prepare("SELECT * FROM cliente WHERE id_Cliente = :id_Cliente");
  $sql->bindValue(":id_Cliente", $id);
  $sql->execute();
  $info = $sql->fetch();
  
  $_SESSION['id'] = $info['id_Cliente'];
  $cli = $_SESSION['id'];
}


 ?>     
<?php require_once("home/head.php") ?>

<div style="background-color: #87CEFA ; height: 900px">
<div class="jumbotron jumbotron-fluid row form-group col-md-8 container clearfix" style="margin-left: 150px; border: 2px solid #888;border-radius: 10px; box-shadow: 10px 10px 20px #696969 ; margin-top: 15px;padding: 40px">
<h3> <?php echo "<br/><a href='index.php'>Voltar</a> \ <a href='excluir.php'>Excluir Cadastro</a> \ <a href='clientePro.php'>Visualizar Pedido</a>\n"; ?></h3>
  <h2 style="margin-left: 50px" >Atualizar Cadastro </h2>
 <form method="POST" action="atualizar.php" >
       
        <legend>Dados do Cliente</legend>
            <label >
                <span>Login :</span> <input name="login" value ="<?php echo $info['login']; ?>"  class="form-control" type="text" readonly="true"/>
            </label>
            <label>
                <span>Senha :</span> <input name="senha"  value ="<?php echo $info['senha']; ?>" class="form-control" type="password" />
            </label>
            <label >
                <span>Nome Completo:</span> <input name="nome"  value ="<?php echo $info['nome']; ?>"   class="form-control"  type="text" onkeyup="validar(this,'text')"/>
            </label>
             <label >
                <span>CPF :</span> <input name="cpf" id="cpf" maxlength="14"class="form-control"  value ="<?php echo $info['cpf']; ?>" type="text" required placeholder="000.000.000-00" onkeyup="validar(this,'num')" onkeypress="return mask(event, this, '###.###.###-##')"/>
            </label>
            <label >
                <span>E-mail :</span> <input name="email" class="form-control"  value ="<?php echo $info['email']; ?>" type="text" onkeyup="validar(this,'text')"/>
            </label>
            <label >
                <span>Celular:</span> <input name="telefone" id="telefone"class="form-control"  value ="<?php echo $info['telefone']; ?>" type="text" maxlength="15" onkeyup="validar(this,'num')"  onkeypress="return mask(event, this, '(##) #####-####')"/>
            </label>
        
        <legend>Endereço</legend>
              <label >
                <span>Rua :</span> <input name="rua" id="rua"class="form-control" value ="<?php echo $info['rua']; ?>"  type="text" onkeyup="validar(this,'text')"/>
              </label>
              <label >
                <span>Número :</span> <input name="numero" id="numero" class="form-control" value ="<?php echo $info['numero']; ?>"  type="text" onkeyup="validar(this,'num')"/>
              </label>
              <label >
                <span>Complemento :</span> <input name="complemento" id="complemento" value ="<?php echo $info['complemento']; ?>"  class="form-control" type="text" onkeyup="validar(this,'text')"/>
              </label>
              <label >
                <span>Bairro :</span> <input name="bairro" id="bairro" class="form-control"  value ="<?php echo $info['bairro']; ?>" type="text" onkeyup="validar(this,'text')"/>
              </label>
              <label >
                <span>Cidade :</span> <input name="cidade" id="cidade"class="form-control"  value ="<?php echo $info['cidade']; ?>" type="text" onkeyup="validar(this,'text')"/>
              </label>
              <label >
                <span>UF :</span> <input maxlength="2" name="uf" id="uf"class="form-control"  value ="<?php echo $info['uf']; ?>" size="2" type="text" onkeyup="validar(this,'text')"/>
              </label>
              <label >
                <span>CEP :</span> <input name="cep" id="cep"  value ="<?php echo $info['cep']; ?>" class="form-control" type="text" maxlength="9" onkeyup="validar(this,'num')" onkeypress="return mask(event, this, '#####-###')"/>
              </label>
          </br>
              <input type="submit"  name="Atualizar"  value="Atualizar" />
             
        </form>
          

<?php 
//footer 
 require_once('home/footer.php');
 ?> 
</div>



<script type="text/javascript">
function validar(dom,tipo){
  switch(tipo){
    case'num':var regex=/[A-Za-z]/g;break;
    case'text':var regex=/\d/g;break;
  }
  dom.value=dom.value.replace(regex,'');
}



//função mascara nos campos
function mask(e, id, mask){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)){
        mascara(id, mask);
        return true;
    } 
    else{
        if (tecla==8 || tecla==0){
            mascara(id, mask);
            return true;
        } 
        else  return false;
    }
}
function mascara(id, mask){
    var i = id.value.length;
    var carac = mask.substring(i, i+1);
    var prox_char = mask.substring(i+1, i+2);
    if(i == 0 && carac != '#'){
        insereCaracter(id, carac);
        if(prox_char != '#')insereCaracter(id, prox_char);
    }
    else if(carac != '#'){
        insereCaracter(id, carac);
        if(prox_char != '#')insereCaracter(id, prox_char);
    }
    function insereCaracter(id, char){
        id.value += char;
    }
}

</script> 



 

    





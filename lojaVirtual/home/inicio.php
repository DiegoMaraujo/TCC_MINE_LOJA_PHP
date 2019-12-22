
<!--=========================================área de cabeçalho====================================-->   
 <?php

require 'conexao.php';
#verificar se a pessoa esta logada e se a sessao nao esta em branco.
if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
    #achou a sessao entao vamos pegar o id dessa sessao para pegar o restante das informacoes da conta que esta no banco de dados

    $id   = $_SESSION['login'];
    $nome = $_SESSION['nome']; 
    ?>
    <div style="height:30px; margin-top: 10px;margin-left: 940px;padding: 10px;width: 360px">
        <h5 style="text-align: center;"><?php echo '<a  href="aCliente.php" >Área Cliente</a> \ <a href="sair.php">SAIR</a> \ Logado  '.$nome?>
        </h5>   
    </div>
   
    <?php
    $sql = $pdo->prepare("SELECT *FROM cliente WHERE id_Cliente = :id_Cliente");
    $sql->bindValue(":id_Cliente", $id);
    $sql->execute();
}
    ?>

<!--------------------------------------login-----------------------------------------------------?-->  
<div style="box-shadow: 1px 1px 2px #9e9c9c; border-radius: 15px 15px 17px ;background-color: #B0E0E6; ">

               <div style="width: 800px;height: 40px;margin-left: 550px;margin-top: 10px;padding: 15px">
                <title>Login </title>
                <form method="POST" action="login.php" >
                    Login:<input type="text" name="login" />
                    Senha:<input type="password" name="senha" />
                    <input type="submit" name="entra" value="Entrar">                  
                </form>

           </div> 
           <div style="float: right; padding: 50px">
                    <a href="index.php" class="btn btn-info">Inicio</a>          
                    <button id="myBtn" class="btn btn-info">Contato</button>
                    <button id="myBtn1" class="btn btn-info">Cadastro</button>
           </div>
 
    <!-- Fim da area de cabeçalho -->

<!--===========================área de marca do site====================================================-->     <div class="site-branding-area">
        <div class="container" >
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="img/logo.png"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6" >
                    <div class="shopping-item"style="box-shadow: 5px 5px 8px #000000;">
                        <a href="carrinho.php">Carrinho - <span class="cart-amunt"></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"></span></a>
                    </div>
                        
                </div>

            </div>

        </div>
    </div> 

 <!-------------------------Campo busca------------------------------------------------------------->
                <div  style="margin-left: 400px; width: 300px;">

                    <h2 class="sidebar-title">Pesquisa</h2>
                    <form method="post" name="pesquisa" action="busca.php" style="box-shadow: 5px 5px 8px #9e9c9c;">
                        <input type="text" name="busca" id="busca" placeholder="Busca">
                        <input type="submit" nome="pesquisar" value="Pesquisar">
                    </form>
                </div>
</div> 
<!-------------------------fim  Campo busca------------------------------------------------------------->



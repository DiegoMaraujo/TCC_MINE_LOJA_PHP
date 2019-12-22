
<?php 
session_start();
require_once("conexao.php");

function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
         echo "<script>alert('CPF invalido')</script>";
    }
    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
         echo "<script>alert('CPF invalido')</script>";
    }
    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf{$c} * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf{$c} != $d) {
            return false;
            echo "<script>alert('CPF invalido')</script>";
        }
    }
    return true;
}


if(isset($_SESSION['login']) < 1){
				
	if(validaCPF($_POST['cpf']) == true){

		if(isset($_POST['cadastrar'])) {	

				$login       =  $_POST['login'];
				$senha       =  $_POST['senha'];
				$nome        =  $_POST['nome'];
				$cpf         =  $_POST['cpf'];
				$email       =  $_POST['email'];
				$telefone    =  $_POST['telefone'];
				$rua         =  $_POST['rua'];
				$numero      =  $_POST['numero'];
				$complemento =  $_POST['complemento'];
				$bairro 	 =  $_POST['bairro'];
				$cidade      =  $_POST['cidade'];
				$uf			 =  $_POST['uf'];
				$cep         =  $_POST['cep'];


					// checking empty fields
					if(empty($login) || empty($senha) || empty($nome) || empty($cpf) || empty($email) || 
						empty($telefone)|| empty($rua)|| empty($numero) || empty($complemento) || empty($bairro) 
						|| empty(	$cidade) || empty($uf)|| empty($cep)) {
						

								echo"<script>alert('Preencha os campos')</script>";
					

					}else{ 
					//Select no banco pra ver se existe o login
					$sql = $pdo->prepare("SELECT * FROM cliente WHERE login = :login");
					$sql->bindValue(":login", $login);
					$sql->execute();
					  	if($sql->rowCount() > 0){
					  		echo"<script>alert('Login já Cadastrado, escolha outro login')</script>";
							
						}else{
		 				//insert data to database	
							$sql = $pdo->prepare("INSERT INTO cliente(login,senha,nome,cpf,email,telefone,rua,numero,complemento,bairro,cidade,uf,cep) 
					        VALUES (:login,:senha,:nome,:cpf,:email,:telefone,:rua,:numero,:complemento,:bairro,:cidade,:uf,:cep)");
					        	
						 
						 	$sql->bindValue(":login",     $login);
						 	$sql->bindValue(":senha",     md5($senha));
					        $sql->bindValue(":nome",      $nome);
					        $sql->bindValue(":cpf",      $cpf);
					        $sql->bindValue(":email",     $email);
					        $sql->bindValue(":telefone",  $telefone);
					        $sql->bindValue(":rua",       $rua);
					        $sql->bindValue(":numero",   $numero);
					        $sql->bindValue(":complemento",$complemento);
					        $sql->bindValue(":bairro",     $bairro);
					        $sql->bindValue(":cidade",     $cidade);
					        $sql->bindValue(":uf",         $uf);
					        $sql->bindValue(":cep",        $cep);
							$sql->execute();

								if($sql->rowCount() > 0){
								    echo"<script>alert('Usuario Cadastrado com Sucesso')</script>";
									//echo "<br/><a href='index.php'>View Result</a>";

								}else{
								    echo "<script>alert('Faça o Cadastro')</script>";
								    //echo "<br/><a href='index.php'>View Result</a>";
								}	
							}		
					}
			}
			
		}else{
		echo "<script>alert('CPF invalido')</script>";
	}


}else{
	echo "<script>alert('Você está logado')</script>";
}		

?>
<script>
location='index.php';
</script>

<?php
$to      ='lojavirtual@gmail.com';//para quem da indo o email definito no host
//echo $to;testando 
$subject = 'Contato - Loja Virtual';//Assunto 
$message = 'Email de ' . $_POST['txtNome'] . "\r\n" . $_POST['txtMsg'];

$dest= $_POST['txtEmail'];

$headers = "From: ". $dest;//email de quem preencheu a caixa de menssagem

mail($to, $subject, $message,  $headers);

?>
<script >alert('Menssagem enviada com Sucesso ')</script>

<meta http-equiv="refresh" content="0.3; url=index.php">
<?php

require_once 'class/usuarios.php';
$u = new Usuario;
?>

<!DOCTYPE>
<html lang="pt-br">
<head>
	<title>Sistema Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div id="corpo-form-cad">
	<h1>Cadastrar</h1>
	<form method="POST"  >
		<input type="text" name="nome" placeholder="Nome completo" maxlength="50">
		<input type="text" name="telefone" placeholder="Telefone"  maxlength="50">
		<input type="email" name="email" placeholder="Email"  maxlength="50">
		<input type="text" name="usuario" placeholder="Usuário" maxlength="50">
		<input type="password" name="senha" placeholder="Senha" maxlength="50">
		<input type="password" name="confsenha" placeholder="Confirmar senha" maxlength="15">
		<input type="submit" name="" value="Cadastrar">
			

</form>
</div>
<?php

if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']);
	$telefone = addslashes($_POST['telefone']);
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$confsenha = addslashes($_POST['confsenha']);
	//verificar se esta preenchido
	if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confsenha))
	{

		$u->conectar("projeto_login","localhost","root","");

			if($u->msgErro== ""){

				if($senha == $confsenha){

				if($u->cadastrar($nome,$telefone,$email,$senha)){
				
					?><div class="msg-sucesso">
						
						Cadastrado com sucesso! Acesse para entrar!
					</div>

				<?php
				}
				else
				{
					?>

					<div class="msg-erro">

						Email já cadastrado!
				
						</div>	<?php
				}


				}
				else
				{

					?><div class="msg-erro">

						Senha e confirmar senha não correspondem!
				
					  </div>	<?php
				}
			} //esta tudo ok
			else
			{
			?><div class= "msg-erro">	
		  	  
				<?php echo "Erro: ".$u->msgErro;
		  	  ?>
		  	  </div>
		  	  <?php
			}
	}
	else
	{
		
		?><div class="msg-erro">

			Preencha todos os campos!
			
	</div>	<?php
}
}	
?>

</body>
</html>
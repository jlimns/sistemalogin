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
<div id="corpo-form">
	<h1>Entrar</h1>
	<form method="POST" >
		<input type="email" name="email" placeholder="Email">
		<input type="password" name="senha" placeholder="Senha">
		<input type="submit" name="submit" value="Entrar">
		<a href="cadastrar.php"> Não é registrado?<strong>Clique aqui</strong></a>	

</form>
</div>
<?php

if(isset($_POST['email']))
{
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	
	//verificar se esta preenchido
	if(!empty($email) && !empty($senha))
	{
		$u->conectar("projeto_login","localhost","root","");
		if($u->msgErro== ""){

			if($u->logar($email,$senha))

			{

			header('location: https://site.gentenspace.com/');
				
			}
		else
		{

			echo"Email e/ou senha incorretos!";
		}

		}
		else
		{

			echo"Erro:".$u->msgErro;
		}

	}
	else
	{
		echo"Preencha todos os campos!";

	}
}	
?>

</body>
</html>
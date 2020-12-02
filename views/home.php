<!DOCTYPE html>
<html>
<head>
	<?php 
		require '../backend/modelo/cliente.php';
		session_start();
		
		
		if(empty($_SESSION['cliente'])){
			echo "<script>alert('FAÇA LOGIN!');window.location = '../login.php';</script>";
		}
	?>
	<meta charset="utf-8">
	<title>AnhembiEats | Bem-vindo!</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../frontend/css/lp.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	
</head>
<body>
	<!-- precisei desse div pra setar a cor no body sem 
	ferrar com o documento inteiro -->
<div class="cor">
<!-- Navbar começa -->
<header id="header">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="./home.php"><span><img src="../frontend/icons/001-pizza.svg" alt="logo da marca"></span>
AnhembiEats</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="./carrinho.php">
			<span><img src="../frontend/icons/003-carrinho.svg" alt="Carrinho de compras"></span>
			Carrinho </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./historico.php">
			<span><img src="../frontend/icons/001-pizza.svg" alt="Histórico de compras"></span>
			Histórico</a>
      </li>
      <li class="nav-item">
		<form action="../backend/controle/controlador-cd.php" method="POST">
        	<a class="nav-link" >
				<span><img src="../frontend/icons/001-anhembi-logo.svg" alt="logo da marca"></span>
				<button type="submit" name="btn-sair">Sair</button>	
			</a>
		</form>
      </li>

    </ul>
  </div>
</nav>
</header>
<!-- navbar acaba -->

<!-- jumbo starta -->
<div class="jumbotron">
	
	<h1 class="display-4"> <span><img src="../frontend/icons/001-pizza.svg" alt="logomarca"></span> 
	<?php
		
		$cliente = $_SESSION['cliente'];
		$nomeCliente = $cliente->getNome();
		
		echo "Bem vindo, $nomeCliente!"
	?>	
	</h1>
	<p class="lead">Feito de alunos para alunos, esse site ainda é um work in progress.</p>
	<hr class="my-4">

</div>

<!-- jumbo acabou :D -->


<!-- essa section é só uma lista de 'features' da plataforma: 
preferi colocar uma coisa assim na landing page do que entupir de card com imagem de comida. -->

<section id="features">
	<div class="container">
		<div class="row margin">
			<div class="col-md-3"><img src="../frontend/icons/001-cartao-de-credito.svg" alt="tipos de pagamento"></div>
			<div class="col-md-9">
				<h4>Aceitamos todos os cartões!*</h4>
				<p>Também aceitamos pagamentos via PayPal</p>
			</div>	
		</div>
		
		<div class="row margin">
			<div class="col-md-3"> <img src="../frontend/icons/001-smartphone.svg" alt="funcionalidades">
</div>
			<div class="col-md-9">
				<h4>Fácil de usar!</h4>
				<p>Peça seu lanche de qualquer lugar, seja no PC do laboratório ou pelo celular!</p>
			</div>	
		</div>


		<div class="row margin">
			<div class="col-md-3">
				<img src="../frontend/icons/001-desconto.svg" alt="descontos">
			</div>
			<div class="col-md-9">
				<h4>Opa, descontos!</h4>
				<p>Fique por dentro de descontos exclusivos da plataforma </p>
			</div>	
		</div>
	<p>*Não aceitamos pagamento em dinheiro físico. Não aceitamos Vale-refeição.</p>
	</div>
</section>
<!-- daqui pra baixo sao os cards, que eu pensei em fazer como carousel mas deu preguiça. é isto. -->
<hr class="my-4">

<section id="pricing">
	<div class="container justify-content-center">
		<div class="row">
		
		
		<?php
		$lanches = $_SESSION['lanches'];
		foreach ($lanches as $lanche) {
			//var_dump($lanche);
			$lancheImg = $lanche['img'];
			$lancheNome = $lanche['nomeLanche'];
			$lancheR = $lanche['restaurante'];
			$lanchePreco = $lanche['preco'];
			$lancheID = $lanche['id'];
			echo "
			<div class='col-lg-3 col-sm-12'>
					<div class='card text-center' style='width: 18rem;'>
						<img src='$lancheImg' class='card-img-top' alt='lancheira'>
						<h5 class='card-header'>$lancheNome</h5>
						<div class='card-body'>
							<h2> R$<span class='hm-item-preco'>$lanchePreco</span></h2>
							<p class='card-text'>$lancheR</p>
							<input type='hidden' value='$lancheID' id='lchID'>
							<button class='btn btn-success' onclick='salvarDados(event);'>COMPRAR</button>
						</div>
					</div>
			</div>
			";
		}	
		?>
		
	</div>
</section>

<footer>
<nav class="navbar navbar-light footer justify-content-end" style="background-color: #e3f2fd;">
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="#">Privacidade</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Termos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Contrato</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Copyright 2020, Anhembi Morumbi</a>
  </li>
</ul>
</nav>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="../frontend/scripts/home.js"></script>
</div>
</body>
</html>
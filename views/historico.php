<!DOCTYPE html>
<html>
<head>
<?php
  //require_once '../backend/modelo/cliente.php';
  session_start();
?>

	<meta charset="utf-8">
	<title>AnhembiEats | Histórico</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../frontend/css/lp.css">
    <link rel="stylesheet" href="../frontend/css/carrinho.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <?php 
      //
      
      //existe um bug causado por essas linhas de codigo onde o alert aciona na pagina de login
      //mas basta retornar e tentar logar de novo que o fluxo continua normalmente
      // if(empty($_SESSION)){
      //   echo "<script>alert('FAÇA LOGIN!');window.location = '../login.php';</script>";
      // }
	  ?>
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
        <a class="nav-link active" href="./historico.php">
			<span><img src="../frontend/icons/001-pizza.svg" alt="Histórico de compras"></span>
			Histórico</a>
      </li>
      <li class="nav-item">
         <form action="../backend/controle/controlador-cd.php" method="POST">
              <a class="nav-link">
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
	<h1 class="display-4"> <span><img src="../frontend/icons/002-ordem.svg" alt="carrinho"></span> Seu carrinho de compras</h1>
	<p class="lead">Veja aqui suas compras recentes</p>
	<hr class="my-4">
	
</div>

<!-- jumbo acabou :D -->


<!-- bom, aqui é um carrinho de compras em forma de tabela.
nao faço ideia de como fazer o calculo de preço dinamicamente -->

<section id="tabela de compras">
	<div class="container">
		<table class="table rounded border border-dark">
            <thead>
              <tr>
                <th scope="col">Data</th>
                <th scope="col">Item</th>
                <th scope="col">Quant.</th>
                <th scope="col">Valor pago</th>
                <th scope="col">Pago em:</th>
                
              </tr>
            </thead>
            <tbody>
 
              <?php
              $compras = $_SESSION['historico'];
              //var_dump($compras)
              foreach($compras as $compra){
                $hNome = $compra['nomeLanche'];
                $hData = $compra['dataCompra'];
                $hValor = $compra['valor'];
                $hPag = $compra['metodoPagamento'];
                $hQnt = $compra['quantidade'];
                echo "
                  <tr>
                    <th scope='col'>
                        $hData
                    </th>
                    <td>$hNome</td>
                    <td>$hQnt</td>
                    <td>$hValor</td>
                    <td>$hPag</td>
                    
                  </tr>";
                }
              ?>

              
            </tbody>
          </table>
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

</div>
</body>
</html>
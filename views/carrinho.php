<!DOCTYPE html>
<html>
  <head>
  <?php 
      include '../backend/modelo/cliente.php';
      session_start();
      if(empty($_SESSION)){
        echo "<script>alert('FAÇA LOGIN!');window.location = '../login.php';</script>";
      }
	  ?>
    <meta charset="utf-8" />
    <title>AnhembiEats | Carrinho</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;0,700;1,400&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
      integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="../frontend/css/lp.css" />
    <link rel="stylesheet" href="../frontend/css/carrinho.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
      integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
      crossorigin="anonymous"
    />

  </head>
  <body>
    <!-- precisei desse div pra setar a cor no body sem 
	ferrar com o documento inteiro -->
    <div class="cor">
      <!-- Navbar começa -->
      <header id="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <a class="navbar-brand" href="./home.php"
            ><span><img src="../frontend/icons/001-pizza.svg" alt="logo da marca"/></span>
            AnhembiEats</a
          >
  
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse justify-content-end"
            id="navbarNav"
          >
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" href="./carrinho.php">
                  <span
                    ><img
                      src="../frontend/icons/003-carrinho.svg"
                      alt="Carrinho de compras"
                  /></span>
                  Carrinho
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./historico.php">
                  <span
                    ><img src="../frontend/icons/001-pizza.svg" alt="Histórico de compras"
                  /></span>
                  Histórico</a
                >
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
        <h1 class="display-4">
          <span><img src="../frontend/icons/003-carrinho.svg" alt="carrinho"/></span> Seu
          carrinho de compras
        </h1>
        <p class="lead">Confira aqui seus pedidos</p>
        <hr class="my-4" />
      </div>

      <!-- jumbo acabou :D -->

      <!-- bom, aqui é um carrinho de compras em forma de tabela.
o preço está sendo calculado dinamicamente -->
      <form id="carrinho-tabela" action="../backend/controle/controlador-cd.php" method="POST" multiple="multiple">
          <div class="container">
            <table
              class="table rounded border border-dark"
              
            >
              <thead>
                <tr>
                  <th scope="col">Quant.</th>
                  <th scope="col">Item</th>
                  <th scope="col">Preço</th>
                </tr>
              </thead>
              <tbody>
                <!-- agora a tabela tá sendo formada dinamicamente -->
                <tr id="crt-total">
                  <td ></td>
                  <th scope="row">Total:</th>
                  <td id="tabela-total"></td>
                </tr>
              </tbody>
            </table>
          </div>
        

        <hr class="my-4" />
        <!-- select abaixo + botão -->
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <label for="pagamento">Escolha seu método de pagamento:</label>
              <select class="form-control" name="pagamento">
                <option selected value="CC">
                  <img
                    src="../frontend/icons/002-cartao-de-credito.svg"
                    alt="cartão de crédito"
                  />
                  Cartão de Crédito</option
                >
                <option value="CD">
                  <img
                    src="../frontend/icons/001-cartao-de-credito.svg"
                    alt="cartão de débitos"
                  />
                  Cartão de Débito</option
                >
                <option value="PP">
                  <img src="../frontend/icons/003-paypal.svg" alt="paypal" />
                  Paypal</option
                >
              </select>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-12">
              <button type="submit" class="btn btn-info" name="btn-comprar">
                Confirmar compra
              </button>
            </div>
          </div>
        </div>
      </form>
      <footer>
        <nav
          class="navbar navbar-light footer justify-content-end"
          style="background-color: #e3f2fd;"
        >
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
              <a
                class="nav-link disabled"
                href="#"
                tabindex="-1"
                aria-disabled="true"
                >Copyright 2020, Anhembi Morumbi</a
              >
            </li>
          </ul>
        </nav>
      </footer>
      <script src="../frontend/scripts/carrinho.js"></script>
      <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"
      ></script>
    </div>
  </body>
</html>

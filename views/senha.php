<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>AnhembiEats | Redefinir senha!</title>
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
    <link rel="stylesheet" type="text/css" href="../frontend/css/cadastro.css" />

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
          <a class="navbar-brand" href="#"
            ><span
              ><img src="../frontend/icons/001-pizza.svg" alt="logo da marca"
            /></span>
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
              <!-- <li class="nav-item">
        <a class="nav-link" href="./carrinho.php">
			<span><img src="./icons/003-carrinho.svg" alt="Carrinho de compras"></span>
			Carrinho </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./historico.php">
			<span><img src="./icons/001-pizza.svg" alt="Histórico de compras"></span>
			Histórico</a>
      </li> -->
              <!-- <li class="nav-item">
                <a class="nav-link" href="https://sou.anhembi.br/dashboard">
                  <span
                    ><img
                      src="./frontend/icons/001-anhembi-logo.svg"
                      alt="logo da marca"
                  /></span>
                  Sair</a
                >
              </li> -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- navbar acaba -->

      <!-- jumbo starta -->
      <div class="jumbotron">
        <h1 class="display-4">
          <span id="cad-img-span"
            ><img src="../frontend/icons/001-pizza.svg" alt="logomarca"
          /></span>
          Entre no AnhembiEats!
        </h1>
        <p class="lead">
          Redefina sua senha abaixo!
        </p>
        <p id="cd-login" style="text-align: center;">Ainda não é cadastrado? <a href="./views/cadastro.php">Clique aqui!</a> </p>
        <hr class="my-4" />
        <div class="container">
          <form action="../backend/controle/controlador-cd.php" method="POST">


            <div class="row">
              <div class="col-6-lg">
                <label for="sn-ra" id="ra">RA:</label>
              </div>
              <div class="col-6-lg">
                <input
                  type="text"
                  name="sn-ra"
                  placeholder="21202251"
                  maxlength="8"
                  minlength="6"
                  required
                />
              </div>
            </div>

            <div class="row">
              <div class="col-6-lg">
                <label for="sn-ra" id="ra">Nome:</label>
              </div>
              <div class="col-6-lg">
                <input
                  type="text"
                  name="sn-nome"
                  placeholder="Tal D. Fulano"

                  required
                />
              </div>
            </div>

            <div class="row">
                <div class="col-6-lg">
                  <label for="sn-senha">Nova senha:</label>
                </div>
                <div class="col-6-lg">
                  <input
                    type="password"
                    name="sn-senha"
                    placeholder="******"
                    minlength="5"
                    required
                  />
                </div>
              </div>


            <div class="row">
              
              <div class="col-4">
                <button type="submit" class="btn btn-success btn-block" name="sn-btn">
                  Alterar senha
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>

      <!-- jumbo acabou :D -->

      <!--footá -->
      <hr class="my-4" />

      <footer>
        <nav
          class="navbar navbar-light footer justify-content-end"
          style="background-color: #e3f2fd"
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

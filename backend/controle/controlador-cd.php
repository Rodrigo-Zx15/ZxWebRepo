<?php
    session_start();
    //session_unset();
    
    include_once '../../views/cadastro.php';
    include_once '../../views/carrinho.php';
    include_once '../../views/historico.php';
    include_once '../../views/senha.php';
    include_once '../../login.php';
    require '../modelo/cliente.php';
    require '../modelo/clienteDAO.php';
    ;
    //session_start();
    $clienteDAO = new ClienteDAO();
    if(isset($_POST['cd-btn'])){
        //por algum motivo essas filtragens não funcionam
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $senha = $_POST['senha'];
        $senha = MD5($senha);
        $ra = filter_input(INPUT_POST, 'ra', FILTER_SANITIZE_SPECIAL_CHARS);
        $tipo = $_POST['usuario'];
        /*
        eu nem sei pq esse objeto existe. literalmente apenas atrapalha todo meu trabalho
        porém sem ele a arquitetura deixa de ser MVC, então fiz dois: um apenas com RA e Nome e 
        outro(que extende o primeiro) com o resto dos dados. O motivo é poder ter liberdade 
        na hora de montar um obj Cliente nas paginas sem precisar ter de puxar todos os atributos da tabela de clientes
        */
        $cliente = new ClienteCadastro($ra, $nome, $tipo, $senha);
        //var_dump($cliente);
        $clienteDAO->cadastrar($cliente->getRa(),$cliente->getNome(),$cliente->getTipo(),$cliente->getSenha());    
    }
    //esse foi foda ein. faz 3 queries: 
        //1 - o login em li (verificar se senha e RA batem com algum do banco)
        //2 - pega o *campus* informado do login, pra formar os itens da loja com base nesse campus
        //3 - seleciona todo o historico de compras com base no RA informado 
    if(isset($_POST['lg-btn'])){
        $ra = $_POST['lg-ra'];
        $senha = $_POST['lg-senha'];
        $campus = $_POST['lg-campus'];
        //a senhas do banco são criptografadas, então a verificação também deve
        $senha = MD5($senha);
        //queryResult retorna uma array de tamanho 3, com outras arrays
        $queryResult = $clienteDAO->logar($ra, $senha, $campus);
        
        $clienteLog = new Cliente( $queryResult[0]['ra'],$queryResult[0]['nome']);
        $lanches = $queryResult[1];
        $compras = $queryResult[2];
        //proposito: testes e resolução de erros
        var_dump($queryResult[1]);
        var_dump($clienteLog);
        var_dump($compras);
        //$idSession = session_id();
        $_SESSION['lanches'] = $lanches;
        $_SESSION['cliente'] = $clienteLog;
        $idCliente = $clienteLog->getRa();
        $_SESSION['ra'] = $idCliente;
        $_SESSION['historico'] = $compras;
        echo "<script>console.log('$idSession');window.location='../../views/home.php'</script>";
        var_dump($_SESSION);
    }
    //acaba com a sessão. presente em todas as pags
    if(isset($_POST['btn-sair'])){
        session_unset();
        echo "<script>alert('Saindo!'); window.location = '../../login.php';</script>";
        //session_destroy();
        
    }
    if(isset($_POST['sn-btn'])){
        //var_dump($_POST);
        $clienteDAO->alterarSenha($_POST['sn-nome'],$_POST['sn-ra'],$_POST['sn-senha']);
    }
    //executa um forEach para cada item do carrinho, inserindo-o na tabela histórico
    if(isset($_POST['btn-comprar'])){
        $qnts = array();
        $lancheID = array ();
        $lancheID = $_POST['item-id'];
        $qnts = $_POST['item-qt'];
        $pag = $_POST['pagamento'];
        if(empty($lancheID)){
            echo "<script> alert('carrinho vazio!'); window.location = '../../views/home.php' </script>";
            
        }
        //var_dump($_POST['pagamento']);
        // var_dump($lancheID);
        // var_dump(count($lancheID));
        $j = count($lancheID);
        for($i=0;$i<$j;$i++){
             $clienteDAO->comprar($lancheID[$i],$qnts[$i],$_SESSION['ra'],$pag);
        }
        $_SESSION['historico'] = $clienteDAO->pegarHistorico($_SESSION['ra']);
        var_dump($_SESSION);
        echo "<script>alert('Compra realizada com sucesso!'); window.location = '../../views/historico.php';</script>";
    }
//$query->fetch(PDO::FETCH_ASSOC);
?>


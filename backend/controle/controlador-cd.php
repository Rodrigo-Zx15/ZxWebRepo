<?php
    //session_unset();
    session_start();
    include '../../views/cadastro.php';
    include '../../views/carrinho.php';
    include '../../views/historico.php';
    include '../../login.php';
    require '../modelo/cliente.php';
    require '../modelo/clienteDAO.php';
    //session_start();
    $clienteDAO = new ClienteDAO();
    if(isset($_POST['cd-btn'])){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $senha = $_POST['senha'];
        $senha = MD5($senha);
        $ra = filter_input(INPUT_POST, 'ra', FILTER_SANITIZE_SPECIAL_CHARS);
        $tipo = $_POST['usuario'];
        
        $cliente = new ClienteCadastro($ra, $nome, $tipo, $senha);
        //var_dump($cliente);
        $clienteDAO->cadastrar($cliente->getRa(),$cliente->getNome(),$cliente->getTipo(),$cliente->getSenha());    
    }
    if(isset($_POST['lg-btn'])){
        $ra = $_POST['lg-ra'];
        $senha = $_POST['lg-senha'];
        $campus = $_POST['lg-campus'];
        $senha = MD5($senha);
        $queryResult = $clienteDAO->logar($ra, $senha, $campus);
        
        
        
        $clienteLog = new Cliente( $queryResult[0]['ra'],$queryResult[0]['nome']);
        $lanches = $queryResult[1];
        $compras = $queryResult[2];
        var_dump($queryResult[1]);
        var_dump($clienteLog);
        
        //$idSession = session_id();
        $_SESSION['lanches'] = $lanches;
        $_SESSION['cliente'] = $clienteLog;
        $idCliente = $clienteLog->getRa();
		$_SESSION['ra'] = $idCliente;
        echo "<script>console.log('$idSession');window.location='../../views/home.php'</script>";
        
    }
    if(isset($_POST['btn-sair'])){
        session_unset();
        echo "<script>alert('Saindo!'); window.location = '../../login.php';</script>";
        //session_destroy();
        
    }
    if(isset($_POST['btn-comprar'])){
        $qnts = array();
        $lancheID = array ();
        $lancheID = $_POST['item-id'];
        $qnts = $_POST['item-qt'];
        $pag = $_POST['pagamento'];
        //var_dump($_POST['pagamento']);
        var_dump($lancheID);
        var_dump(count($lancheID));
        $j = count($lancheID);
        for($i=0;$i<$j;$i++){
             $clienteDAO->comprar($lancheID[$i],$qnts[$i],$_SESSION['ra'],$pag);
        }
 
        
    }
//$query->fetch(PDO::FETCH_ASSOC);
?>


<?php

    //inicialmente, eu estava fazendo todo o back em mysqli mas resolvi mudar tudo pra PDO
    class ClienteDAO{
        function cadastrar($ra, $nome, $tipo, $senha) {
            
            try {
            //Conecta com banco de dados
                $conectar = new PDO("mysql:host=localhost;dbname=teste", "root", "");
                $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            //Prepara uma instrução SQl para ser executada
                $query = $conectar->prepare('SELECT * FROM aluno WHERE ra = :ra');
                $query->execute(array(':ra'=>"$ra"));
                $verificar = $query->fetch(PDO::FETCH_ASSOC);
                if(!empty($verificar)){
                    echo "<script>alert('Usuário já cadastrado!'); window.location = '../../views/cadastro.php';</script>";
                }
                $instrucao_sql = $conectar->prepare('INSERT INTO aluno (ra,nome,tipo,senha) VALUES (:ra, :nome,:tipo,:senha)');
            // Executa a instrução SQL vinculando as referências aos valores passados por parâmetro
                $instrucao_sql->execute(array(':ra'=>"$ra",':nome' => "$nome", ':tipo' => "$tipo", ':senha' => "$senha"));
            //solta um alert e manda pra pag de login 
                echo "<script>alert('Usuário cadastrado com sucesso!'); window.location = '../../login.php';</script>";
                
            } catch (PDOException $e) {
            // Caso ocorra, mostra o erro gerado.
                echo 'Error: ' . $e->getMessage();
            }
        }
        function pegarHistorico($ra){
           
            try{
                $conectar = new PDO("mysql:host=localhost;dbname=teste", "root", "");
                $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $queryH = $conectar->prepare("SELECT h.dataCompra, h.quantidade,ROUND((l.preco * h.quantidade),2) as valor, l.nomeLanche, h.metodoPagamento 
                FROM `historico` AS h
                JOIN aluno as a ON a.ra = h.clienteID
                JOIN lanche as l ON l.id = h.lancheID
                WHERE a.ra = :ra");
                $queryH->execute(array(':ra'=>"$ra")); 
                $resultQuery = $queryH->fetchAll();

                return $resultQuery;
            }catch(PDOException $e){
                echo "Erro: ".$e;
            }

        }
        function logar($ra, $senha, $campus){
             //Conecta com banco de dados
             $sim = new ClienteDAO();
             try{
                $results = array ();
                $conectar = new PDO("mysql:host=localhost;dbname=teste", "root", "");
                $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $conectar->prepare("SELECT nome,ra FROM aluno WHERE :senha = senha AND :ra = ra");
                $queryL = $conectar->prepare("SELECT * FROM lanche WHERE :campus LIKE campus");
                            
                $query->execute(array(':senha'=>"$senha",':ra'=>"$ra"));
                $queryL->execute(array(':campus'=>"$campus"));
                $query = $query->fetch(PDO::FETCH_ASSOC);
                $queryL = $queryL->fetchAll();
                
                if(empty($query['ra'])){
                    echo "<script>alert('Usuário e/ou senha inválido.'); window.location = '../../login.php';</script>";
                }  
                $results[] = $query; 
                $results[] = $queryL;
                $results[] = $sim->pegarHistorico($ra); 
                //var_dump($results);
                return $results;
            }catch(PDOException $e){
                echo 'Erro: '. $e.getMessage();
            }
        }

        function comprar($idLanche, $qnt, $idCliente, $pagamento){
             
            try{
                $conectar = new PDO("mysql:host=localhost;dbname=teste", "root", "");
                $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $conectar->prepare("INSERT INTO historico (dataCompra,	clienteID, lancheID, quantidade, metodoPagamento) 
                VALUES(SYSDATE(), :clienteID, :lancheID, :quantidade, :metodo)");
                $query = $query->execute(array(':clienteID'=>"$idCliente", ':lancheID'=>"$idLanche", ':quantidade'=>"$qnt",':metodo'=>"$pagamento"));                    
 
            }catch(PDOException $e){
                echo 'Alerta de macaco: '.$e.getMessage();
            }
            
        }
        function alterarSenha($nome, $ra, $novaSenha){
            try{
                $novaSenha = MD5($novaSenha);
                $conectar = new PDO("mysql:host=localhost;dbname=teste", "root", "");
                $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query1 = $conectar->prepare("SELECT nome,ra FROM aluno WHERE :nome = nome AND :ra = ra");
                $query1->execute(array(':nome'=>"$nome",':ra'=>"$ra"));
                $queryR = $query1->fetch(PDO::FETCH_ASSOC);
                var_dump($queryR);
                //esse if NAO FUNCIONA
                if(empty($queryR)){
                    echo "<script>alert('Usuário não encontrado!'); window.location'../../views/senha.php'</script>";
                }
                    //md5car a novaSenha 
                    $mudarSenha= $conectar->prepare("UPDATE aluno SET senha = :novaSenha WHERE :nome = nome AND :ra = ra");
                    $mudarSenha->execute(array(':novaSenha'=>"$novaSenha",':nome' => "$nome",':ra'=>"$ra"));
                
            }catch(PDOException $e){
                echo 'Alerta de macaco: '.$e.getMessage();
            }
            echo "<script>alert('Senha alterada com sucesso!'); window.location ='../../login.php'</script>";
        }
    }  


?>
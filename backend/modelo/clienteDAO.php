<?php

    
    class ClienteDAO{
        function cadastrar($ra, $nome, $tipo, $senha) {
            
            try {
            //Conecta com banco de dados
                $conectar = new PDO("mysql:host=localhost;dbname=teste", "root", "");
                $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            //Prepara uma instrução SQl para ser executada
                $instrucao_sql = $conectar->prepare('INSERT INTO aluno (ra,nome,tipo,senha) VALUES (:ra, :nome,:tipo,:senha)');
            // Executa a instrução SQL vinculando as referências :nome,:curso,:email aos valores passados por parâmetro
                $instrucao_sql->execute(array(':ra'=>"$ra",':nome' => "$nome", ':tipo' => "$tipo", ':senha' => "$senha"));
            //apresenta uma mensagem e redireciona para a página de mostra_aluno.php.  
                echo "<script>alert('Usuário cadastrado com sucesso!'); window.location = '../../login.php';</script>";
                
            } catch (PDOException $e) {
            // Caso ocorra, mostra o erro gerado.
                echo 'Error: ' . $e->getMessage();
            }
        }
        function logar($ra, $senha, $campus){
             //Conecta com banco de dados
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
                //var_dump($query);
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
            echo "<script>alert('Compra realizada com sucesso!'); window.location = '../../views/historico.php';</script>";
        }
    }  


?>
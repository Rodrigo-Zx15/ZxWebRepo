<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $sucesso = true;
    $conectado = @mysqli_connect($hostname,$username,$password);

    if(!$conectado){
        echo "Conexão com MySQL falhou.".mysql_connect_error();
        $sucesso = false;
    }else{
        echo "sucesso!";
    }
    if($sucesso){
        $dbNome = "AnhembiEats";
        $dbQuery = "CREATE DATABASE $dbNome";
        $criado = mysqli_query($conectado,$dbQuery);
        $conectado = mysqli_connect($hostname,$username,$password,$dbname);
        //criando a table
        
    }

?>
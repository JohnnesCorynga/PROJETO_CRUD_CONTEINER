<?php
    //parâmetros de conexão
    $HOST = "localhost";
    $USER = "root";
    $PASSWORD = "";
    $DB = "db_conteiner";

    //criar o objeto de conexão
    $conn = new mysqli($HOST, $USER, $PASSWORD, $DB);
    //teste de conexão
    if ($conn->connect_error) {
        die("Falha na conexão!");
    //}else{echo "Conexão Ok!";
    };






?>
<?php
    include_once("conexao.php");
       
        $nome = strtoupper(filter_input(INPUT_POST, 'nome'));//Esta função é usada para validar variáveis ​​de fontes não seguras, como entrada do usuário do formulário. Esta função é muito útil para prevenir alguma ameaça potencial de segurança como SQL Injection.
        //$nome= $_POST["nome"];
        $cliente= strtoupper($_POST["cliente"]);
        $tipo= $_POST["tipo"];
        $status= $_POST["status"];
        $categoria=  $_POST["categoria"];
        
        $sql = "INSERT INTO `tb_conteiner` (n_conteiner,cliente, tipo,status, categoria) VALUES 
        ('$nome', '$cliente', '$tipo', '$status', '$categoria')";
        //echo $sql;
        if ($conn->query($sql)===TRUE) {
?>
        <script>
            alert("Conteiner salvo com sucesso");
            window.location = "select_conteiner.php";
        </script>
<?php
        }else{
?>
        <script>
            alerte("Error ao inserir dados!");
            window.history.back();
        </script>
<?php
        }
?>
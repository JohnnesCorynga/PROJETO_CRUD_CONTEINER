<?php
    include_once("conexao.php");
       
        $idConteiner= $_POST["idConteiner"];//Esta função é usada para validar variáveis ​​de fontes não seguras, como entrada do usuário do formulário. Esta função é muito útil para prevenir alguma ameaça potencial de segurança como SQL Injection.
        $tipoMovi= $_POST["movimentacao"];
        $inicio= $_POST["dataInicio"]." ".$_POST["horaInicio"];
        $fim= $_POST["dataFim"]." ".$_POST["horaFim"];
        
        $sql = "INSERT INTO `tb_movimentacao` (id_conteiner, tipo, inicio, fim) VALUES ('$idConteiner', '$tipoMovi', '$inicio', '$fim')";
        //echo $sql;
        if ($conn->query($sql)===TRUE) {
?>
        <script>
            alert("Movimentação salva com sucesso!");
            window.location = "novaMovimentacao.php?id=<?php echo $idConteiner ?>";
        </script>
<?php
        }else{
?>
        <script>
            alerte("Error ao inserir movimentação!");
            window.history.back();
        </script>
<?php
        }
?>
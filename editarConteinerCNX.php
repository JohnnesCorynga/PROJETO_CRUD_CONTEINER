<?php
    include_once("conexao.php");
        $id = $_POST["nId"];
        $nome= $_POST["nome"];
        $cliente= $_POST["cliente"];
        $tipo= $_POST["tipo"];
        $status= $_POST["status"];
        $categoria=  $_POST["categoria"];
    $sql= "UPDATE tb_conteiner SET n_conteiner= '$nome',cliente='$cliente', tipo='$tipo',status='$status', categoria='$categoria' WHERE id = $id";
        //echo $sql;
        if($conn->query($sql)===TRUE){
?>
    <script>
        alert("Conteiner atualizado com sucesso!!");
        window.location = "select_conteiner.php";
    </script>
<?php
        }else{
?>
    <script>
        alert("Error ao atualizar registro!");
        window.history.back();
    </script>
<?php
        }
?>
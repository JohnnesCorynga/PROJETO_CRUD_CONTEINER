<?php
    include_once("conexao.php");
    $idConteiner = $_GET['id'];
    $sql = "DELETE FROM tb_conteiner WHERE id = $idConteiner";
    if($conn->query($sql)===TRUE){
?>  
    <script>
        alert("Conteiner excluído com sucesso!");
        window.location = "select_conteiner.php"
    </script>
<?php
    }else{
?>
    <script>
        alert("Error ao excluír o conteiner!");
        window.location = "select_conteiner.php";
    </script>
<?php
    }
?>
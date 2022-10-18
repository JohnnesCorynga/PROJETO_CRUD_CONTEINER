<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Conteiner</title>
</head>
<body>
    <?php include_once("index.html") ?>
        <div class="tableConteiner mt-5">
                        <h2>Tabela de Conteiner</h2>
                        <a type="button" class="btn btn-primary" href="novoConteiner.php">+ Novo Conteiner</a>
                    <?php 
                        include_once("conexao.php");
                            $sql = 'SELECT * FROM tb_conteiner ORDER BY n_conteiner';
                            $dadosConteiner= $conn->query($sql);
                            if($dadosConteiner->num_rows>0){
                                //echo "Foi Retornado algum comando!!";
                    ?>
                    <table class="table-dark table table-striped table-bordered table-hover table-condensed">
                        <tr>
                            <th>Id</th>
                            <th>Nº Conteiner</th>
                            <th>Cliente</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Categoria</th>
                            <th>Move</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                            <?php
                                while($exibirConteiner = $dadosConteiner->fetch_assoc()){
                            ?>
                        <tr>
                            <td><?php echo $exibirConteiner["id"] ?></td>
                            <td><?php echo $exibirConteiner["n_conteiner"] ?></td>
                            <td><?php echo $exibirConteiner["cliente"] ?></td>
                            <td><?php echo $exibirConteiner["tipo"] ?></td>
                            <td><?php echo $exibirConteiner["status"] ?></td>
                            <td><?php echo $exibirConteiner["categoria"] ?></td>
                            <td><a href="novaMovimentacao.php?id=<?php echo $exibirConteiner["id"] ?>">Move</a> </td>
                            <td><a href="editarConteiner.php?id=<?php echo $exibirConteiner["id"] ?>">Editar</a></td>
                            <td><a href="#" onclick="confirmarExclusao(<?php echo $exibirConteiner['id']; ?>,'<?php echo $exibirConteiner['n_conteiner'] ?>')">Excluir</a></td>
                        </tr>
            <?php
                    }
            ?>
                    </table>
            <?php
                        }else{
                            echo "Nenhum registro encontrado!";
                        }    
            ?>
                    
        </div>
        <script>
            function confirmarExclusao(id,conteiner){
                if(window.confirm("Deseja realmente excluír o Conteiner???\n " +id+ " - " +conteiner+"\n\n\n")){
                    window.location = "excluirConteinerCNX.php?id="+id;
                }
            }
        </script>
</body>
</html>
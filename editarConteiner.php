<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar conteiner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="html_css/style.css">-->
    
</head>
<body>
    
    <?php
        include_once("index.html");
        include_once("conexao.php"); 
        $idConteiner = $_GET["id"];
        $sql = "SELECT *FROM tb_conteiner WHERE id = $idConteiner";
        $executa = $conn->query($sql);
        $conteiner = $executa->fetch_assoc();
        
    ?>
  
    <form class="formulario mt-5" action="editarConteinerCNX.php" method="post"> 
        <h1>Editar conteiner</h1>
        <hr><br>
        <div class="field">
            <label for="Id">Id</label>
            <input type="text" id="nId" name="nId" maxlength="11" value="<?php echo $conteiner["id"] ?>" readonly>
        </div>
        <div class="field">
            <label for="conteiner">Conteiner</label>
            <input type="text" id="nome" name="nome" maxlength="11" value="<?php echo $conteiner["n_conteiner"] ?>" placeholder="ABCD1234567" required>
        </div>
        
        <div class="field">
            <label for="cliente">Cliente</label>
            <input type="text" id="cliente" name="cliente" value="<?php echo $conteiner["cliente"] ?>" 
            placeholder="Nome do Cliente" required>
        </div>       
        <table class="divRadios">
                <tr>
                    <th><label for="Tipo">Tipo: </label></th>
                    <td><input type="radio" name="tipo" id="20" value="20"<?php echo $conteiner["tipo"]==20?"checked": ""; ?> ><label for="20">20</label></td>
                    <td><input type="radio" name="tipo" id="40" value="40" required <?php echo $conteiner["tipo"]==40?"checked": ""; ?>><label for="40">40</label></td>
                </tr>
                <tr>
                    <th><label for="Status">Status: </label></th>
                    <td><input type="radio" name="status" id="cheio" value="cheio"<?php echo $conteiner["status"]=="Cheio"?"checked": ""; ?>><label for="cheio">Cheio</label></td>
                    <td><input type="radio" name="status" id="vazio" value="vazio" required <?php echo $conteiner["status"]=="Vazio"?"checked": ""; ?>><label for="vazio">Vazio</label></td>
                </tr>
                <tr>
                    <th><label for="Categoria">Categoria: </label></th>
                    <td><input type="radio" name="categoria" id="importacao" value="importacao"<?php echo $conteiner["categoria"]=="Importação"?"checked": ""; ?>><label for="importacao">Importação</label></td>
                    <td><input type="radio" name="categoria" id="exportacao" value="exportacao" required <?php echo $conteiner["categoria"]=="Exportação"?"checked": ""; ?>><label for="exportacao">Exportação</label></td>
                </tr>
        </table>

        <div class="m-5 botoes">
            <button class="btn btn-success btn-lg" type="submit" value="Salvar">Salvar</button>
            <button class="btn btn-danger btn-lg" type="reset" value="Cancelar">Cancelar</button>
        </div>        
    </form>         
</body>
</html>
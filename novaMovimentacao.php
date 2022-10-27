<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentação</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="html_css/style.css">-->
    
</head>
<body>
    <?php 
        include_once("index.html");
        include_once("conexao.php");
        $idMovi = $_GET["id"];
    ?>
    <button type="button" class="move btn btn-primary" onclick="novoMove()">+ Nova Movimentação</button>
        <div class="divAvo">
            <div class="hidden">
                    <form class="m-1 formulario" action="novaMovimentacaoCNX.php" method="post">
                        <h1>Nova Movimentação</h1>
                            <hr><br>
                            <div class="field">
                                <label for="conteiner">Id Conteiner</label>
                                <input value="<?php echo $idMovi?>" name="idConteiner" type="text" id="idConteiner" placeholder="Id Conteiner" name="idConteiner" readonly>
                            </div>
                            <div class="divOptions">
                                <label for="Tipo">Tipo de Movimentação: </label>
                                    <select name="movimentacao" class="form-select ">
                                    <option value="0">>-- Selecione uma Categoria--<</option>
                                        <option value="Embarque" require>Embarque</option>
                                        <option value="Descarga">Descarga</option>
                                        <option value="Gate In">Gate In</option>
                                        <option value="Gate Out">Gate Out</option>
                                        <option value="Reposicionamento">Reposicionamento</option>
                                        <option value="Pesagem">Pesagem</option>
                                        <option value="Scanner">Scanner</option>
                                    </select>
                            </div>
                            <div class="field">
                                <label for="cliente">Data e Hora Inicio</label>
                                <input type="date" id="dataInicio" name="dataInicio" placeholder="Nome do Cliente" required>
                                <input type="time" id="horaInicio" name="horaInicio" placeholder="Nome do Cliente" required>
                                <label for="cliente">Data e Hora Fim</label>
                                <input type="date" id="dataFim" name="dataFim" placeholder="Nome do Cliente" required>
                                <input type="time" id="horaFim" name="horaFim" placeholder="Nome do Cliente" required>
                            </div> 

                            <div class="m-2 botoes">
                                <button class="btn btn-success btn-lg" type="submit" value="Salvar">Salvar</button>
                                <button onclick="novoMove()" class="btn btn-danger btn-lg" type="reset" value="Cancelar">Cancelar</button>
                            </div>
                    </form>
                </div>
           

            <div class="divPai">
                <div class="tableConteinerMoves">
                    <h2 style="margin:auto;">Movimetações</h2>
                        <table class="caption-top table-dark table table-striped table-bordered table-hover table-condensed">
                            <caption>
                                <h3>
                                    <?php
                                        $sql = "SELECT * FROM tb_conteiner WHERE id = $idMovi";
                                        $dadosConteiner= $conn->query($sql);
                                        if($dadosConteiner->num_rows>0){
                                        $exibirConteiner = $dadosConteiner->fetch_assoc();
                                        echo $exibirConteiner["n_conteiner"];
                                        };
                                    ?>
                                </h3>
                            </caption>
                            
                                <tr>
                                    <th>Id Move</th>
                                    <th>Id Conteiner</th>
                                    <th>Tipo</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                </tr>
                                    <?php
                                        $sql = "SELECT * FROM tb_movimentacao WHERE id_conteiner = $idMovi";
                                        $dadosMovi= $conn->query($sql);
                                        if($dadosMovi->num_rows>0){
                                        while($exibirMovi = $dadosMovi->fetch_assoc()){
                                    ?>
                                <tr>
                                    <td><?php echo $exibirMovi["id"] ?></td>
                                    <td><?php echo $exibirMovi["id_conteiner"] ?></td>
                                    <td><?php echo $exibirMovi["tipo"] ?></td>
                                    <td><a href="#">Editar</a></td>
                                    <td><a href="#">Excluír</a></td>
                                </tr>

                        
                            <?php
                                } 
                            }                             
                            ?>   
                            

                        </table>
                </div>
            </div> 
        </div>
    <script>
        function novoMove(){
            if(document.querySelector(".hidden").style.display == "block"){
                document.querySelector(".hidden").style.display = "none";
                document.querySelector(".divPai").style.opacity = "1"; 
            }else{
                document.querySelector(".hidden").style.display = "block"
                document.querySelector(".divPai").style.opacity = ".3";
                document.querySelector(".hidden").style.opacity = "1";
            }
        }

    </script>
</body>
</html>
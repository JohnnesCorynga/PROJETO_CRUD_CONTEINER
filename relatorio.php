<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Conteiner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
</head>
<body>
        <?php 
            include_once("index.html");
            include_once("conexao.php");
            $sql = 'SELECT * FROM tb_conteiner ORDER BY id';
                    $dadosConteiner= $conn->query($sql);
                    $importacao=0;
                    $exportacao=0;
                    $Ccheio=0;
                    $Cvazio=0;
                    if($dadosConteiner->num_rows>0){
                        while($exibirConteiner = $dadosConteiner->fetch_assoc()){
                            $defCategoria = $exibirConteiner["categoria"];
                            if($defCategoria=="Importação"){
                                $importacao+=1;
                            }else{
                                $exportacao+=1;
                            };
                            $defStatus = $exibirConteiner["status"];
                            if($defStatus=="Cheio"){
                                $Ccheio+=1;
                            }else{
                                $Cvazio+=1;
                            };
                        }
                    }
                    
            $sql2 = 'SELECT * FROM tb_movimentacao ORDER BY id';
                    $dadosMove= $conn->query($sql2);
                    $embarque=0;
                    $descarga=0;
                    $gate_in=0;
                    $gate_out=0;
                    $reposicionamento=0;
                    $pesagem=0;
                    $scanner=0;
                    if($dadosMove->num_rows>0){
                        while($exibirMove = $dadosMove->fetch_assoc()){
                            $recebe = $exibirMove["tipo"];
                            switch ($recebe) {
                                case 'Embarque':$embarque+=1;break;
                                case 'Descarga':$descarga+=1;break;
                                case 'Gate In':$gate_in+=1;break;
                                case 'Gate Out':$gate_out+=1;break;
                                case 'Reposicionamento':$reposicionamento+=1;break;
                                case 'Pesagem':$pesagem+=1;break;
                                default:$scanner+=1;break;
                            }
                        }
                    };
        ?>   
            <div class="conteiner mt-5">
                <div class="tableConteiner">
                    <table style="text-align: center;" class="caption-top table-dark table table-striped table-bordered table-hover table-condensed">
                        <caption>
                            <h2>Relatório dos conteiners</h2>
                        </caption>
                            <thed>
                                <tr>
                                    <th>Importações</th>
                                    <th>Exportações</th>
                                    <th>C. Cheios</th>
                                    <th>C. Vazios</th>
                                </tr>
                            </thed>
                            <tr>
                                <td><?php echo $importacao; ?></td>
                                <td><?php echo $exportacao; ?></td>
                                <td><?php echo $Ccheio; ?></td>
                                <td><?php echo $Cvazio; ?></td>
                            </tr>
                    </table>
                </div>
            </div>
            <div class="conteiner mt-5">
                <div class="tableConteiner">
                    <table style="text-align: center;" class="caption-top table-dark table table-striped table-bordered table-hover table-condensed">
                        <caption>
                            <h2>Relatório de Movimentações</h2>
                        </caption>
                            <thed>
                                <tr>
                                    <th>Embarque</th>
                                    <th>Descarga</th>
                                    <th>Gate In</th>
                                    <th>Gate Out</th>
                                    <th>Reposicionamento</th>
                                    <th>Pesagem</th>
                                    <th>Scanner</th>
                                </tr>
                            </thed>
                            <tr>
                                <th><?php echo $embarque;?></th>
                                <th><?php echo $descarga;?></th>
                                <th><?php echo $gate_in;?></th>
                                <th><?php echo $gate_out;?></th>
                                <th><?php echo $reposicionamento;?></th>
                                <th><?php echo $pesagem;?></th>
                                <th><?php echo $scanner;?></th>
                             
                            </tr>
                    </table>
                </div>
            </div>
</body>
</html>
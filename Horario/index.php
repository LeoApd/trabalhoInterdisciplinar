<?php
    include_once '../dao/HorarioDao.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous" />
    <title>Horário</title>

</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" style="color:aliceblue">App Rastreamento</a>
    </nav>
    <br />
    <br />
    <div class="container">

        <?php 
                
            $Horario = new Horario();
            $dao = new HorarioDao();
            if(isset($_POST['gravar'])){
    
                $codigo = $_POST['txtCOnibus'];
                $linha = $_POST['txtLOnibus'];
                $poi = $_POST['txtPInicial'];
                $pof = $_POST['txtPFinal'];
                $hi = $_POST['txtHInicial'];
                $hf = $_POST['txtHFinal'];
    
                if($codigo == '' && $linha == '' && $poi == '' && $pof == '' && $hi == '' && $hf == ''){
                    echo '<div class="alert alert-danger" role="alert">
                            Campos vazio
                        </div>';
                }else{
                    $Horario->setCodigo($codigo);
                    $Horario->setLinha($linha);
                    $Horario->setPoi($poi);
                    $Horario->setPof($pof);
                    $Horario->setHi($hi);
                    $Horario->setHf($hf);
    
                    if($dao->save($Horario)){
                        echo '<div class="alert alert-success" role="alert">
                                Dados Salvos
                            </div>';
                        }else{
                            echo '<div class="alert alert-danger" role="alert">
                                    Não foi possivel cadastrar os dados;
                                </div>';
                            }
                    }
                        
            }
    
        ?>

        <h3>Cadastrar Horário</h3>
        <hr>
        <br>

        <form method="post">

            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="txtCOnibus">Código do Ônibus</label>
                        <input type="text" class="form-control" id="txtCOnibus" placeholder="Código do Ônibus" name="txtCOnibus">
                    </div>
                </div>
                <div class="col-8">
                        <div class="form-group">
                            <label for="txtLOnibus">Linha do Ônibus</label>
                            <input type="text" class="form-control" id="txtLOnibus" placeholder="Linha do Ônibus" name="txtLOnibus">
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="txtPInicial">Ponto Inicial</label>
                        <input type="text" class="form-control" id="txtPInicial" placeholder="Ponto Inicial" name="txtPInicial">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="txtHInicial">Horário Inicial</label>
                        <input type="time" class="form-control" id="txtHInicial" name="txtHInicial">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="txtPFinal">Ponto Final</label>
                        <input type="text" class="form-control" id="txtPFinal" placeholder="Ponto Final" name="txtPFinal">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="txtHFinal">Horário Final</label>
                        <input type="time" class="form-control" id="txtHFinal" name="txtHFinal">
                    </div>
                </div>
            </div>
            <div class="text-right">
            <input type="submit" name="gravar" class="btn btn-success" value="Cadastrar Horiário" />
            </div>
        </form>
        <br/>
        <br/>
        <h3>Horários</h3>
        <br>
        <table class="table" id="tabela">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Linha</th>
                    <th>Ponto Inicial</th>
                    <th>Horário Inicial</th>
                    <th>Ponto Final</th>
                    <th>Horário Final</th>
                </tr>
            </thead>
            <tbody id="tabelaCorpo">

            <?php 
                $dao = new HorarioDao();
                foreach ($dao->findAll() as $value){
            ?>
                <tr>
                    <td><?php echo $value['codigo'];?></td>
                    <td><?php echo $value['linha'];?></td>
                    <td><?php echo $value['poi'];?></td>
                    <td><?php echo $value['hi'];?></td>
                    <td><?php echo $value['pof'];?></td>
                    <td><?php echo $value['hf'];?></td>
                   
                </tr>
            <?php 
                }
            ?>

            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Linha</th>
                    <th>Ponto Inicial</th>
                    <th>Horário Inicial</th>
                    <th>Ponto Final</th>
                    <th>Horário Final</th>
                </tr>
            </tfoot>

        </table>
    </div>
</body>

</html>
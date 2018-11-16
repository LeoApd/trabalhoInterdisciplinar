<?php
    include_once '../dao/RotasDao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous" />

        
    <title>Rotas</title>

</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" style="color:aliceblue">App Rastreamento</a>
    </nav>
    <br />

    <div class="container">

         <?php 
                
            $Rotas = new Rotas();
            $dao = new RotasDao();
            if(isset($_POST['gravar'])){

                $nomeRota = $_POST['txtNRota'];
                $pontoInicial = $_POST['txtPInicial'];
                $pontoFinal = $_POST['txtPFinal'];

                if($nomeRota == '' && $pontoInicial == '' && $pontoFinal == ''){
                    echo '<div class="alert alert-danger" role="alert">
                            Campos vazio
                        </div>';
                }else{
                    $Rotas->setNomeRota($nomeRota);
                    $Rotas->setPontoInicial($pontoInicial);
                    $Rotas->setPontoFinal($pontoFinal);

                    if($dao->save($Rotas)){
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

        <h3>Cadastrar Rotas</h3>
        <hr>
        <br>
        <div id="form">

            <form method="post" >

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="txtNRota">Nome da Rota</label>
                            <input type="text" class="form-control" id="txtNRota" placeholder="Nome da Rota" name="txtNRota">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="txtHInicial">Ponto Inicial</label>
                            <input type="text" class="form-control" id="txtPInicial" placeholder="Ponto Inicial" name="txtPInicial">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="txtPFinal">Ponto Final</label>
                            <input type="text" class="form-control" id="txtPFinal" placeholder="Ponto Final" name="txtPFinal">
                        </div>
                    </div>
                </div>
                <div class="text-right">
                <input type="submit" name="gravar" class="btn btn-success" value="Salvar Rota" />
                </div>
            </form>
        </div>
        <br/>
        <br/>
        <h3>Horários</h3>
        <table class="table" id="tabela">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Rotas</th>
                    <th>Ponto Inicial</th>
                    <th>Ponto Final</th>
                    <th>Mapa</th>
                    <th></th>
                    
                </tr>
            </thead>
            <tbody id="tabelaCorpo">

            <?php 
                $dao = new RotasDao();
                foreach ($dao->findAll() as $value){
            ?>
                <tr>
                    <td><?php echo $value['id'];?></td>
                    <td><?php echo $value['nomeRota'];?></td>
                    <td><?php echo $value['pontoInicial'];?></td>
                    <td><?php echo $value['pontoFinal'];?></td>
                    <td><input type="submit" value="Mapa" name="mapa" class="btn btn-primary"></td></td>
                    <td><input type="submit" value="Editar" name="editar" class="btn btn-warning mr-2"><input type="button" value="Excluir" name="excluir" id="excluir" class="btn btn-danger"> </td>
                </tr>
            <?php 
                }
            ?>
            </tbody>
            <tfoot>
                <tr>
                <th>id</th>
                    <th>Rotas</th>
                    <th>Ponto Inicial</th>
                    <th>Ponto Final</th>
                    <th>Mapa</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>

        

    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <!--script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../js/views/rotas.js"></script>
    <script src="../js/models/Rotas.js"></script-->
</body>

</html>
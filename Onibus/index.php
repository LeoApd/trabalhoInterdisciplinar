<?php
    include_once '../dao/OnibusDao.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous" />
    <title>Onibus</title>

</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" style="color:aliceblue">App Rastreamento</a>
    </nav>
    <br />
    <div class="container">
    <?php 
                
                $Onibus = new Onibus();
                $dao = new OnibusDao();
                if(isset($_POST['gravar'])){
    
                    $codigo = $_POST['txtCodOnibus'];
                    $numero = $_POST['txtNumOnibus'];
                    $nomeRota = $_POST['txtNomeRota'];
    
                    if($codigo == '' && $numero == '' && $nomeRota == ''){
                        echo '<div class="alert alert-danger" role="alert">
                                Campos vazio
                            </div>';
                    }else{

                        $Onibus->setCodigo($codigo);
                        $Onibus->setNumero($numero);
                        $Onibus->setNomeRota($nomeRota);

                        if($dao->save($Onibus)){
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



        <h3>Cadastrar Ônibus</h3>
        <hr>
        <br>

        <form method="post">

            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label for="txtNumOnibus">Número do Ônibus</label>
                        <input type="text" class="form-control" id="txtNumOnibus" placeholder="Número" name="txtNumOnibus">
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="txtCodOnibus">Código do Ônibus</label>
                        <input type="text" class="form-control" id="txtCodOnibus" placeholder="Código" name="txtCodOnibus">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="txtNomeRota">Nome da rota do Ônibus</label>
                        <input type="text" class="form-control" id="txtNomeRota" placeholder="Nome da rota" name="txtNomeRota">
                    </div>
                </div>
            </div>
            <div class="text-right">
            <input type="submit" name="gravar" class="btn btn-success" value="Salvar Onibus" />
            </div>
        </form>
        <br/>
        <br/>

        <h3>Lista de Onibus Cadastrado</h3>
        
        <br>
        <table class="table" id="tabela">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Número</th>
                    <th>Código</th>
                    <th>Nome da Rota</th>
                </tr>
            </thead>
            <tbody id="tabelaCorpo">

            <?php 
                $dao = new OnibusDao();
                foreach ($dao->findAll() as $value){
            ?>
                <tr>
                    <td><?php echo $value['id'];?></td>
                    <td><?php echo $value['numero'];?></td>
                    <td><?php echo $value['codigo'];?></td>
                    <td><?php echo $value['nomeRota'];?></td>
                </tr>
            <?php 
                }
            ?>

            </tbody>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Número</th>
                    <th>Código</th>
                    <th>Nome da Rota</th>
                </tr>
            </tfoot>

        </table>

    </div>
</body>

</html>
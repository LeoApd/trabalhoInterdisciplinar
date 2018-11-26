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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">App Rastreamento</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="../Home/index.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Rotas/index.php">Rotas</a>
                </li>
                <li class="nav-item active" >
                    <a class="nav-link" href="../Horario/index.php">Horários<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../Onibus/index.php">Ônibus</a>
                </li>
            </ul>
        </div>
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

            //excluir
            if(isset($_POST['btnExcluir'])){

                $id = $_POST['idExcluir'];
                if($dao->delete($id)){
                    echo '<div class="alert alert-success" role="alert">
                            Dados Excluido
                        </div>';
                }else{
                    echo '<div class="alert alert-danger" role="alert">
                            Não foi possivel excluir os dados;
                    </div>';
                }
            }

            //alterar
            if(isset($_POST['btnAlterar'])){

                $id = $_POST['id'];
                $codigo = $_POST['modalCodigo'];
                $linha = $_POST['modalLinha'];
                $poi = $_POST['modalPInicial'];
                $hi = $_POST['modalHInicial'];
                $pof = $_POST['modalPFinal'];
                $hf = $_POST['modalHFinal'];

                $Horario->setCodigo($codigo);
                $Horario->setLinha($linha);
                $Horario->setPoi($poi);
                $Horario->setHi($hi);
                $Horario->setPof($pof);
                $Horario->setHf($hf);

                $Horario->setId($id);
                            
                //var_dump($Horario);

                if($dao->update($Horario)){
                    echo '<div class="alert alert-success" role="alert">
                                Dados Alterado
                            </div>';
                }else{
                    echo '<div class="alert alert-danger" role="alert">
                            Não foi possivel alterar os dados;
                        </div>';
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
                    <th>ID</th>
                    <th>Código</th>
                    <th>Linha</th>
                    <th>Ponto Inicial</th>
                    <th>Horário Inicial</th>
                    <th>Ponto Final</th>
                    <th>Horário Final</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tabelaCorpo">

            <?php 
                $dao = new HorarioDao();
                foreach ($dao->findAll() as $value){
            ?>
                <tr>
                    <td><?php echo $value['id'];?></td>
                    <td><?php echo $value['codigo'];?></td>
                    <td><?php echo $value['linha'];?></td>
                    <td><?php echo $value['poi'];?></td>
                    <td><?php echo $value['hi'];?></td>
                    <td><?php echo $value['pof'];?></td>
                    <td><?php echo $value['hf'];?></td>
                    <td>
                        <button type="button" id="btnEditar" class="btn btn-warning" data-toggle="modal" data-target=".modal" 
                        onclick="preencherModal('<?php echo $value['codigo'];?>','<?php echo $value['linha'];?>','<?php echo $value['poi'];?>','<?php echo $value['hi'];?>',
                        '<?php echo $value['pof'];?>','<?php echo $value['hf'];?>','<?php echo $value['id'];?>')">Editar</button>
                    </td>
                    <form action="" method="post">
                        <td>
                            <input type="hidden" name="idExcluir" id="btnExcluir" value="<?php echo $value['id'];?>">
                            <button class="btn btn-danger" type="submit" id="btnExcluir" name="btnExcluir">Excluir</button>
                        </td>
                    </form>
                </tr>
            <?php 
                }
            ?>

            </tbody>
        </table>
    </div>
    <br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><hr></div>

            <div class="col-sm-4">
                <h3>Gerenciamento</h3>
                <p>
                    Área de controle do aplicativo, aqui fazemos todos os cadastro de ónibus, rotas e etc.
                    E dessa informações que alimentamos nosso aplicativo de rastreamento.
                </p>
            </div>

            <div class="col-sm-4">
                <h3>Menu</h3>
                <div class="list-group text-center">
                <a href="../Home/index.php" class="list-group-item list-group-item-action ">Home</a>
                <a href="../Rotas/index.php" class="list-group-item list-group-item-action">Rotas</a>
                <a href="../Horario/index.php" class="list-group-item list-group-item-action">Horário</a>
                <a href="../Onibus/index.php" class="list-group-item list-group-item-action">Ónibus</a>
                </div>
            </div>

            <div class="col-sm-4">
                <h3>Social</h3>
                <div class="btn-group-vertical btn-block btn-group-lg" role="group">
                <a href="" class="btn btn-outline-primary">Facebook</a>
                <a href="" class="btn btn-outline-info">Twitter</a>
                <a href="" class="btn btn-outline-warning">Instagram</a>
                </div>
            </div>

            <div class="col-12 mt-5">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">Copyright © 2018 App Rastreamento - Todos os direitos reservados Política de Privacidade</p>
                    <footer class="blockquote-footer">Desenvolvido por <cite title="Titulo">Leonardo e Danilo</cite></footer>
                </blockquote>
            </div>

        </div>
    </div>






    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Cadastro de onibus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="modalCodigo">Código</label>
                                    <input type="text" class="form-control" id="modalCodigo" placeholder="Código" name="modalCodigo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="modalLinha">Linha</label>
                                    <input type="text" class="form-control" id="modalLinha" placeholder="Linha" name="modalLinha">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="modalPInicial">Ponto Inicial </label>
                                    <input type="text" class="form-control" id="modalPInicial" placeholder="Ponto Inicial" name="modalPInicial">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="modalHInicial">Horário Inicial</label>
                                    <input type="time" class="form-control" id="modalHInicial" name="modalHInicial">
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="modalPFinal">Ponto Final </label>
                                    <input type="text" class="form-control" id="modalPFinal" placeholder="Ponto Final" name="modalPFinal">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="modalHFinal">Horário Final</label>
                                    <input type="time" class="form-control" id="modalHFinal" name="modalHFinal">
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                        <input type="hidden" class="form-control" id="id" placeholder="Nome da rota" name="id">
                        <button type="submit" class="btn btn-primary" name="btnAlterar" id="btnAlterar">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>             



    <script src="../js/views/horario.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
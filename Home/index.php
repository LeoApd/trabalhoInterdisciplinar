<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous" />
    <title>Home</title>

</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" style="color:aliceblue">App Rastreamento</a>
        <form class="form-inline">
            <input class="form-control mr-sm-2 light" type="search" placeholder="Buscar " aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </nav>

    <br />

    <div class="container-fluid">
        <h3>Categoria</h3>
        <hr>
        <div class="row">
            <div class="col-4">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="../Onibus/index.php" role="tab" aria-controls="home">Cadastrar Ônibus</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="../Horario/index.php" role="tab" aria-controls="profile">Cadastrar Horário</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="../Rotas/index.php" role="tab" aria-controls="messages">Cadastrar Rotas</a>
                </div>
            </div>

            <div class="col-8">
                <h3>Painel Gerencial</h3>
                <hr><br>
                <div class="row">
                    <div class="col-4">
                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header">Messagens</div>
                            <div class="card-body">
                                <h5 class="card-title">Você possui nova messagens</h5>
                                <p class="card-text">10 Messagens não lidas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                            <div class="card-header">Avisos</div>
                            <div class="card-body">
                                <h5 class="card-title">Você possui nova messagens</h5>
                                <p class="card-text">15 Avisos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Reclamações</div>
                            <div class="card-body">
                                <h5 class="card-title">Você possui novas reclamações</h5>
                                <p class="card-text">30 novas Reclamações</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
    <title>Login</title>

</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" style="color:aliceblue">App Gerenciamento</a>
    </nav>
    <br /><br />

    <div class="container" id="erro"></div>

    <div class="container">
        <h3>Login</h3>
        <hr>
        <br />

        <form>
            <div class="form-group">
                <label for="txtUsuario">Usuário</label>
                <input type="text" class="form-control" id="txtUsuario" placeholder="Usuário">
            </div>
            <div class="form-group">
                <label for="txtPassword">Password</label>
                <input type="password" class="form-control" id="txtPassword" placeholder="Password">
            </div>
            <button id="btnEntrar" type="submit" class="btn btn-dark" style="color:aliceblue" >Entrar</button>
        </form>
        
    </div>

    <script src="js/views/login.js"></script>
    <script src="js/models/credencias.js"></script>
</body>
</html>
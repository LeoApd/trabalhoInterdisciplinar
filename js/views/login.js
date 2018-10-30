window.onload = function(){

    var credencial = new Credencias({
       usuario: 'admin@admin.com.br',
       password: 'admin'
    });

    var $divErro = document.getElementById('erro');

    var txtUsuario = document.getElementById('txtUsuario');
    var txtPassword = document.getElementById('txtPassword');

    txtUsuario.value = "";
    txtPassword.value = "";

    document.getElementById('btnEntrar').addEventListener('click', function (ev){
        ev.preventDefault();
        if(txtUsuario.value === credencial.usuario && txtPassword.value === credencial.password){
            console.log("entrou no if");
            return window.location = 'Home/index.html';
        }else{
            var erro = '<div class="alert alert-danger" role="alert">';
            erro +=  'Usuário ou Senha incorreto';
            erro += '</div>';

            $divErro.innerHTML = erro;

            txtPassword.value = "";
            txtUsuario.value = "";

            txtUsuario.focus();
           
        }


    });
}
window.onload = function(){

    var credencial = new Credencias({
       usuario: 'admin@admin.com.br',
       password: 'admin'
    });

    var txtUsuario = document.getElementById('txtUsuario');
    var txtPassword = document.getElementById('txtPassword');

    txtUsuario.value = "";
    txtPassword.value = "";

    document.getElementById('btnEntrar').addEventListener('click', function (ev){
        ev.preventDefault();
        if(txtUsuario.value === credencial.usuario && txtPassword.value === credencial.password){
            console.log("entrou no if");
            return window.location = '/';
        }else{

        }


    });
}
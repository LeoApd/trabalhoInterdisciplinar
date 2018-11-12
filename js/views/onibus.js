var listaOnibus = [];
window.onload = function(){
    var txtNumero = document.getElementById('txtNumOnibus');
    var txtCodigo = document.getElementById('txtCodOnibus');
    var txtNomeRota = document.getElementById('txtNomeRota');

    var divErro = document.getElementById('erro');

    var table = document.getElementById('tabelaCorpo');


    document.getElementById('btnCadastrar').addEventListener('click',function(ev){
        ev.preventDefault();
        
        if(txtNumero.value === '' && txtCodigo.value === '' && txtNomeRota.value === ''){
            var erro = '<div class="alert alert-danger" role="alert">';
            erro +=  'Campos Vazio';
            erro += '</div>';

            divErro.innerHTML = erro;

            txtNumero.focus();

        }else{

            var onibus = new Onibus({
                numero: txtNumero.value,
                codigo: txtCodigo.value,
                nomeRota: txtNomeRota.value
            });

    
            listaOnibus.push(onibus);

            table.innerHTML="";

            listaOnibus.forEach(addRow)

            function addRow(item){
                var row = '<tr>';
                row += '<td>' + item.numero + '</td>';
                row += '<td>' + item.codigo + '</td>';
                row += '<td>' + item.nomeRota + '</td>';
                row += '</tr>';

                table.innerHTML += row;
            }

            txtNumero.value = '';
            txtCodigo.value = '';
            txtNomeRota.value = '';

            txtNumero.focus();

        }
    });
}
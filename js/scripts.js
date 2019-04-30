function paraMaiusculo(input){
    input.value = input.value.toUpperCase();
}

function paraMinusculo(input){
    input.value = input.value.toLowerCase();
}

function limpa_formulario_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('Endereco').value = ("");
    document.getElementById('Bairro').value = ("");
    document.getElementById('Cidade').value = ("");
    document.getElementById('Estado').value = ("");

}
function selecionarEstado(campo, uf) {
    uf = uf.toUpperCase();
    switch (uf) {
        case 'AC':
        case 'ACRE':
            campo.selectedIndex = 1;
            break;
        case 'AL':
        case 'ALAGOAS':
            campo.selectedIndex = 2;
            break;
        case 'AM':
        case 'AMAZONAS':
        case 'AMAZONAS':
            campo.selectedIndex = 3;
            break;
        case 'AP':
        case 'AMAPA':
        case 'AMAPÁ':
            campo.selectedIndex = 4;
            break;
        case 'BA':
        case 'BAHIA':
            campo.selectedIndex = 5;
            break;
        case 'CE':
        case 'CEARA':
        case 'CEARÁ':
            campo.selectedIndex = 6;
            break;
        case 'DF':
        case 'DISTRITO FEDERAL':
            campo.selectedIndex = 7;
            break;
        case 'ES':
        case 'ESPIRITO SANTO':
            campo.selectedIndex = 8;
            break;
        case 'GO':
        case 'GOIAS':
        case 'GOIÁS':
            campo.selectedIndex = 9;
            break;
        case 'MA':
        case 'MARANHÃO':
        case 'MARANHAO':
            campo.selectedIndex = 10;
            break;
        case 'MG':
        case 'MINAS GERAIS':
            campo.selectedIndex = 11;
            break;
        case 'MS':
        case 'MATO GROSSO DO SUL':
            campo.selectedIndex = 12;
            break;
        case 'MT':
        case 'MATO GROSSO':
            campo.selectedIndex = 13;
            break;
        case 'PA':
        case 'PARA':
        case 'PARÁ':
            campo.selectedIndex = 14;
            break;
        case 'PB':
        case 'PARAÍBA':
        case 'PARAIBA':
            campo.selectedIndex = 15;
            break;
        case 'PE':
        case 'PERNAMBUCO':
            campo.selectedIndex = 16;
            break;
        case 'PI':
        case 'PIAUI':
        case 'PIAUÍ':
            campo.selectedIndex = 17;
            break;
        case 'PR':
        case 'PARANÁ':
        case 'PARANA':
            campo.selectedIndex = 18;
            break;
        case 'RJ':
        case 'RIO DE JANEIRO':
            campo.selectedIndex = 19;
            break;
        case 'RN':
        case 'RIO GRANDE DO NORTE':
            campo.selectedIndex = 20;
            break;
        case 'RO':
        case 'RONDONIA':
        case 'RONDÔNIA':
            campo.selectedIndex = 21;
            break;
        case 'RR':
        case 'RORAIMA':
            campo.selectedIndex = 22;
            break;
        case 'RS':
        case 'RIO GRANDE DO SUL':
            campo.selectedIndex = 23;
            break;
        case 'SC':
        case 'SANTA CATARINA':
            campo.selectedIndex = 24;
            break;
        case 'SP':
        case 'SAO PAULO':
        case 'SÃO PAULO':
            campo.selectedIndex = 25;
            break;
        case 'SE':
        case 'SERGIPE':
            campo.selectedIndex = 26;
            break;
        case 'TO':
        case 'TOCANTINS':
            campo.selectedIndex = 27;
            break;
        default:
            document.getElementById('Selecione um estado').selectedIndex = 0;
            break;
    }
}
function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('Endereco').value = (conteudo.logradouro.toUpperCase());
        document.getElementById('Bairro').value = (conteudo.bairro.toUpperCase());
        document.getElementById('Cidade').value = (conteudo.localidade);
//        document.getElementById('estado').value = (conteudo.uf);
        selecionarEstado(document.getElementById('Estado'), conteudo.uf);
        document.getElementById("Cidade").innerHTML = "";
        var cidade = {
            cidadeEncontrada: conteudo.localidade
        };
        var select = document.getElementById('Cidade');
        for (index in cidade) {
            select.options[select.options.length] = new Option(cidade[index], cidade[index]);
        }

        if (isEmpty(conteudo.bairro))
            requestFocus(document.getElementById('Bairro'));
        else if (isEmpty(conteudo.logradouro))
            requestFocus(document.getElementById('Endereco'));
        else
            requestFocus(document.getElementById('Numero'));

    } else {
        //CEP não Encontrado.
        limpa_formulario_cep();
        alert("CEP não encontrado.");
        document.getElementById('cep').value = ("");
    }
}
function isEmpty(str) {
    return (!str || 0 === str.length);
}
function pesquisacep(campoCEP) {
    //Nova variável "cep" somente com dígitos.
    var cep = campoCEP === document.getElementById('botaoPesquisarCEP') ? document.getElementById('CEP').value : campoCEP.value.replace(/\D/g, '');
    if (cep.length < 8 && campoCEP === document.getElementById('botaoPesquisarCEP')) {
        alert("Formato de CEP inválido.");
        return;
    }
    if (cep.length === 8) {
        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;
        //Valida o formato do CEP.
        if (validacep.test(cep)) {
            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('Endereco').value = "...";
            document.getElementById('Bairro').value = "...";
            document.getElementById('Cidade').value = "...";
            document.getElementById('Estado').value = "...";
            //Cria um elemento javascript.
            var script = document.createElement('script');
            //Sincroniza com o callback.
            script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);
        } else {
            alert("Formato de CEP inválido.");
            limpa_formulario_cep();
        }
    }
}

function TestaCPF(elemento) {
    cpf = elemento.value;
    cpf = cpf.replace(/[^\d]+/g, '');
    if (cpf === '') {
        //alert('CPF inválido ' + cpf);
        return elemento.style = 'box-shadow:0px 0px 4px #FF0000 ';
    }
    // Elimina CPFs invalidos conhecidos    
    if (cpf.length !== 11 ||
            cpf === "00000000000" ||
            cpf === "11111111111" ||
            cpf === "22222222222" ||
            cpf === "33333333333" ||
            cpf === "44444444444" ||
            cpf === "55555555555" ||
            cpf === "66666666666" ||
            cpf === "77777777777" ||
            cpf === "88888888888" ||
            cpf === "99999999999\n{") {
        alert('CPF inválido: ' + cpf);
        return elemento.style = 'box-shadow:0px 0px 4px #FF0000';
    }
    // Valida 1o digito 
    add = 0;
    for (i = 0; i < 9; i++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev === 10 || rev === 11)
        rev = 0;
    if (rev !== parseInt(cpf.charAt(9))) {
        alert('CPF inválido: ' + cpf);
        return elemento.style = 'box-shadow:0px 0px 4px #FF0000';
    }
    // Valida 2o digito 
    add = 0;
    for (i = 0; i < 10; i++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev === 10 || rev === 11)
        rev = 0;
    if (rev !== parseInt(cpf.charAt(10))) {
        alert('CPF inválido: ' + cpf);
        return elemento.style = 'box-shadow:0px 0px 4px #FF0000';
    }

    return elemento.style = 'box-shadow:0px 0px 4px  blue ';
}

function mascara(campo) {
    if (campo.id === 'NumeroTelefone') {
        if (campo.value.length === 0) {
            campo.value = '(' + campo.value;
        }
        if (campo.value.length === 3) {
            campo.value = campo.value + ') ';
        }

        if (campo.value.length === 9) {
            if (campo.value[5] < 6) {
                campo.value = campo.value + '-';
            }
        } else if (campo.value.length === 10) {
            campo.value = campo.value + '-';
        }
    } else if (campo.id === 'CPF') {
//        if (campo.value.length === 14) {
//            document.getElementById("Nome").focus();
//        }
        if (campo.value.length === 3) {
            campo.value = campo.value + '.';
        }
        if (campo.value.length === 7) {
            campo.value = campo.value + '.';
        }

        if (campo.value.length === 11) {
            campo.value = campo.value + '-';
        }
    } else if (campo.id === 'CEP') {
        if (campo.value.length === 5) {
            campo.value = campo.value + '-';
        }
    }
}

function requestFocus(campo) {
    campo.focus();
}

function mostrarAlerta(indice) {
    var divAlerta = document.getElementById('divAlerta');
    divAlerta.style.display = "block;";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            divAlerta.innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "../util/alertas.php?indice=" + indice, true);
    xhttp.send();

    //para o alert de login.php funcionar
    if (divAlerta.innerHTML === "") {
        var xhttp1 = new XMLHttpRequest();
        xhttp1.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                divAlerta.innerHTML = this.responseText;
            }
        };

        xhttp1.open("GET", "./util/alertas.php?indice=" + indice, true);
        xhttp1.send();
    }
    $(document).ready(function () {
        $(divAlerta).fadeIn(1000);
        $(divAlerta).fadeOut(5000);
    });
}
function verificarSeJaTemCPFCadastrado() {
    cpf = document.getElementById('CPF').value;
    var dataString = 'CPF=' + cpf;
    if (cpf === '') {
    } else {
        $.ajax({
            type: "POST",
            url: "verificaCPF.php",
            data: dataString,
            cache: false,
            success: function (retorno) {
                if (retorno === '1') {
                    mostrarAlerta(11);
                    document.getElementById("Cadastrar").disabled = true;
                } else {
                    document.getElementById("Cadastrar").disabled = false;
                }
            }
        });
    }
}


//Para o modal de impressão
function mostrarModalImpressao(){
    var divModal = document.getElementById('modalImpressao');
    divModal.style.display = "block";
    
    var valorInputIds = document.getElementsByName("ids[]")[0].getAttribute('value');
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            divModal.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../relatorio/modalImpressao.php?ids="+valorInputIds, true);
    xhttp.send();
}

function completaEtiquetas(id){
    for(var i = 0; i < id; i++){
        document.getElementById(i).style = "background-color: #ccc;";
    }
    for(var i = id; i < 14; i++){
        document.getElementById(i).style = "background-color: #bbf;";
    }
}

function insereEtiquetaVazia(id){
    var inputEtiquetasVazias = document.getElementById('etiquetasVazias');
    inputEtiquetasVazias.setAttribute('value',id.toString());
}

function fecharModal(id){
    document.getElementById(id).innerHTML = "";
    document.getElementById(id).style.display = "none";
}

//Fim modal impressão
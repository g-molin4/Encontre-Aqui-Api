    
function validaCriacaoSenha(){
    $(".divValidacaoSenha").html("")
    $(".divValidacaoSenha").css("color","red")
    if(document.getElementById("senha").value != document.getElementById("confirmaSenha").value && document.getElementById("senha").value != "" && document.getElementById("confirmaSenha").value !=""){
        $("#botaoEnvForm").attr("disabled","true")
        $("#botaoEnvForm").css("background-color","#565656")
        $(".divValidacaoSenha").html("As senhas devem ser ser iguais")
    }
    else if(document.getElementById("senha").value ==  document.getElementById("confirmaSenha").value && document.getElementById("senha").value.length<8 &&  document.getElementById("confirmaSenha").value.length<8 && document.getElementById("senha").value != "" && document.getElementById("confirmaSenha").value !=""){
        $("#botaoEnvForm").attr("disabled","true")
        $("#botaoEnvForm").css("background-color","#565656")
        $(".divValidacaoSenha").html("Sua senha deve possuir no mínimo 8 caracteres")
    }
    else if(document.getElementById("senha").value != "" && document.getElementById("confirmaSenha").value !=""){
        senha=document.getElementById("senha").value
        let letrasMin = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"]
        let letrasMai = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"]
        let numeros = ["1","2","3","4","5","6","7","8","9","0"]
        let especiais=["!","@","#","$","%","&","*","(",")","{","}","?","/","\\","<",">","[","]","+","=","_","-","|"]
        let boolLetraMin=false;
        let boolLetraMai=false;
        let boolNumero=false;
        let boolEspecial=false;
        for(let i=0;i<senha.length;i++){
            for(let j=0;j<letrasMin.length;j++){
                if(letrasMin[j]==senha[i]){
                    boolLetraMin=true;
                }
            }
            for(let k=0;k<letrasMai.length;k++){
                if(letrasMai[k]==senha[i]){
                    boolLetraMai=true;
                }
            }
            for(let l=0;l<numeros.length;l++){
                if(numeros[l]==senha[i]){
                    boolNumero=true;
                }
            }
            for(let m=0;m<especiais.length;m++){
                if(especiais[m]==senha[i]){
                    boolEspecial=true;
                }
            }

        }
        let arrayFalta=["Letra Minuscula","Letra Maiuscula","Numero","Caracter Especial"]
        
        if(boolLetraMin===true){
            var index=arrayFalta.indexOf("Letra Minuscula");
            arrayFalta.splice(index,1)
        }
        if(boolLetraMai===true){
            var index2=arrayFalta.indexOf("Letra Maiuscula");
            arrayFalta.splice(index2,1)
        }
        if(boolNumero===true){
            var index3=arrayFalta.indexOf("Numero")
            arrayFalta.splice(index3,1)
        }
        if(boolEspecial===true){
            var index4= arrayFalta.indexOf("Caracter Especial")
            arrayFalta.splice(index4,1)
        }
        let falta=""
        for(let n =0; n<arrayFalta.length;n++){
            falta= falta+` * ${arrayFalta[n]}`
        }
        if(!boolEspecial || !boolLetraMai || !boolLetraMin || !boolNumero){
            $(".divValidacaoSenha").css("color","red")
            $(".divValidacaoSenha").html("Sua senha também deve conter: "+falta)
            $("#botaoEnvForm").attr("disabled","true")
            $("#botaoEnvForm").css("background-color","#565656")
        } 
        else{
            $(".divValidacaoSenha").css("color","#009000")
            $(".divValidacaoSenha").html("A senha é válida ✔")
            $("#botaoEnvForm").removeAttr("disabled")
            $("#botaoEnvForm").css("background-color","black")
        }
    }
}

function limpa_formulário_cep() {
    // Limpa valores do formulário de cep.
    $("#endereco").val("");
    $("#bairro").val("");
    // $("#cidade").val("");
    // $("#uf").val("");
    // $("#ibge").val("");
}

//Quando o campo cep perde o foco.
$("#cep").blur(function() {

    //Nova variável "cep" somente com dígitos.
    var cep = $(this).val().replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            $("#endereco").val("...");
            $("#bairro").val("...");
            // $("#cidade").val("...");
            // $("#uf").val("...");
            // $("#ibge").val("...");

            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $("#endereco").val(dados.logradouro);
                    $("#bairro").val(dados.bairro);
                    // $("#cidade").val(dados.localidade);
                    // $("#uf").val(dados.uf);
                    // $("#ibge").val(dados.ibge);
                } //end if.
                else {
                    //CEP pesquisado não foi encontrado.
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            });
        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
});

$("#botaoEnvForm").click(function(){
    let cpf= $("#cpf").val()
    let email=$("#email").val()
    
    try{
        $.getJSON(`http://encontreaqui.tech/validacao&a=cpf&v=${cpf}&v2=${email}`, function(dados){
            if(!("erro" in dados)){
                $(".divValidacaoSenha").html("")

                $("#form-usuario").submit()
                
            }
            else{
                $(".divValidacaoSenha").css("color","red")
                $(".divValidacaoSenha").html(dados.erro)
            }
        });
    }
    catch(e){
        $(".divValidacaoSenha").css("color","red")
        $(".divValidacaoSenha").html("Ocorreu um erro contate o suporte") 
    }
});

$("#botaoEnv").click(function(){
    let cnpj= $("#cnpj").val().replace(/[^0-9]/g,'')
    let email=$("#email").val()
    try{
        $.getJSON(`http://encontreaqui.tech/validacao&a=cnpj&v=${cnpj}&v2=${email}`, function(dados){
            if(!("erro" in dados)){
                $(".divValidacaoSenha").html("")
    
                $("#form-orgao").submit()
                
            }
            else{
                $(".divValidacaoSenha").css("color","red")
                $(".divValidacaoSenha").html(dados.erro)
            }
        });
    }
    catch(e){
        $(".divValidacaoSenha").css("color","red")
        $(".divValidacaoSenha").html("Ocorreu um erro contate o suporte") 
    }
});




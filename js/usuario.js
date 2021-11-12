    
function validaCriacaoSenha(){
    if(document.getElementById("senha").value != document.getElementById("confirmaSenha").value && document.getElementById("senha").value != "" && document.getElementById("confirmaSenha").value !=""){
        return "As senhas devem ser ser iguais";
    }
    else{
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
        console.log(arrayFalta)
        return arrayFalta
    }
}
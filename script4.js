var btn = document.querySelector('#send');

btn.addEventListener("click",(event)=>{
    event.preventDefault();

    var testeEmail = document.getElementById("email").value;
    var testePass = document.getElementById("pass").value;
    var testeNpass = document.getElementById("nova_pass").value;

   
   // console.log(testeEmail + "Nova senha: " + testeNpass + "Senha: "+testePass);
   
   if((testePass === " ") || (testeNpass === " ") || (testeNpass !== testePass)  || (testeEmail === " ") || !(EmailValidacao(testeEmail))){
    alert("Preencha corretamente");
    }
    else{
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                alert("Dados cadastrados");
            }
        };
        var formData = new FormData();
        formData.append("email",testeEmail);
        formData.append("pass",testePass);
        xhr.open("POST","dados_troca.php",true);
        xhr.send(formData); 
   }      
});

//Validação de email com regex (define uma padrão de entrada)
function EmailValidacao (email){
    const emailRegex = new RegExp(
        // a até z minúsculo,a a z maiusculo e traços seguidos por @ e .com
        /^[a-zA-z0-9._-]+@[a-zA-z0-9._-]+\.[a-zA-Z]{2,}$/
    );
    if(emailRegex.test(email)){
        return true;
    }
    else{
        return false;
    }
}

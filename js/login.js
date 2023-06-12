var bbn = document.getElementById('bbn');

bbn.addEventListener('click', function(){

    let password = document.getElementById('senha')

    if(senha.type == "password"){
        senha.type = "text"
        this.style.opacity = "1"
    }else{
        password.type = "password"
        this.style.opacity = ".4"
    }
});

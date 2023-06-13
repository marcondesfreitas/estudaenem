var menu = document.getElementById("meuMenu");
var menu_hamburguer = document.getElementById("perfil");
var add = document.getElementById("btn_adicionar");
var header = document.getElementById("header");
var btnn = document.getElementById("botao_hambur");
var botao_mobile = document.getElementById("ftt");
var imagem1 = new Image();
imagem1.src = './img/casa.png';
var contador = 0;

function mostraMenu2() {

    contador++;

    if (contador == 1) {
        menu.style.animation = "aparecer 2s";
        menu.style.display = "flex";
        add.style.transform = "rotate(45deg)";
        } else if (contador == 2) {
        menu.style.animation = "desaparecer 2s";
        add.style.transform = "rotate(0deg)"

        setTimeout(function() {
            menu.style.display = "none";
          }, 1900)


        contador = 0;
    }
}

function aparecer1() {
 
    contador++;


    if (contador === 1) {
        menu_hamburguer .style.display = "block";
        menu_hamburguer.style.animation = "aparecer2 1s";
    } else if (contador === 2) {
        menu_hamburguer.style.animation = "desaparecer2 1s";

        menu_hamburguer.addEventListener("animationend", function () {
            menu_hamburguer.style.display = "none";
            location.reload();

        });
        contador = 0;
        }
}

function apagar(){
    alert("conteudo apagado com sucesso, atualize a pagina para concluir as alterações");
}

function editar(){
    alert("conteudo editado com sucesso");
}

function adicionar(){
    alert("conteudo adicionado com sucesso");
}

function adicionar1(){
    alert("conteudo apagado com sucesso, atualize a pagina para concluir as alterações");
}
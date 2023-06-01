var menu = document.getElementById("meuMenu");
var menu_hamburguer = document.getElementById("perfil");
var add = document.getElementById("btn_adicionar");
var header = document.getElementById("header");
var btnn = document.getElementById("botao_hambur");
var contador = 0;

function mostraMenu2() {
 

    contador++;

    if (contador == 1) {
        menu.style.animation = "aparecer 2s";
        menu.style.display = "flex";
        console.log("teste 1");
        add.style.transform = "rotate(45deg)";
        } else if (contador == 2) {
        menu.style.animation = "desaparecer 2s";
        add.style.transform = "rotate(0deg)"


        menu.addEventListener("animationend", function () {
            menu.style.display = "none";

        });
        location.reload();


        contador = 0;
    }
}

function aparecer1() {
 
    contador++;

    if (contador === 1) {
        menu_hamburguer .style.display = "block";
        menu_hamburguer.style.animation = "aparecer2 2s";

    } else if (contador === 2) {
        menu_hamburguer.style.animation = "desaparecer2 2s";

        menu_hamburguer.addEventListener("animationend", function () {
            menu_hamburguer.style.display = "none";
            location.reload();

        });
        contador = 0;
        }
}

// window.addEventListener('resize', function() {

//     var screenWidth = window.innerWidth;
  
//     if (screenWidth < 768) {
//         console.log("cllr");
//     } else {
//         console.log("pc");
//     }
//   });

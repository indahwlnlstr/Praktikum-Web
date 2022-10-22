// ALERT
alert ("Klik darkmode untuk mengubah mode")

function darkmode() {
    var element = document.body;
    element.classList.toggle("dark-mode");
}


const section = document.getElementsByClassName("section");
section.style.color = "white";
section.style =  "display:block";

const aboutme = document.querySelector("#aboutme");
aboutme.addEventListener("click",function(){
    const info = document.querySelector("#info");
    info.style.display = "block";
});

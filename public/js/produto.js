const tags = document.querySelectorAll(".descritivo h2,h3, .infoTecnica h2,h3");
const descritivo = document.querySelector(".desc");
const descritivoText = document.querySelector(".descritivo");
const descritivoSeta = document.querySelector(".desc .seta");
const infoTecnica = document.querySelector(".infoTec");
const infoTecnicaText = document.querySelector(".infoTecnica");
const infoTecnicaSeta = document.querySelector(".infoTec .seta");

if(tags.length > 0) {
    tags.forEach((tag)=> {
        tag.classList.add("font-bold");
    });
}
descritivo.addEventListener("click",()=> {
    if(descritivoText.classList.contains("fechado")) {
        descritivoSeta.innerHTML = "expand_less";
        descritivoText.classList.remove("fechado");
    }else {
        descritivoSeta.innerHTML = "expand_more";
        descritivoText.classList.add("fechado");
    }
});
infoTecnica.addEventListener("click",()=> {
    if(infoTecnicaText.classList.contains("fechado")) {
        infoTecnicaSeta.innerHTML = "expand_less";
        infoTecnicaText.classList.remove("fechado");
    }else {
        infoTecnicaSeta.innerHTML = "expand_more";
        infoTecnicaText.classList.add("fechado");
    }
});
const tags = document.querySelectorAll(".descritivo h2,h3, .infoTecnica h2,h3");
const descritivo = {
    desc: document.querySelector(".desc"),
    text: document.querySelector(".descritivo"),
    seta: document.querySelector(".desc .seta"),
    setaText: document.querySelector(".desc .mostrar")
};
const infoTecnica = {
    desc: document.querySelector(".infoTec"),
    text: document.querySelector(".infoTecnica"),
    seta: document.querySelector(".infoTec .seta"),
    setaText: document.querySelector(".infoTec .mostrar")
};

if(tags.length > 0) {
    tags.forEach((tag)=> {
        tag.classList.add("font-bold");
    });
}
[descritivo,infoTecnica].forEach((x)=> {
    x.desc.addEventListener("click",()=> {
        if(x.text.classList.contains("fechado")) {
            x.seta.innerHTML = "expand_less";
            x.setaText.innerHTML = "Mostrar menos";
            x.text.classList.remove("fechado");
        }else {
            x.seta.innerHTML = "expand_more";
            x.setaText.innerHTML = "Mostrar mais";
            x.text.classList.add("fechado");
        }
    });
});
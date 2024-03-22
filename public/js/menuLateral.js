const menuLateral = {
    corpo:     document.querySelector(".menuLateral"),
    overlay:   document.querySelector(".menuLateral .overlay"),
    btnFechar: document.querySelector(".menuLateral .fechar"),
    btnAbrir:  document.querySelector(".abrirMenu"),
};

menuLateral.btnAbrir.addEventListener("click",()=> {
    menuLateral.corpo.classList.remove("hidden");
    menuLateral.corpo.classList.add("flex");
});
[menuLateral.btnFechar,menuLateral.overlay].forEach((x)=> {
    x.addEventListener("click",()=> {
        menuLateral.corpo.classList.remove("flex");
        menuLateral.corpo.classList.add("hidden");
    });
});
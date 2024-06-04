const optPag = document.querySelectorAll(".fPag div");
const btnContinuar = document.querySelector(".continuar");
const pagContent = {
    vista: document.querySelector(".vista"),
    prazo: document.querySelector(".prazo")
};
optPag.forEach((opt)=> {
    opt.addEventListener("click",()=> {
        optPag.forEach((opt)=> {
            opt.classList.remove("selecionado"); 
        });
        if(opt.classList.contains("pix")) {
            opt.classList.add("selecionado");
            pagContent.prazo.style.opacity = "0";
            pagContent.vista.style.opacity = "1";
            document.title = "Pagamento - Pix";
            btnContinuar.href = "/confirmarCompra/Pix";
        }
        if(opt.classList.contains("cartao")) {
            opt.classList.add("selecionado");
            pagContent.prazo.style.opacity = "1";
            pagContent.vista.style.opacity = "0";
            document.title = "Pagamento - Cartão de crédito";
            btnContinuar.href = "/confirmarCompra/Cartao";
        }
    });
});

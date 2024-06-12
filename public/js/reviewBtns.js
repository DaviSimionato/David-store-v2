const btnsVerRev = document.querySelectorAll(".verReview");
const linksVerRev = document.querySelectorAll(".verReview a");
const btnsEditar = document.querySelectorAll(".editar");
const linksEditar = document.querySelectorAll(".editar a");
const btnsExcluir = document.querySelectorAll(".excluir");
const linkExcluir = document.querySelector(".overlayDeletar a");
const ids = document.querySelectorAll(".excluir .id");
const overlayDeletar = document.querySelector(".overlayDeletar");
const btnVoltar = document.querySelector(".overlayDeletar .voltar");

btnsVerRev.forEach((btn,i)=> {
    btn.addEventListener("click",()=> {
        linksVerRev[i].click();
    });
});
btnsEditar.forEach((btn,i)=> {
    btn.addEventListener("click",()=> {
        linksEditar[i].click();
    });
});
btnsExcluir.forEach((btn,i)=> {
    btn.addEventListener("click",()=> {
        linkExcluir.href = `/removerReview/${ids[i].textContent.trim()}`;
        overlayDeletar.classList.replace("hidden","flex");
    });
});
btnVoltar.addEventListener("click", ()=> {
    overlayDeletar.classList.replace("flex","hidden");
});
overlayDeletar.addEventListener("click", ()=> {
    overlayDeletar.classList.replace("flex","hidden");
});

const produtosVR = document.querySelectorAll(".vistosRecentemente .produto");
const setaProxVR = document.querySelector(".vistosRecentemente .prox");
const setaAntVR= document.querySelector(".vistosRecentemente .ant");
let minVR = 0;
let maxxVR = 5;
function changeProdsVR() {
    setSetasVR();
    produtosVR.forEach((prod)=> {
        if(prod.classList.contains("fadeIn")) {
            prod.classList.remove("fadeIn");
        }
        prod.style.display = "none";
    });
    for(let i=minVR;i<maxVR;i++) {
        produtosVR[i].style.display = "block";
        produtosVR[i].classList.add("fadeIn");
    }
}
setaProxVR.addEventListener("click",()=> {
    if(maxVR < produtosVR.length) {
        minVR+=1;
        maxVR+=1;
        changeProdsVR();
    }
});
setaAntVR.addEventListener("click",()=> {
    if(minVR > 0) {
        minVR-=1;
        maxVR-=1;
        changeProdsVR();
    }
});
function setSetasVR() {
    if(minVR < 1) {
        setaAntVR.style.opacity = "0";
    }else {
        setaAntVR.style.opacity = "1"; 
    }
    if(maxVR >= produtosVR.length) {
        setaProxVR.style.opacity = "0";
    }else {
        setaProxVR.style.opacity = "1";
    }
}
window.addEventListener("resize", ()=> {
    if(document.querySelector("body").getClientRects()[0].width < 1200) {
        minVR = 0;
        maxVR = produtosVR.length;
        changeProdsVR();
    }
    if(document.querySelector("body").getClientRects()[0].width > 1200) {
        minVR = 0;
        maxVR = 5;
        changeProdsVR();
    }
});
if(document.querySelector("body").getClientRects()[0].width < 1200) {
    minVR = 0;
    maxVR = produtosVR.length;
    changeProdsVR();
}
changeProdsVR();
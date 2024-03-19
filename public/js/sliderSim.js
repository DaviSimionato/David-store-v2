const produtosSim = document.querySelectorAll(".produtosSimilares .produto");
const setaProxSim = document.querySelector(".produtosSimilares .prox");
const setaAntSim= document.querySelector(".produtosSimilares .ant");
let minSim = 0;
let maxSim = 4;
function changeProdsSim() {
    setSetasSim();
    produtosSim.forEach((prod)=> {
        if(prod.classList.contains("fadeIn")) {
            prod.classList.remove("fadeIn");
        }
        prod.style.display = "none";
    });
    for(let i=minSim;i<maxSim;i++) {
        produtosSim[i].style.display = "flex";
        produtosSim[i].classList.add("fadeIn");
    }
}
setaProxSim.addEventListener("click",()=> {
    if(maxSim < produtosSim.length) {
        minSim+=1;
        maxSim+=1;
        changeProdsSim();
    }
});
setaAntSim.addEventListener("click",()=> {
    if(minSim > 0) {
        minSim-=1;
        maxSim-=1;
        changeProdsSim();
    }
});
function setSetasSim() {
    if(minSim < 1) {
        setaAntSim.style.opacity = "0";
    }else {
        setaAntSim.style.opacity = "1"; 
    }
    if(maxSim >= produtosSim.length) {
        setaProxSim.style.opacity = "0";
    }else {
        setaProxSim.style.opacity = "1";
    }
}
changeProdsSim();
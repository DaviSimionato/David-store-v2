const marca = document.querySelectorAll(".marcas .marca");
const setaProxMarca = document.querySelector(".marcas .prox");
const setaAntMarca = document.querySelector(".marcas .ant");
let minMarca = 0;
let maxMarca = 6;
function changeProdsMarca() {
    setSetasMarca();
    marca.forEach((prod)=> {
        if(prod.classList.contains("fadeIn")) {
            prod.classList.remove("fadeIn");
        }
        prod.style.display = "none";
    });
    for(let i=minMarca;i<maxMarca;i++) {
        marca[i].style.display = "block";
        marca[i].classList.add("fadeIn");
    }
}
setaProxMarca.addEventListener("click",()=> {
    if(maxMarca < marca.length) {
        minMarca+=1;
        maxMarca+=1;
        changeProdsMarca();
    }
});
setaAntMarca.addEventListener("click",()=> {
    if(minMarca > 0) {
        minMarca-=1;
        maxMarca-=1;
        changeProdsMarca();
    }
});
function setSetasMarca() {
    if(minMarca == 0) {
        setaAntMarca.style.opacity = "0";
    }else {
        setaAntMarca.style.opacity = "1";
    }
    if(maxMarca >= marca.length) {
        setaProxMarca.style.opacity = "0";
    }else {
        setaProxMarca.style.opacity = "1";
    }
}
window.addEventListener("resize", ()=> {
    if(document.querySelector("body").getClientRects()[0].width < 1200) {
        minMarca = 0;
        maxMarca = marca.length;
        changeProdsMarca();
    }
    if(document.querySelector("body").getClientRects()[0].width > 1200) {
        minMarca = 0;
        maxMarca = 5;
        changeProdsMarca();
    }
});
if(document.querySelector("body").getClientRects()[0].width < 1200) {
    minMarca = 0;
    maxMarca = marca.length;
    changeProdsMarca();
}
changeProdsMarca();
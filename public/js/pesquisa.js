const min = {
    text: document.querySelector(".min .pm"),
    input: document.querySelector(".min input"),
};
const max = { 
    text: document.querySelector(".max .pm"),
    input: document.querySelector(".max input"),
};
const produtos = document.querySelectorAll(".produto");
const preco = document.querySelectorAll(".produto .preco");
const btn = document.querySelector(".aplicar");

[min,max].forEach((x)=> {
    x.input.addEventListener("input",()=> {
        x.text.textContent = `R$${parseInt(x.input.value)},00`;
        btn.classList.remove("hidden");
    });
});

btn.addEventListener("click",()=> {
    btn.classList.add("hidden");
    produtos.forEach((produto,i)=> {
        let precoProd = parseFloat(preco[i].textContent).toFixed(0);
        if( precoProd > parseInt(min.input.value) && 
           precoProd < parseInt(max.input.value)) {
            produto.style.display = "block";
        }else {
            produto.style.display = "none";
        }
    });
});
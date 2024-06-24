const dados = {
    p: document.querySelectorAll("p.dado"),
    input: document.querySelectorAll("input.dado"),
}
const btnEdit = {
    btn: document.querySelectorAll(".editar"),
    icon: document.querySelectorAll(".editar span"),
    desc: document.querySelectorAll(".editar p"),
}

btnEdit.btn.forEach((btn,i)=> {
    btn.addEventListener("click",()=> {
        if(btnEdit.desc[i].textContent == "Editar") {
            btnEdit.btn.forEach((btn,i)=> {
                salvar(i);
            });
            editar(i);
        }else {
            salvar(i);
        }
    });
});

function editar(i) {
    dados.p[i].classList.replace("block", "hidden");
    dados.input[i].classList.replace("hidden", "block");
    btnEdit.icon[i].textContent = "check";
    btnEdit.desc[i].textContent = "Salvar";
    dados.input[i].focus();
}

function salvar(i) {
    dados.p[i].textContent = dados.input[i].value;
    dados.p[i].classList.replace("hidden", "block");
    dados.input[i].classList.replace("block", "hidden");
    btnEdit.icon[i].textContent = "edit";
    btnEdit.desc[i].textContent = "Editar";
}
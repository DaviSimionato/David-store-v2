const inputBusca = document.querySelector(".inputBusca");
const itensBusca = document.querySelector(".itensBusca");
const overlay = document.querySelector(".overlayPesquisa");

let itensEncontrados = 0;
let debounceTimeout;

inputBusca.addEventListener("input", () => {
    let pesquisa = inputBusca.value;
    clearTimeout(debounceTimeout);
    limparItensBusca();
    overlay.classList.replace("block", "hidden");
    overlay.classList.remove("active");
    debounceTimeout = setTimeout(() => {
        buscarProdutosApi(pesquisa);
    }, 1800);
});

inputBusca.addEventListener("focusin", ()=> {
    itensBusca.style.display = "flex";
    if(itensEncontrados > 0) {
        overlay.classList.replace("hidden", "block");
        overlay.classList.add("active");
    }
});

inputBusca.addEventListener("focusout", ()=> {
    setTimeout(()=> {
        itensBusca.style.display = "none";
    },100);
    overlay.classList.replace("block", "hidden");
    overlay.classList.remove("active");
});

function buscarProdutosApi(pesquisa) {
    fetch('/api/pesquisa/produtos/' + pesquisa)
    .then(response => {
        if (!response.ok) {
        throw new Error('Erro na requisição: ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        inputBusca.focus();
        itensBusca.style.width = inputBusca.getClientRects()[0].width + "px";
        limparItensBusca();
        itensEncontrados = data.length;
        overlay.classList.replace("hidden", "block");
        overlay.classList.add("active");
        if(data.length == 0) {
            itensBusca.innerHTML += `
                <div class="w-full p-2 px-4 flex justify-center items-center">
                    <p class="font-bold text-dsText overflow-hidden ml-3 
                    h-[50px] opacity-80 mt-4">
                        Nenhum produto encontrado
                    </p>
                </div>
                `;
        } else {
            data.forEach(produto => {
                itensBusca.innerHTML += `
                <div class="w-full p-2 px-4 flex justify-between hover:bg-gray-100">
                    <a href="${produto.link}" 
                    class="flex items-center">
                        <img src="${produto.imagemProduto}" 
                        alt="" width="60px">
                        <p class="font-bold text-dsText text-sm overflow-hidden 
                        ml-3 line-clamp-1">
                            ${produto.nome}
                        </p>
                    </a>
                </div>
                <div class="border-[1px]"></div>
                `;
            });
        }
    })
    .catch(error => {
        console.error('Erro:', error);
    });
}

function limparItensBusca() {
    if(itensBusca.length != 0) {
        let produtosAmostra = itensBusca.querySelectorAll("div");
        produtosAmostra.forEach((prod)=> {
            prod.remove();
        });
        itensEncontrados = 0;
    }
}

window.addEventListener("resize", ()=> {
    itensBusca.style.width = inputBusca.getClientRects()[0].width + "px";
});
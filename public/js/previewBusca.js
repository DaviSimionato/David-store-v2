const inputBusca = document.querySelector(".inputBusca");
const itensBusca = document.querySelector(".itensBusca");

let debounceTimeout;

inputBusca.addEventListener("input", () => {
    let pesquisa = inputBusca.value;
    clearTimeout(debounceTimeout);
    limparItensBusca();
    debounceTimeout = setTimeout(() => {
        buscarProdutosApi(pesquisa);
    }, 1800);
});

inputBusca.addEventListener("focusin", ()=> {
    itensBusca.style.display = "flex";
});

inputBusca.addEventListener("focusout", ()=> {
    setTimeout(()=> {
        itensBusca.style.display = "none";
    },100);
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
    }
}

window.addEventListener("resize", ()=> {
    itensBusca.style.width = inputBusca.getClientRects()[0].width + "px";
});
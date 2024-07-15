const inputBusca = document.querySelector(".inputBusca");

let debounceTimeout;

inputBusca.addEventListener("input", () => {
    let pesquisa = inputBusca.value;
    clearTimeout(debounceTimeout);
    debounceTimeout = setTimeout(() => {
        buscarProdutosApi(pesquisa);
    }, 3000);
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
        if(data.length == 0) {
            console.log("vazio");
        } else {
            console.log(data);
        }
    })
    .catch(error => {
        console.error('Erro:', error);
    });
}
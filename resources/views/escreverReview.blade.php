<x-layout :menuDepartamentos="$menuDepartamentos" :menuCategorias="$menuCategorias" :qtdCarrinho="$qtdCarrinho">
    <div class="container bg-white rounded p-6 mt-3">
        <div class="">
            <h2 class="text-dsText font-bold text-2xl">
                Escrever Avaliação
            </h2>
            <div class="flex my-3">
                <img src="{{asset("imagens/produtos/$produto->imagem_produto")}}" 
                alt="{{$produto->nome}}"
                width='180'>
                <p class="p-6 text-dsText">
                    {{$produto->nome}}
                </p>
            </div>
        </div>
        <form action="/cadastrarReview/{{$produto->id}}" method="post">
            @csrf
            @method("POST")
            <h2 class="text-dsText font-bold text-base mt-6">
                Qual sua nota para o produto
            </h2>
            <div class="flex mt-2">
                <select name="nota" class="nota outline-none border 
                border-slate-500 opacity-90 text-sm px-1">
                    <option value="5">5 - Ótimo</option>
                    <option value="4">4 - Bom</option>
                    <option value="3">3 - Regular</option>
                    <option value="2">2 - Insatisfatório</option>
                    <option value="1">1 - Ruim</option>
                    <option value="0">0 - Péssimo</option>
                </select>
                <span class="mx-4 mt-0.5">
                    -
                </span>
                <div class="flex">
                    <span class="material-symbols-outlined estrelaReview text-ds ifill">
                        star
                    </span>
                    <span class="material-symbols-outlined estrelaReview text-ds ifill">
                        star
                    </span>
                    <span class="material-symbols-outlined estrelaReview text-ds ifill">
                        star
                    </span>
                    <span class="material-symbols-outlined estrelaReview text-ds ifill">
                        star
                    </span>
                    <span class="material-symbols-outlined estrelaReview text-ds ifill">
                        star
                    </span>
                </div>
            </div>
            <h2 class="text-dsText font-bold text-base mt-6">
                Dê sua opnião sobre o produto
            </h2>
            <textarea name="comentario" cols="30" rows="10" 
            placeholder="Escreva o que achou do produto"
            class="mt-3 border border-gray-400 p-2 outline-none text-sm" 
            style="width: 700px;height:150px;resize:none;display:block;margin-bottom:15px"></textarea>
            <button type="submit" class="border rounded border-gray-400 
            bg-gray-100 p-2 px-3 text-sm hover:bg-gray-200">
                Enviar avaliação
            </button>
        </form>
    </div>
</x-layout>
<script src="{{asset("js/reviewEstrelas.js")}}"></script>
<script>
    document.title = "Escrever review {{$produto->nome}}";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("body").style.display = "flex";
    document.querySelector("body").style.minHeight = "100vh";
    document.querySelector("body").style.flexDirection = "column";
    document.querySelector("body").style.justifyContent = "space-between";
</script>
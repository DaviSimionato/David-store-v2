<x-layout :menuDepartamentos="$menuDepartamentos" :menuCategorias="$menuCategorias" :qtdCarrinho="$qtdCarrinho">
    <div class="container bg-white rounded p-6 mt-3">
        <div class="">
            <h2 class="text-dsText font-bold text-2xl">
                Editar Avaliação
            </h2>
            <div class="flex my-3">
                <img src="{{asset("imagens/produtos/$review->imagem_produto")}}" 
                alt="{{$review->nome}}"
                width='180'>
                <p class="p-6 text-dsText">
                    {{$review->nome}}
                </p>
            </div>
        </div>
        <form action="/cadastrarReviewEdit/{{$review->id}}" method="post">
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
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < intval($review->nota_review))
                            <span class="material-symbols-outlined estrelaReview 
                            text-ds ifill">
                                star
                            </span>
                        @else
                            <span class="material-symbols-outlined estrelaReview 
                            text-ds">
                                star
                            </span>
                        @endif
                    @endfor
                </div>
            </div>
            <h2 class="text-dsText font-bold text-base mt-6">
                Dê sua opinião sobre o produto
            </h2>
            <textarea name="comentario" cols="30" rows="10" 
            placeholder="Escreva o que achou do produto"
            class="mt-3 border border-gray-400 p-2 outline-none text-sm" 
            style="width: 700px;height:150px;resize:none;display:block;margin-bottom:15px"
            >{{$review->comentario}}</textarea>
            <button type="submit" class="p-2 px-8 bg-ds text-center text-white 
            uppercase rounded w-[225px] hover:bg-dsLight font-bold">
                Editar avaliação
            </button>
        </form>
        <div class="mt-4 w-[225px] flex justify-center">
            <a href="{{url()->previous()}}"
            class="p-2 px-8 bg-ds text-center text-white uppercase rounded
            hover:bg-dsLight font-bold min-w-full">
                Voltar
            </a>
        </div>
    </div>
</x-layout>
<script src="{{asset("js/reviewEstrelas.js")}}"></script>
<script>
    document.title = "Editar review {{$review->nome}}";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("body").style.display = "flex";
    document.querySelector("body").style.minHeight = "100vh";
    document.querySelector("body").style.flexDirection = "column";
    document.querySelector("body").style.justifyContent = "space-between";
    const opts = document.querySelectorAll(".nota option");
    opts.forEach(opt => {
        if(opt.value == {{$review->nota_review}}) {
            opt.selected = "true";
        }
    });
</script>
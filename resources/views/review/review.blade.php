<x-layout :menuDepartamentos="$menuDepartamentos" :menuCategorias="$menuCategorias" :qtdCarrinho="$qtdCarrinho">
    <div class="container bg-white rounded p-6 mt-3 min-h-[70vh]">
        <div class="text-dsText font-bold">
            <div class="flex items-center">
                <h2 class="text-2xl">
                    Avaliação - {{$review->nome_usuario}} 
                </h2>
                <p class="mt-1 ml-6 opacity-80">
                    {{$review->data_review}}
                </p>
            </div>
            <div class="flex my-3">
                <img src="{{asset("imagens/produtos/$review->imagem_produto")}}" 
                alt="{{$review->nome}}"
                width='180'>
                <p class="p-6 text-dsText">
                    {{$review->nome}}
                </p>
            </div>
        </div>
        <div>
            <h2 class="text-dsText font-bold text-base mt-6">
                Sua nota para o produto
            </h2>
            <div class="flex mt-2">
                <p class="font-bold mt-0.5 ml-2 text-dsText">
                    {{$review->nota_review}}
                </p>
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
                Sua opinião sobre o produto
            </h2>
            <p class="text-dsText ml-2">
                {{$review->comentario}}
            </p>
            <div class="mt-8">
                <a href="{{url()->previous()}}"
                class="p-4 px-8 bg-ds text-center text-white uppercase rounded
                hover:bg-dsLight font-bold">
                    Voltar
                </a>
            </div>
        </div>
    </div>
</x-layout>
<script src="{{asset("js/reviewEstrelas.js")}}"></script>
<script>
    document.title = "Review {{$review->nome}} - {{$review->nome_usuario}}";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("body").style.display = "flex";
    document.querySelector("body").style.minHeight = "100vh";
    document.querySelector("body").style.flexDirection = "column";
    document.querySelector("body").style.justifyContent = "space-between";
</script>

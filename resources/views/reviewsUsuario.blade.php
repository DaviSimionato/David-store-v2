<x-layout :menuDepartamentos="$menuDepartamentos" :menuCategorias="$menuCategorias" :qtdCarrinho="$qtdCarrinho">
    <div class="container min-h-[70vh] mt-4">
        <x-section-topic :titulo="'Minhas avaliações'" :icone="'star'" 
        style="margin:0;padding:0"/>
        @foreach ($reviews as $review)
            <div class="bg-white mt-6 rounded p-6 py-8 flex justify-between items-center
            text-dsText text-base">
                <div class="flex w-[60%]">
                    <img src="{{asset("imagens/produtos/{$review->imagem_produto}")}}" 
                    alt="{{$review->nome}}" width="125" class="max-h-[125px]">
                    <div class="mt-4 ml-5">
                        <a href="{{"/produto/$review->id/" . str_replace(" ", "-", $review->nome)}}" 
                        class="text-lg font-bold line-clamp-1 hover:underline">
                            {{$review->nome}}
                        </a>
                        <p class="my-2 flex items-center">
                            <b class="mr-1">
                                Nota:
                            </b>
                            {{$review->nota_review}}
                            <span class="mx-2">
                                -
                            </span>
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < intval($review->nota_review))
                                    <span class="material-symbols-outlined 
                                    ifill text-xl text-ds mb-1">
                                        star
                                    </span>
                                @else
                                    <span class="material-symbols-outlined 
                                    text-xl text-ds mb-1">
                                        star
                                    </span>
                                @endif
                            @endfor
                        </p>
                        <p class="line-clamp-3 w-[100%]">
                            <b>Comentário:</b>
                            {{$review->comentario}}
                        </p>
                    </div>
                </div>
                <div class="verReview text-ds text-center rounded
                p-2 hover:bg-[#d8b75c1c] cursor-pointer" 
                title="Ver review">
                    <a href="/verReview/{{$review->id}}"
                    class="pointer-events-none select-none">
                        <span class="material-symbols-outlined">visibility</span>
                        <p style="font-size:10px;font-weight:700;">Ver review</p>
                    </a>
                </div>
                <div class="editar text-[#0d96d5] text-center rounded
                p-2 hover:bg-[#0d96d51e] cursor-pointer" 
                title="Editar review">
                    <a href="/editarReview/{{$review->id}}"
                    class="pointer-events-none select-none">
                        <span class="material-symbols-outlined">edit</span>
                        <p style="font-size:10px;font-weight:700;">Editar review</p>
                    </a>
                </div>
                <div class="excluir text-[#D50D0D] text-center rounded
                p-2 mr-16 hover:bg-[#d50d0d1a] cursor-pointer" 
                title="Remover review">
                    <a href="/removerReview/{{$review->id}}"
                    class="pointer-events-none select-none">
                        <span class="material-symbols-outlined">delete</span>
                        <p style="font-size:10px;font-weight:700;">Remover review</p>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
<script>
    document.title = "Reviews - {{auth()->user()->nome_usuario}}";
    document.querySelector("body").style.background = "#f2f2f2";
    document.querySelector("body").style.display = "flex";
    document.querySelector("body").style.minHeight = "100vh";
    document.querySelector("body").style.flexDirection = "column";
    document.querySelector("body").style.justifyContent = "space-between";
</script>